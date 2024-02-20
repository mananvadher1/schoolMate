<?php

 $conn = mysqli_connect("localhost","root","Admin@123","SchoolMate");
//  if($conn){
//     echo "success";
//  }
if(mysqli_connect_error()){
    echo"can not connect";
}

?>
