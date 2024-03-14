<?php

namespace MyApp;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface
{
    protected $clients;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn)
    {
        // Store the new connection to send messages to later
        $this->clients->attach($conn);

        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $numRecv = count($this->clients) - 1;
        echo sprintf(
            'Connection %d sending message "%s" to %d other connection%s' . "\n",
            $from->resourceId,
            $msg,
            $numRecv,
            $numRecv == 1 ? '' : 's'
        );

        $data = json_decode($msg, true);
        $conn = mysqli_connect("localhost", "phpmyadmin", "Admin@123", "SchoolMate");
        $from_id = $data['formUserId'];
        $uid = $data['userId'];
        
        $msg = $data['msg'];
        $send_sql = "INSERT INTO `chat`(`user_id`,`to_user_id`, `msg`) VALUES ($from_id, $uid,'$msg')";
        $send_result = mysqli_query($conn, $send_sql);
        if ($send_result) {
            $userId = $data['userId'];
            $sql_user =  "SELECT * FROM `users` WHERE id = '$userId'";
            $result_user = mysqli_query($conn, $sql_user);
            $user = mysqli_fetch_assoc($result_user);
            $data['from'] = $user['first_name'] . ' ' . $user['last_name'];
            $data['img'] = $user['profile_img'];
            date_default_timezone_set('Asia/Kolkata');
            $data['dt'] = date("d-m-Y h:i:s ");
        }

        foreach ($this->clients as $client) {
            // if ($from !== $client) {
            // The sender is not the receiver, send to each client connected
            $client->send(json_encode($data));
            // }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        // The connection is closed, remove it, as we can no longer send it messages
        $this->clients->detach($conn);

        echo "Connection {$conn->resourceId} has disconnected\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "An error has occurred: {$e->getMessage()}\n";

        $conn->close();
    }
}
