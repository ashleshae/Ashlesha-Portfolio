<?php
    $Name= filter_input(INPUT_POST,'Name');
    $email= filter_input(INPUT_POST,'email');
    $subject=filter_input(INPUT_POST,'subject');
    $message=filter_input(INPUT_POST,'message');

    $conn = new mysqli('localhost','root','','contact');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } 
    else{
        $stmt = $conn->prepare("insert into contact(Name, email, subject, message) values(?,?,?,?)");
        $stmt->bind_param("ssss",$Name ,$email, $subject, $message);
        $stmt->execute();
        echo "Message has been Delivered...";
        $stmt->close();
        $conn->close();
    }
?>