<?php
$login = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
   // include 'partials/_dbconnect.php';
    include '_dbconnect.php';

    $email = $_POST["email"];
    $password = $_POST["password"]; 

    // $sql = "Select * from users where email='$email' AND password='$password'";
    $sql = "Select * from `users` where `email`='$email' or `username`='$email'";
    $res = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($res);
    if ($num == 1){
        while($row=mysqli_fetch_assoc($res)){
            if (password_verify($password, $row['password'])){ 
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['email'] = $row['email'];
                $_SESSION['username']= $row['username'];
                $_SESSION['sno'] = $row['sno'];
                $_SESSION['profile'] = $row['profile'];
                header("Location: /iDiscuss/index.php?loginsuccess=true");
                exit();
            } 
            else{
                $showError = "Invalid Credentials";
                header("Location: /iDiscuss/index.php?loginsuccess=false&error=$showError");
            }
        }
        
    } 
    else{
        $showError = "Invalid Credentials";
        header("Location: /iDiscuss/index.php?loginsuccess=false&error=$showError");
    }
}
    
?>
