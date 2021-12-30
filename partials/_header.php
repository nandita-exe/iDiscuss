<?php
        session_start();

?>
<link rel="stylesheet" href="/style.css">
<link rel="icon" type="image/x-icon" href="/img/favicon.ico">
<?php

include '_dbconnect.php';
echo '

<nav class="navbar navbar-expand-lg  nav ">
<div class="container-fluid">
  <a class="navbar-brand" href="index.php">iDiscuss</a>
  <button class="navbar-toggler btn2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
  <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
</svg>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="d-flex " method="get" action="search.php">
        <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn3" type="search">
          <svg xmlns="http://www.w3.org/2000/svg" class="circle" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
          </svg>
        </button>
    </form>
    
    <ul class="navbar-nav ms-lg-5 ms-0 me-auto mb-2 mb-lg-0 d-flex justify-content-end">
      <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://nanditapatra.netlify.app/">About</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="# id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Categories
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
        $sql = "SELECT * FROM `categories` LIMIT 5";
        $result = mysqli_query($conn, $sql);
    // $noresult = true;

    while ($row = mysqli_fetch_assoc($result)) {
echo ' <li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>
';
    }
         
          echo '<li><a class="dropdown-item" href="#categories">More Categories</a></li>
          </ul>
   </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
    </ul>';

//     echo'
//     <div class="form-check form-switch">
//     <input  class="form-check-input" type="checkbox" role="switch" id="darkmodebutton" >
//     <label class="form-check-label" for="darkmodebutton"></label>
//   </div>
// ';
echo '<img src="img/moon.png" id="icon">';
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
      echo '<span><p class =" m-2 nav-item">Welcome <a href="profile.php"><strong class="text-decoration-underline">'.$_SESSION['username'].'</strong></a></p></span>
      <a class="btn btn1" href="logout.php" >Logout</a>';
        
          }else{
    echo '<div class="mx-2">
        <button class="btn btn1"  data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn1" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button>
    </div>';
  }
  echo '</div>
</div>
</nav>
<script src="index.js"></script>';


// end of nav


include '_loginModal.php';
include '_signupModal.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
  // echo 'yes';
    // if($showAlert){
    echo '
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  <strong>Success!</strong> Your account is now created and you can login
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false" && $_GET['error']=="passwords" ){
  echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
         <strong>Error!</strong> Passwords do not match. Please try again
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false" && $_GET['error']=="email" ){
  echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
         <strong>Error!</strong> Email already exists. Please try with another email
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}else if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="false" && $_GET['error']=="user" ){
  echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
         <strong>Error!</strong> Username already taken. Please try with another Username
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}



if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="true"){
    // session_start();
  // echo 'yes';
    // if($showAlert){
    echo '
    <div class="alert alert-success alert-dismissible fade show my-0" role="alert">
  Successfully Logged in as <strong>'.$_SESSION['username'] .'</strong>
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
else if(isset($_GET['loginsuccess']) && $_GET['loginsuccess']=="false"){
  echo ' <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
         <strong>Error!</strong> Invalid Credentials. Please try again
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
         </div>';
}


?>