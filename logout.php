<?php
// Define session save handlers
function my_session_start()
{
  session_start();
}

function my_session_open($savePath, $sessionName)
{
  // Custom session open logic
  return true;
}

function my_session_close()
{
  // Custom session close logic
  return true;
}


function my_session_write($session_id, $session_data)
{
  // Custom session write function if needed
  return true;
}

function my_session_read($session_id)
{
  // Custom session read function if needed
  return true;
}

function my_session_destroy($session_id)
{
  // Code to execute before session is destroyed
  $conn = mysqli_connect("localhost", "phpmyadmin", "Admin@123", "SchoolMate");
  $uid = $_SESSION['id'];
  mysqli_query($conn, "UPDATE `users` SET `loggedin`='0' WHERE id = '$uid'");
}

function my_session_gc($max_lifetime)
{
  // Custom session garbage collection function if needed
  return true;
}

// Set custom session save handlers
session_set_save_handler(
  'my_session_open',
  'my_session_close',
  'my_session_read',
  'my_session_write',
  'my_session_destroy',
  'my_session_gc'
);


// Start the session
session_start();
session_unset();
session_destroy();

header("location: login.php");

?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <title>Logout</title>
</head>

<body>


  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
</body>

</html>