<?php
include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Insert event into the database
  $event_name = $_POST['event_name'];
  $event_start_date = date("Y-m-d", strtotime($_POST['event_start_date'])); 
  $event_end_date = date("Y-m-d", strtotime($_POST['event_end_date'])); 
  
  $insert_query = "INSERT INTO `calendar`(`event_name`, `event_start_date`, `event_end_date`) VALUES ('$event_name', '$event_start_date', '$event_end_date')";
  
  if(mysqli_query($conn, $insert_query)) {
    $data = array(
      'status' => true,
      'msg' => 'Event added successfully!'
    );
  } else {
    $data = array(
      'status' => false,
      'msg' => 'Sorry, Event not added.'
    );
  }
  
  // Set content type and return JSON response
  header('Content-Type: application/json');
  echo json_encode($data);
} else {
  // Fetch events from the database
  $display_query = "SELECT event_id, event_name, event_start_date, event_end_date FROM calendar";
  $results = mysqli_query($conn, $display_query);
  
  if ($results) {
    $data_arr = array();
    while ($data_row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
      $event_id = $data_row['event_id'];
      $title = $data_row['event_name'];
      $start = date("Y-m-d", strtotime($data_row['event_start_date']));
      $end = date("Y-m-d", strtotime($data_row['event_end_date']));
      $color = '#' . substr(uniqid(), -6); // Random color
      
      $data_arr[] = array(
        'event_id' => $event_id,
        'title' => $title,
        'start' => $start,
        'end' => $end,
        'color' => $color
      );
    }
    
    $data = array(
      'status' => true,
      'msg' => 'Events fetched successfully!',
      'data' => $data_arr
    );
  } else {
    $data = array(
      'status' => false,
      'msg' => 'Error fetching events!'
    );
  }
  
  // Set content type and return JSON response
  header('Content-Type: application/json');
  echo json_encode($data);
}

mysqli_close($conn);
?>
