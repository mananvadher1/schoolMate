<?php
// Start output buffering
ob_start();

// Include necessary files and set up variables
include ("../includes/db.php");
require ("../vendor/autoload.php");

$cid = $_GET['cid'];
$sname = $_GET['sname'];
$score = $_GET['score'];
$tscore = $_GET['tscore'];

$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$email = $_SESSION['email'];

// Generate HTML content
$html = '<!DOCTYPE hrowtml>
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
                margin-top:15px
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
    
            .passed {
                background-color: #4caf50; /* Green */
            }
    
            .failed {
                background-color: #f44336; /* Red */
            }
    
            hr {
                margin: row10px 0;
                border: none;
                border-top: 1px solid #ccc;
            }
            span{
                color: #3498DB;
            }
            #name{
                color: #9A7D0A;
            }
            #email{
                color: #154360 ;
            }
            #class{
                color: #BA4A00;
            }
            #sub{
                color: #117A65;
            }
            #score{
                color: #633974;
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
            </div>
            
        </div>

            <div class="content">
                <hr>
                <div class="text" id="name">
                    <h3>Name: ' . $fname . ' ' . $lname . '</h3>
                </div>
                <hr>
                <div class="text" id="email">
                    <h3>Email: ' . $email . '</h3>
                </div>
                <hr>
                <div class="text" id="class">
                    <h3>Class: ' . $cid . '</h3>
                </div>
                <hr>
                <div class="text" id="sub">
                    <h3>Subject: ' . $sname . '</h3>
                </div>
                <hr>
                <div class="text" id="score">
                    <h3>Total Score: ' . $score . '/' . $tscore . '</h3>
                </div>
                <hr>
                <div class="text">
                    <h3 class="msg ';

// Determine the class based on the score
if ($score >= ($tscore * 0.5)) {
    $html .= 'passed">Congratulations! You Passed the Test:)';
} else {
    $html .= 'failed">Study more! You Failed the Test:(';
}

$html .= '</h3>
                </div>
                <hr>
                <p>It is an auto-generated PDF!</p>
                <p style="font-style: italic; color: #777;">Additional line of content after the auto-generated PDF message.</p>
            </div>
        </div>
    </body>
    </html>';
// echo $html;

// Output buffering ends before PDF generation
ob_end_clean();

// PDF generation code starts
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output("Result", "D"); // there are more para like D- D for downloading the pdf- Force download the PDF


?>

<!-- explanation -->

<!-- used mpdf library to download pdf - pass your data in html format and through D parameter in output function, yopu can download pdf directly -->

<!-- ob_start() is a PHP function that turns on output buffering. When output buffering is active, instead of immediately sending output (like HTML, text, etc.) to the browser as it's generated by your PHP script, the output is stored internally in a buffer. This means that the output is not sent to the browser immediately but rather held in memory until you decide to do something with it.
 -->

<!-- 
 ob_end_clean() is another PHP function related to output buffering. It stops output buffering and discards the contents of the output buffer without sending it to the browser. This function is particularly useful if you want to clear the buffer without sending its contents to the client (browser). -->


<!-- 
everything between ob_start() and ob_end_clean() will not be sent to the browser because it's cleared from the output buffer using ob_end_clean().

In your case, using ob_start() at the beginning of your script and ob_end_clean() before PDF generation ensures that any content or whitespace generated before the PDF generation process does not interfere with the PDF output. It provides a clean environment for generating the PDF without "Data has already been sent to output" errors. -->

<!-- <img src="../dist/img/logo2.jpeg" alt="" style="max-width:100px;margin-bottom:-40px;"> -->