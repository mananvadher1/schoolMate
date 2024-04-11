<?php
include("../includes/db.php");

if (isset($_POST['action']) && $_POST['action'] == 'get_attend') {
    getAttend();
}

function getAttend()
{
    global $conn;

    $month = $_POST['month'];
    $year = $_POST['year'];
    // $current_day = date('j');
    // $current_month = date('n');
    // $current_year = date('Y');

    $data = [];
    $class_id = $_SESSION['class_id'];
    $sql = "SELECT DISTINCT u.id, u.first_name, u.last_name 
            FROM `users` AS u 
            WHERE EXISTS (
                SELECT 1 FROM `attendance` AS a 
                WHERE u.id = a.user_id 
                AND class_id = '$class_id' 
                AND role_id = '3' 
                AND YEAR(`date`) = '$year' 
                AND MONTH(`date`) = '$month'
            )";
    $user_query = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
    
    while ($user_row = mysqli_fetch_assoc($user_query)) {
        //get atta
        $user_id = $user_row['id'];
        $attendance_sql = "SELECT `status`,`date` FROM `attendance` WHERE `user_id` = ".$user_id." AND YEAR(`date`) = '$year' AND MONTH(`date`) = '$month'";
        $attendance_query = mysqli_query($conn, $attendance_sql) or die("database error:" . mysqli_error($conn));
        $att = [];
        while ($at = mysqli_fetch_assoc($attendance_query)) {
            $att[$at['date']] = $at['status'];
        }
        // echo print_r($att);
        $num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $months[0] = $user_row['first_name'].' '.$user_row['last_name'];
        $i = 1;
        for ($day = 1; $day <= $num_days; $day++) {
            
            $monthStr = date('Y-m-d',strtotime($day.'-'.$month.'-'.$year));
            $curDate = date('Y-m-d');
            // echo $monthStr;
            $status = '-';
            if (array_key_exists($monthStr, $att)){
                $status = $att[$monthStr];
            }
            if($curDate < $monthStr){
                $status = 'N/A';
            }
            $months[$i] = $status;
            $i++;
        }
        $data[] = array_merge($months);
    }
    //print_r($data);exit;
    // Count total records for pagination
    $query = "SELECT COUNT(*) as total FROM `users`";
    $result_count = mysqli_query($conn, $query) or die("database error:" . mysqli_error($conn));
    $recordsTotal = mysqli_fetch_assoc($result_count)['total'];

    $response = array(
        "draw" => $_POST['draw'],
        "recordsTotal" => $recordsTotal,
        "recordsFiltered" => count($data),
        "data" => $data
    );

    echo json_encode($response);
}
