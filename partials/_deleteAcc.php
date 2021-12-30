<?php
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // include 'partials/_dbconnect.php';
    include '_dbconnect.php';
    // include '_header.php';
    // $sql = "Select * from users";
    $email = $_SESSION["email"];
    // $password = $_POST["password"]; 

    $sql = "Select `sno` from users where email='$email'";
    $res = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($res);

    // $sqlthr = "UPDATE `threads`
    // SET `thread_user_id` = '1'
    // WHERE `thread_user_id`='$row[sno]'";
    // $resthr = mysqli_query($conn, $sqlthr);
    // // $row1 = mysqli_fetch_assoc($resthr);


    // $sqlcom = "UPDATE `comments`
    // SET `comment_by` = '1'
    // WHERE ='$row[sno]'";
    // $rescom = mysqli_query($conn, $sqlcom);
   
    // $row2 = mysqli_fetch_assoc($rescom);
    // update `users` SET `username` = `sno`||'DeletedAccount' where `username`='who@nanditap';
    // UPDATE `users` set `email` = 'deletedAccount'+ RIGHT(1000+sno,3), `username`='deletedAccount' where `email`= 'who@nanditap123';
    $sqldel = "UPDATE `users` set `email`='deletedAccount".$row['sno']."', `username`='".$row['sno']."deletedAccount', `profile`='user.png' where `email`='$email'";
    $resdel = mysqli_query($conn, $sqldel);

    // $num = mysqli_num_rows($res);
    if ($resdel) {
        # code...
        echo 'true';
    }
    

}
session_unset();
session_destroy();
header("location: /iDiscuss/index.php");
?>