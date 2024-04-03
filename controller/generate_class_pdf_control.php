<?php
// Start output buffering
ob_start();

// Include necessary files and set up variables
include ("../includes/db.php");
require ("../vendor/autoload.php");

$cid = $_GET['cid'];
$sname = $_GET['sname'];

$sql = "SELECT results.*, users.first_name, users.last_name 
FROM results
INNER JOIN users ON results.user_id = users.id
WHERE results.class_id = $cid AND results.subject_name = '$sname';";
$result = mysqli_query($conn, $sql);

// Check if the query was successful and returned rows
if ($result && mysqli_num_rows($result) > 0) {

    // Generate HTML content
    $html = '<!DOCTYPE html>
    <html>
    
    <head>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                color: #333;
                margin: 0;
                padding: 0;
            }
    
            .container {
                max-width: 800px;
                margin: 20px auto;
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }
    
            .head {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 15px
            }
    
            .head img {
                width: 100px;
                height: 100px;
                border-radius: 50%;
    
            }
    
            .head .content h1 {
                font-weight: bold;
            }
    
            .content {
                text-align: center;
            }
    
            .text {
                display: flex;
                align-items: center;
                margin-bottom: 10px;
            }
    
            .text h3 {
                margin-right: 10px;
            }
    
            .msg {
                padding: 10px;
                border-radius: 5px;
                font-weight: bold;
                text-align: center;
                color: #fff;
            }
    
            hr {
                margin: 10px 0;
                border: none;
                border-top: 1px solid #ccc;
            }
    
            span {
                color: #3498DB;
            }
    
            table, td, th {
                border: 1px solid #ddd;
                text-align: left;
            }
    
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th,
            td {
                padding: 15px;
            }
        </style>
    </head>
    
    <body>
        <div class="container">
    
            <div class="head" style="display: flex; justify-content: space-around; align-items: center;">
    
                <div class="content">
                    <h1><i>SCHOOL<span>MATE</span></i></h1>
                    <h4>Online School Management System</h4>
                    <h4>Year: 2024-2025</h4>
                    <h4>Class: '.$cid.'</h4>
                    <h4>Subject: '.$sname.'</h4>
                    <h4>Student Result</h4>
                </div>
    
            </div>
            <hr>
            <div class="content">
                <table>
                    <tr>
                        <th>Enrollment No.</th>
                        <th>Name</th>
                        <th>Score</th>
                    </tr>';
                    while ($row = mysqli_fetch_assoc($result)) {
                        $id = $row['user_id'];
                        $fname = $row['first_name'];
                        $lname = $row['last_name'];
                        $score = $row['score'];
                        $tscore = $row['totalscore'];

                        $html .= "<tr>
                        <td>".$id."</td>
                        <td>".$fname." ".$lname."</td>
                        <td>".$score." / ".$tscore."</td>
                    </tr>";
                    
                    }
                 $html .= '</table>
            </div>
        </div>
    </body>
    
    </html>';
    // echo $html;
   
} else {
   $html = '<!DOCTYPE html>
   <html>
   
   <head>
       <style>
           body {
               font-family: Arial, sans-serif;
               background-color: #f0f0f0;
               color: #333;
               margin: 0;
               padding: 0;
           }
   
           .container {
               max-width: 800px;
               margin: 20px auto;
               background-color: #fff;
               padding: 20px;
               border-radius: 10px;
               box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           }
   
           .head {
               display: flex;
               align-items: center;
               justify-content: center;
               margin-top: 15px
           }
   
           .head img {
               width: 100px;
               height: 100px;
               border-radius: 50%;
   
           }
   
           .head .content h1 {
               font-weight: bold;
           }
   
           .content {
               text-align: center;
           }
   
           .text {
               display: flex;
               align-items: center;
               margin-bottom: 10px;
           }
   
           .text h3 {
               margin-right: 10px;
           }
   
           .msg {
               padding: 10px;
               border-radius: 5px;
               font-weight: bold;
               text-align: center;
               color: #fff;
           }
   
           hr {
               margin: 10px 0;
               border: none;
               border-top: 1px solid #ccc;
           }
   
           span {
               color: #3498DB;
           }
   
           table, td, th {
               border: 1px solid #ddd;
               text-align: left;
           }
   
           table {
               border-collapse: collapse;
               width: 100%;
           }
           th,
           td {
               padding: 15px;
           }
       </style>
   </head>
   
   <body>
       <div class="container">
   
           <div class="head" style="display: flex; justify-content: space-around; align-items: center;">
   
               <div class="content">
                   <h1><i>SCHOOL<span>MATE</span></i></h1>
                   <h4>Online School Management System</h4>
                   <h4>Year: 2024-2025</h4>
                   <h4>Student Result</h4>
                   <h4>Class: '.$cid.'</h4>
                   <h4>Subject: '.$sname.'</h4>
               </div>
   
           </div>
           <hr>
           <div class="content">
           <h2>No Result Found</h2>
               <table>
                   <tr>
                       <th>Enrollment No.</th>
                       <th>Name</th>
                       <th>Score</th>
                   </tr>
                   <tr>
                       <td>-</td>
                       <td>-</td>
                       <td>-</td>
               </table>
           </div>
       </div>
   </body>
   
   </html>';
//    echo $html;
}

// Output buffering ends before PDF generation
ob_end_clean();

// PDF generation code starts
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("Class_Result", "D"); // there are more para like D- D for downloading the pdf- Force download the PDF

?>