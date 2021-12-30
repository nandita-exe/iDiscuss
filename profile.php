<?php
  include 'partials/_dbconnect.php';
  include 'partials/_header.php';
  
// include 'upload.php';
  ?>


<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
<link rel="icon" type="image/x-icon" href="/img/favicon.ico">
  <title>iDiscuss</title>
</head>
<body>
  <?php
if(isset($_GET['error']) && $_GET['error']=="true"){
  // echo 'yes';
    // if($showAlert){
    echo '
    <div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
  <strong>Error</strong> There was an error uploading your file. Make sure file size is less than 500kb
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
    }
    ?>
<?php
    $email = $_SESSION["email"];

    $sql1 = "Select `profile` from users where email='$email'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);
?>
  <div class="container mt-5">
    <div class="row">
      <div class="col ">
        <!-- <div class="container"> -->
        <center>
          <img src="profile/<?php echo $row1['profile']; ?>" class="profile" alt="display picture" >
          </center>
        
        <!-- </div> -->
        <form class="col m-auto" action="upload.php" method="POST" enctype="multipart/form-data">

          <p class="mt-3">Change Picture <small>(Size must be less than 500kb)</small></p>
          <div class="input-group mb-3 mt-0">
            <input type="file" class="form-control" id="profile" name="profile">
            <label class="input-group-text" for="profile" >Upload</label>

          </div>
          <button class="btn btn1" type="submit" name="submit">Save</button>
        </form>
        
      </div>

      <div class="col">
        <h2>Username: <?php echo $_SESSION['username']; ?></h2>
        <h3>Email: <?php echo $_SESSION['email']; ?></h3>

        <p>Questions asked: <?php $sno = $_SESSION['sno'];
                            $sql = "SELECT COUNT(*) as `total_questions` FROM `threads` where `thread_user_id`='$sno'";
                            $result = mysqli_query($conn, $sql);
                            $row = mysqli_fetch_assoc($result);
                            echo $row['total_questions'];

                            ?>
        </p>
        Number of comments:
        <?php
        $sql = "SELECT COUNT(*) as `total_comments` FROM `comments` where `comment_by`='$sno'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        echo $row['total_comments'];

        ?>


      </div>
    </div>
  </div>

  <!-- Questions display -->
  <div class="container mt-5">
    <h3>Recent Questions:</h3>
    <?php
    // $id = $_GET['threadid'];
    $sql = "SELECT * FROM `threads` where `thread_user_id`=$sno order by `timestamp` desc ";
    $result = mysqli_query($conn, $sql);
    echo '<table class="table">
      <thead>
        <tr>
        <th class="text" scope="col">Sno</th>
          <th scope="col">Question</th>
          
          <th scope="col">Category</th>
          <th scope="col">Time</th>
        </tr>
      </thead>
      <tbody>';
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      // $id = $row['comment_id'];

      $title = $row['thread_title'];
      $desc = $row['thread_desc'];
      $time = $row['timestamp'];
      $thread_id = $row['thread_cat_id'];
      $thread_user_id = $row['thread_user_id'];

      //   $sql2 = "SELECT `thread_title`, `thread_desc`,`thread_cat_id` FROM `threads` where `thread_id`='$thread_id'";
      //   $result2 = mysqli_query($conn, $sql2);
      //   $row2 = mysqli_fetch_assoc($result2);

      $sql3 = "SELECT `category_name` FROM `categories` where `category_id`='$thread_id'";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_assoc($result3);

      // $row3['category_name']
      // <td><h3>'.$title.'</h3><br>'.$desc.'</td>
      // <td>'.$row2['thread_title'].'<br>'.$row2['thread_desc'].'</td>
      echo ' <tr>
          <th scope="row">' . $no . '</th>
          <td><h4 class="pb-0 mb-0">' . $title . '</h4><br>' . $desc . '</td>
          <td>' . $row3['category_name'] . '</td>
          <td>' . $time . '</td>
        </tr>
      ';
      $no = $no + 1;
    }
    echo ' 
    </tbody></table>';
    ?>

  </div>

  <div class="container mt-5">
    <h3>Recent Comments:</h3>
    <?php
    // $id = $_GET['threadid'];
    $sql = "SELECT * FROM `comments` where `comment_by`=$sno order by `comment_time` desc ";
    $result = mysqli_query($conn, $sql);
    echo '<table class="table">
      <thead>
        <tr>
        <th scope="col">Sno</th>
          <th scope="col">Comment</th>
          <th scope="col">Thread</th>
          <th scope="col">Category</th>
          <th scope="col">Time</th>
        </tr>
      </thead>
      <tbody>';
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
      // $id = $row['comment_id'];

      $content = $row['comment_content'];
      $comment_time = $row['comment_time'];
      $thread_id = $row['thread_id'];
      $thread_user_id = $row['comment_by'];

      $sql2 = "SELECT `thread_title`, `thread_desc`,`thread_cat_id` FROM `threads` where `thread_id`='$thread_id'";
      $result2 = mysqli_query($conn, $sql2);
      $row2 = mysqli_fetch_assoc($result2);

      $sql3 = "SELECT `category_name` FROM `categories` where `category_id`='$row2[thread_cat_id]'";
      $result3 = mysqli_query($conn, $sql3);
      $row3 = mysqli_fetch_assoc($result3);

      echo '
      
        <tr>
          <th scope="row">' . $no . '</th>

          <td>' . $content . '</td>
          <td>' . $row2['thread_title'] . '<br>' . $row2['thread_desc'] . '</td>
          <td>' . $row3['category_name'] . '</td>
          <td>' . $comment_time . '</td>
        </tr>
      ';
      $no = $no + 1;
    }
    echo ' 
    </tbody></table>';
    // $desc = $row['thread_desc'];
    // $id = $row['thread_id'];

    ?>
  </div>


  <div class="container mb-5">
    <h2>Delete Account</h2>
    <p>
      You won't be able to recover any data.
    </p>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
      Delete my account
    </button>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Account</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="partials/_deleteAcc.php" method="post">
            Are you Sure you want to delete your account? You won't be able to recover any data and have to create a new account if you want to. The posts and comments made by you will be still visible.
        </div>
        <div class="modal-footer">
          <input type="hidden" id="delete" name="delete">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-outline-danger"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
"Delete"</button>
        </div>
        </form>
      </div>
    </div>
  </div>



  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  <script src="partials/signup.js"></script>
</body>

</html>