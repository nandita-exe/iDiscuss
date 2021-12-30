<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> -->

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <title>iDiscuss</title>
</head>

<body>
  <?php
  include 'partials/_dbconnect.php';
  include 'partials/_header.php';

  ?>
  

  <?php
  $id = $_GET['threadid'];

  $sql = "SELECT * FROM `threads` where thread_id=$id";
  $result = mysqli_query($conn, $sql);
  $noresult = true;
  while ($row = mysqli_fetch_assoc($result)) {
    $noresult = false;
    $title = $row['thread_title'];
    $desc = $row['thread_desc'];
    $thread_time = $row['timestamp'];
    $thread_user_id = $row['thread_user_id'];
    $sql2 = "SELECT `username` from `users` where `sno`='$thread_user_id'";
    $result2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($result2);

  }
  if ($noresult) {
    echo '<div class=" my-4">
    <div class="jumbotron">
    <p class="display-4">No threads found</p>
      <p class="lead">Be the 1st person to ask a question</p>
      
    ';
  }
  ?>
  <?php
  $showAlert = false;
  $method = $_SERVER['REQUEST_METHOD'];
  if ($method == 'POST') {
    # code...
    //INSERT INTO DB
    // $comment = $_POST['comment'];
    // $comment = str_replace("<", "&lt;", $comment);
    // $comment = str_replace(">", "&gt;", $comment);
    $comment = $_POST['comment']; 

    $comment = str_replace("<", "&lt;", $comment);
    $comment = str_replace(">", "&gt;", $comment); 
    // $th_desc = $_POST['desc'];
    $sno = $_SESSION['sno'];
    $sql = "INSERT INTO `comments` (`comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment', '$id', '$sno', current_timestamp());";
    $result = mysqli_query($conn, $sql);
    $showAlert = true;
    if ($showAlert) {
      echo '<div class="alert alert-success  alert-dismissible fade show" role="alert">
      Sucessfully Submitted
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    }
  }
  ?>
  <!-- slider  -->


  <!-- category container  -->
  <div class="container my-4">
    <div class="jumbotron">
      <h1 class="display-4"> <?php echo $title ?></h1>
      <p class="lead"><?php echo $desc ?></p>
      <hr class="my-4">
      <p>No Spam / Advertising / Self-promote in the forums.
        Do not post copyright-infringing material.
        Do not post “offensive” posts, links or images.
        Do not cross post questions.
        Do not PM users asking for help.
        Remain respectful of other members at all times.</p>
      <p class="text-left "><b>Posted by: <?php echo $row2['username']; ?></b></p>
      <p class="text-left ">Posted on: <?php echo $thread_time ?></p>
    </div>
  </div>

  <!-- <?php
        //       $showAlert = false;
        // $method = $_SERVER['REQUEST_METHOD'];
        // if ($method=='POST') {
        //   # code...
        //   //INSERT INTO DB
        //   $th_title = $_POST['title'];
        //   $th_desc = $_POST['desc'];
        //   $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '0', current_timestamp());";
        //   $result = mysqli_query($conn, $sql);
        //   $showAlert = true;
        //   if($showAlert){
        //     echo '<div class="alert alert-success  alert-dismissible fade show" role="alert">
        //     Sucessfully Submitted
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        //   </div>';
        //   }

        // }
        ?>
 -->


 <?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
          
    echo '
  <div class="container col-md-10 p-3 border border-1 ">
    <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
      <h1 class="py-2">Add a Comment</h1>
      <div class="mb-3">
        <label for="comment" class="form-label">Type your Comment</label>
        <textarea type="" class="form-control" id="comment" name="comment" rows="3"></textarea>
      </div>
      <input type="hidden" name="sno" value"'.$_SESSION['sno'].'">
      <button type="submit" class="btn btn1">Post Comment</button>
    </form>
  </div>';
        }        else {
          echo '
          <div class="container "><h1 class="py-2">Add a Comment</h1>
          <div class="container alert alert-warning" role="alert">
            <p>You are not Logged in. You need to log in first to add a Comment</p>
          </div>
          </div>';
          
        }
  ?>
  <div class="container">
    <h1 class="py-2">Discussions</h1>

    <?php
    $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` where `thread_id`=$id";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
      $id = $row['comment_id'];
      $content = $row['comment_content'];
      $comment_time = $row['comment_time'];
      $thread_user_id = $row['comment_by'];
      $sql2 = "SELECT * from `users` where `sno`='$thread_user_id'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);
      // $desc = $row['thread_desc'];
      // $id = $row['thread_id'];


      echo '
      
      <div class="d-flex m-2 p-2 jumbotron">
      <div class="flex-shrink-0">
        <img src="profile/'.$row2['profile'].'" width="55px" alt="..." class="profile2">
      </div>
      
      <div class="flex-grow-1 ms-3">
      <p class=" my-0">Posted By: <strong>'.$row2['username'].'</strong> at <strong>'.$comment_time.'</strong></p>
       '. $content . '
      </div>
    </div>
    
';
/* <h5><a class="text-dark" href="thread.php"></a> </h5>*/
    }
    ?>
  </div>

  <?php
  include 'partials/_footer.php';
  ?>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
    <script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>