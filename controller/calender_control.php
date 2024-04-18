<?php
  include ("../includes/db.php");
  
  // Check if the action parameter is set
if(isset($_POST['action'])) {
    // Insert event
    if ($_POST['action'] == 'add_event') {
        // Check user role before allowing the action
        if($_SESSION['role_id'] == 1) {
            $title = $_POST['title'];
            $start = $_POST['start'];
            $end = $_POST['end'];

            // Perform database insert
            $sql = "INSERT INTO `calendar` (event_name, event_start_date, event_end_date) VALUES ('$title', '$start', '$end')";
            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo json_encode(array('status' => 'success', 'message' => 'Event added successfully.'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Failed to add event.'));
            }
        }
    }

    // Delete event
    if ($_POST['action'] == 'delete_event') {
        // Check if the ID parameter is set
        if(isset($_POST['id'])) {
            $id = $_POST['id'];
            
            // Check if the event with the specified ID exists
            $sql_check_event = "SELECT * FROM `calendar` WHERE event_id='$id'";
            $result_check_event = mysqli_query($conn, $sql_check_event);
            if(mysqli_num_rows($result_check_event) > 0) {
                // Check user role before allowing the action
                if($_SESSION['role_id'] == 1) {
                    // Perform database delete
                    $sql = "DELETE FROM `calendar` WHERE event_id='$id'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        echo json_encode(array('status' => 'success', 'message' => 'Event deleted successfully.'));
                    } else {
                        echo json_encode(array('status' => 'error', 'message' => 'Failed to delete event.'));
                    }
                }
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Event not found.'));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Missing event ID for delete action.'));
        }
    }

    // Fetch events
    if ($_POST['action'] == 'fetch_events') {
        // Perform database query to fetch events
        $sql = "SELECT event_id, event_name, event_start_date, event_end_date FROM `calendar`"; // Include event_id in the query
        $result = mysqli_query($conn, $sql);
        $events = array();
        
        while ($row = mysqli_fetch_assoc($result)) {
            // Include the event_id in the event object
            $event = array(
                'id' => $row['event_id'],
                'title' => $row['event_name'],
                'start' => $row['event_start_date'],
                'end' => $row['event_end_date']
            );
            $events[] = $event;
        }
        
        echo json_encode($events);
    }
}
?>
