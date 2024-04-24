<?php
include("../includes/db.php");
if (isset($_POST['action']) && $_POST['action'] == 'get_subject') {
    getFees();
}

function getFees()
{
    global $conn;
    $data = [];
    $class = $_POST['class_id'];
    $i = 1; // Counter for auto-incrementing serial number

    $sql = "SELECT * FROM `subjects` WHERE class_id = '$class'";
    $re = mysqli_query($conn, $sql);

    $totalRecords = mysqli_num_rows($re); // Get the total number of records from the query

    if ($totalRecords > 0) {
        while ($row = mysqli_fetch_array($re)) {
            $id = $row['subject_id']; 
            $cid = $row['class_id'];
            $modifiedRow = [$i, $row['subject_name'], $row['subject_code'], $row['subject_ref'], "<button onClick='editClick($id)' class='edit-button btn btn-sm btn-success'>Edit</button> <button onClick='deleteClick($id,$cid)' class='delete-button btn btn-sm btn-danger'>Delete</button>"];
            $data[] = $modifiedRow;
            $i++;
        }
    }

    // Prepare the output array
    $output = [
        "draw" => isset($_POST['draw']) ? intval($_POST['draw']) : 1, // Assuming 'draw' parameter is sent in the POST request
        "recordsTotal" => $totalRecords,
        "recordsFiltered" => count($data),
        "data" => $data
    ];

    echo json_encode($output);
}
