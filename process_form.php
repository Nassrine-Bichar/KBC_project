<?php
    // Database configuration
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "enquiries";
    // Create a connection
    $conn=mysqli_connect($servername, $username, $password, $dbname);

// if($conn){
//     echo "Connect succesfully";
// }
// else{
//     die(mysqli_error($conn));
//   }

  if($conn){
    // echo "Request Sent Successfully";
    echo '<!DOCTYPE html>
    <html>
    <head>
        <title>Success Message</title>
        <style>
            .success-message {
                background-color: #4CAF50;
                color: #fff;
                padding: 10px;
                text-align: center;
            }
        </style>
    </head>
    <body>
        <div class="success-message">Successfully Submitted!</div>
    </body>
    </html>';
} 
else{
  die(mysqli_error($conn));
}

?>


