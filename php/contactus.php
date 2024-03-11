<?php

    $name = $_GET['name'];
    $email = $_GET['email'];
    $subject = $_GET['subject'];
    $message = $_GET['message'];

    $conn = new mysqli('localhost','root','password','skillup');
    if($conn->connect_error){
        die('connection failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into(name,email,subject,message)value(?, ?, ?, ?)");
        $stmt->bind_param("ssss",$name,$email,$subject,$message);
        $stmt->execute();
        echo '<script type ="text/JavaScript">';  
        echo 'alert("Submit Successfull")';  
        echo '</script>';
        $stmt->close();
        $conn->close();
    }

?>