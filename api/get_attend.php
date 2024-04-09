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
    $current_day = date('j');
    $current_month = date('n');
    $current_year = date('Y');

    $data = [];
    $class_id = $_SESSION['class_id'];

//    $sql = "SELECT DISTINCT u.id, u.first_name, u.last_name,a.date FROM attendance as a LEFT JOIN users as u ON u.id = a.user_id WHERE u.class_id = '12' AND u.role_id = '3' AND YEAR(a.`date`) = '2024' AND MONTH(a.`date`) = '4';"
   $sql = "SELECT DISTINCT u.id, u.first_name, u.last_name,a.date 
            FROM `attendance` AS a 
            LEFT JOIN users as u ON u.id = a.user_id 
            where u.class_id = '$class_id' 
                AND u.role_id = '3' 
                AND YEAR(a.date) = '$year' 
                AND MONTH(a.date) = '$month'
            ";
    $user_query = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));

    while ($user_row = mysqli_fetch_assoc($user_query)) {

        $user_id = $user_row['id'];
        $user_data = [
            'id' => $user_id,
            'name' => $user_row['first_name'].''. $user_row['last_name'],
            // 'last_name' => $user_row['last_name'],
            'attendance' => []
        ];

        // Fetching all dates in the specified month
        $num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        for ($day = 1; $day <= $num_days; $day++) {
            while ($user_row = mysqli_fetch_assoc($user_query)) {
            $user_data = [
                'id' => $user_id,
                'first_name' => $user_row['first_name'],
                'last_name' => $user_row['last_name'],
                'attendance' => []
            ];

        }


            // Initialize $date outside of the if statement
            $date = sprintf("%d-%s", $day, date("M", mktime(0, 0, 0, $month, $day, $year)));
            if ($year < $current_year || ($year == $current_year && $month < $current_month) || ($year == $current_year && $month == $current_month && $day <= $current_day)) {
                $attendance_sql = "SELECT `status` 
                                   FROM `attendance` 
                                   WHERE user_id = '$user_id' 
                                   AND `date` = '$year-$month-$day'";
                $attendance_query = mysqli_query($conn, $attendance_sql) or die("database error:" . mysqli_error($conn));
                $attendance_row = mysqli_fetch_assoc($attendance_query);
                $status = ($attendance_row && $attendance_row['status'] == 'present') ? "P" : "A"; // "P" for present, "A" for absent
            } else {
                $status = "0";
            }
            $user_data['attendance'][$date] = $status;
        }
        $data[] = $user_data;
    }

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
