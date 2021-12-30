<?php
$showAlert = false;
$showError = false;
  if ($_SERVER["REQUEST_METHOD"]=='POST') {
    # code...
    include '_dbconnect.php';
    $email = $_POST["signupEmail"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    // $exists=false;

    // Check whether this email exists
    //$existSql = "SELECT * FROM `users` WHERE `email` = '$email' or `username`='$username'";
    $EmailexistSql = "SELECT * FROM `users` WHERE `email` = '$email'";
    
    $res = mysqli_query($conn, $EmailexistSql);
   
    
    $numExistRows1 = mysqli_num_rows($res);
   
    if($numExistRows1 > 0){
        // $exists = true;
        $showError = "email";
    }
    $UserexistSql = "SELECT * FROM `users` WHERE `username`='$username'";
    $res = mysqli_query($conn, $UserexistSql);
    $numExistRows2 = mysqli_num_rows($res);
     if($numExistRows2 > 0){
        // $exists = true;
        $showError = "user";
    }


    if($numExistRows1==0  && $numExistRows2==0){
        // $exists = false; 
        if(($password == $cpassword)){
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `users` (`profile`,`email`,`username`, `password`) VALUES ('user.png','$email','$username', '$hash')";
            $res = mysqli_query($conn, $sql);
            if ($res){
                $showAlert = true;
                header("Location: /iDiscuss/index.php?signupsuccess=true");
                exit();
            }
        }
        else{
            $showError = "passwords";
            header("Location: /iDiscuss/index.php?signupsuccess=false&error=$showError");

        }
    }
    header("Location: /iDiscuss/index.php?signupsuccess=false&error=$showError");

  }
  
?>
