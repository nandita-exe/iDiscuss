<?php
session_start();
 include 'partials/_dbconnect.php';
//   include 'partials/_header.php';
 
$email = $_SESSION["email"];

$target_dir = "profile/";
$target_file = $target_dir . basename($_FILES["profile"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
if(isset($_POST['submit'])){
  $check = getimagesize($_FILES["profile"]["tmp_name"]);
  if($check !== false) {
    // echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
    
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
  if ($_FILES["profile"]["size"] > 500000) {
    // echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
// echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
$uploadOk = 0;
}
if ($uploadOk == 0) {
// echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
header("location: profile.php?error=true");
} else {
if (move_uploaded_file($_FILES["profile"]["tmp_name"], $target_file)) {
//   echo "The file ". htmlspecialchars( basename( $_FILES["profile"]["name"])). " has been uploaded.";
  $filename =  basename( $_FILES["profile"]["name"]);
  $sql = "UPDATE `users` set `profile`='$filename' where `email`='$email';";
  $res= mysqli_query($conn, $sql);

  header("location: profile.php");
} else {
  // echo "Sorry, there was an error uploading your file.";
  header("location: profile.php");
}
}

}



?>