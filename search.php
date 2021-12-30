<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <title>iDiscuss</title>
</head>

<body>

    <?php
  include 'partials/_dbconnect.php';
  include 'partials/_header.php';

  ?>
    <!-- slider  -->
    <div class="container" style="height: 100vh;">
        <h1>Search Results for <em>"<?php echo $_GET['search']; ?>"</em> </h1>
        <?php

// $search = $_GET['search'];
// $sql = "SELECT * FROM `categories`   where MATCH (`category_name`, `category_description`) against ('$search');";
// // $sql ="SELECT `categories`.`category_name`, `threads`.`thread_id`, `threads`.`thread_title`,`threads`.`thread_desc` from `categories`,`threads`;";
// $result = mysqli_query($conn, $sql);
// $noresult= true;
// while ($row = mysqli_fetch_assoc($result)) {
//  $noresult=false;
//   $cat_name = $row['category_name'];
//   $cat_desc = $row['category_description'];
//   $cat_id = $row['category_id'];
// }

// if ($noresult) {
//   echo '<div class=" my-4">
//   <div class="jumbotron">
//   <p class="display-4">No results found</p>
//   <ul>Suggestions:
// <li>Make sure that all words are spelled correctly.</li>
// <li>Try different keywords.</li>
// <li>Try more general keywords.</li>
// <li>Try fewer keywords.</li>
// </ul>
  
//   </div>
//   </div>
// ';
// }
// else{
//  $url = "threadlist.php?catid=".$cat_id;
//  echo '<div class="container results ">
//  <p class="fs-4">Category: <strong><a href="'.$url.'">'.$cat_name .' </a></strong></p>
//  <p>'.$cat_desc.'</p>
//  </div>';
// }
// <p class="lead">Be the 1st person to ask a question</p>
//  }
?>
        <?php
$search = $_GET['search'];
$sql = "SELECT * FROM `categories`   where MATCH (`category_name`, `category_description`) against ('$search');";
// $sql ="SELECT `categories`.`category_name`, `threads`.`thread_id`, `threads`.`thread_title`,`threads`.`thread_desc` from `categories`,`threads`;";
$result = mysqli_query($conn, $sql);
$noresult= true;
while ($row = mysqli_fetch_assoc($result)) {
 $noresult=false;
  $cat_name = $row['category_name'];
  $cat_desc = $row['category_description'];
  $cat_id = $row['category_id'];
}

            $search = $_GET['search'];
            $sql = "SELECT * FROM `threads`   where MATCH (`thread_title`, `thread_desc`) against ('$search');";
            // $sql ="SELECT `categories`.`category_name`, `threads`.`thread_id`, `threads`.`thread_title`,`threads`.`thread_desc` from `categories`,`threads`;";
            $result = mysqli_query($conn, $sql);
            $noresult1 = true;
            while ($row = mysqli_fetch_assoc($result)) {
              $noresult1 = false;
              $title = $row['thread_title'];
              $desc = $row['thread_desc'];
              $thread_id = $row['thread_id'];
            }if($noresult1==false){
              $url2 = "thread.php?threadid=" . $thread_id;
                echo '<div class=" results">
                <p class="fs-4">Thread: <strong><a href="' . $url2 . '"> ' . $title . ' </a></strong></p>
                <p>' . $desc . '</p>
                </div>';
            }

            if ($noresult==true and $noresult1==true) {
              echo '<div class=" my-4">
              <div class="jumbotron">
              <p class="display-4">No results found</p>
              <ul>Suggestions:
                  <li>Make sure that all words are spelled correctly.</li>
                  <li>Try different keywords.</li>
                  <li>Try more general keywords.</li>
                  <li>Try fewer keywords.</li>
                </ul>
              </div>
              </div>
            ';
            } if($noresult==false) {
              $url1 = "threadlist.php?catid=".$cat_id;
              echo '<div class=" results ">
              <p class="fs-4">Category: <strong><a href="'.$url1.'">'.$cat_name .' </a></strong></p>
              <p>'.$cat_desc.'</p>
              </div>';
            }
          

        ?>




    </div>

    <?php
  include 'partials/_footer.php';
  ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>