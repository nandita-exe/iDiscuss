    <?php

     
    ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="icon" type="image/x-icon" href="/img/favicon.ico">
    <title>iDiscuss</title>
</head>

<body>

    
    <!-- insert category -->
    <?php
    include 'partials/_header.php';
    include 'partials/_dbconnect.php';
        
//         $showAlert = false;
//   $method = $_SERVER['REQUEST_METHOD'];
//   if ($method=='POST') {
    # code...
    //INSERT INTO DB

    // $sno = $_SESSION['sno'];
    // $cat_title = $_POST['category_name'];
    // $cat_desc = $_POST['category_description'];

    // $cat_title  = str_replace("<", "&lt;", $cat_title );
    // $cat_desc = str_replace(">", "&gt;", $cat_desc); 

    // $cat_title  = str_replace("<", "&lt;", $cat_title );
    // $cat_desc = str_replace(">", "&gt;", $cat_desc); 

    // $sql = "INSERT INTO `categories` (`category_name`, `category_description`, `created`) VALUES ('$cat_title', '$cat_desc', current_timestamp());";
    // $result = mysqli_query($conn, $sql);
    // $showAlert = true;
    // if($showAlert){
    //   echo '<div class="alert alert-success  alert-dismissible fade show" role="alert">
    //   Sucessfully Submitted
    //   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    // </div>';
//     }

//   }
  ?>
      <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="img/bg.png" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes" width="700"
                    height="500" loading="lazy">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">iDiscuss</h1>
                <p class="lead fs-3">iDiscuss is a forum where you can ask your questions and get answers and help
                    people as well. </p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a id="btx" href="#categories" class=" btn btn-lg px-4 me-md-2">Categories</a>
                    <button class="btn1 btn btn-lg px-4" data-bs-toggle="modal" data-bs-target="#loginModal">Login</a>
                </div>
            </div>
        </div>
    </div>


    <div class="container" id="categories">
    <h2 class="text-center my-3"> iDiscuss - Categories</h2>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
        <?php 
            $sql = "SELECT * FROM `categories`";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                # code...
                $id = $row['category_id'];
                $cat = $row['category_name'];
                $desc = $row['category_description'];
            // $img = $row['img'];
            // $imgno =($id%6)+1;
            if($id%5!=0){
                $imgno= $id%5;
            }else{
                $imgno = 3;
            }
                echo '<div class="col">
                <div class="card">
                <img src="img/card-'.$imgno.'.jpg" class="card-img-top" alt="..."  width="100%" height="225">
                  
                        <div class="card-body">
                        <h5 class="card-title"><a href="threadlist.php?catid='.$id.'">'.$cat.'</a></h5>
                        <p class="card-text">'.substr($desc,0,90).'...</p>
                        <a href="threadlist.php?catid='.$id.'" class="btn btn1">View Threads</a>
                    </div>
                </div>
                </div>
            ';
            }
            ?>
            </div>

  <?php
    //   echo '<div class="container col-md-10 mt-5 p-3 border border-1 ">
    //     <form method="post" action="'. $_SERVER['REQUEST_URI'] .'">
    //         <h1 class="py-2">Category not found? Create a new Category</h1>
    //         <div class="mb-3">
    //             <label for="title" class="form-label">Category Name</label>
    //             <input type="text" class="form-control" id="category_name" name="category_name" aria-describedby="emailHelp">
    //             <div id="emailHelp" class="form-text"></div>
    //         </div>
    //         <div class="mb-3">
    //             <label for="desc" class="form-label">Category Description</label>
    //             <textarea type="" class="form-control" id="category_description" name="category_description" rows="3"></textarea>
    //         </div>
    //         <button type="submit" class="btn btn1">Submit</button>
    //     </form>
    // </div>';
?>




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
    <script src="partials/signup.js"></script>
    <script src="index.js"></script>
    <!-- <script>
function myFunction() {
   var element = document.body;
   element.classList.toggle("dark-mode");
}
</script> -->
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>

</html>