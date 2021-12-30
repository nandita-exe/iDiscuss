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
     include 'partials/_header.php';
     include 'partials/_dbconnect.php';
    ?>
    
<?php
$showAlert = false;
$showError = false;
if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    //include 'partials/_dbconnect.php';
    $name = $_POST["name"];
    $email = $_POST["email"];
    $feedback = $_POST["feedback"]; 

        // $exists = false; 
        $sql = "INSERT INTO `contact` (`name`,`email`,`feedback`) VALUES ('$name', '$email', '$feedback');";
        $res = mysqli_query($conn, $sql);
            if ($res){
                $showAlert = true;
            }
        
        else{
            $showError = "Feedback not Submitted";
        }
    }
    


if($showAlert){
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> Your Feedback is successfully submitted

    </div> ';
    }
    if($showError){
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> '. $showError.'
 
    </div> ';
    }
    ?>
    <!-- <?php
        // $to = "nanditap580@gmail.com";
        // $subject = "My subject";
        // $txt = "Hello world!";
        // $headers = "From: webmaster@example.com" . "\r\n" .
        // "CC: somebodyelse@example.com";

        // mail($to,$subject,$txt,$headers);
    ?> -->
<div class="container">
<div class="container my-4  p-4 col-md-7 border border-2 " >
     <h1 class="text-center">Contact Us</h1>
     <form action="contact.php" method="post">
        <div class="form-group ">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" required>
        </div>

        <div class="form-group ">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" required>
        </div>


        <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Your Feedback, Suggestion or any problem encountered</label>
  <textarea class="form-control" id="exampleFormControlTextarea1" name="feedback" rows="3"></textarea>
</div>
        <button type="submit" class="btn btn1">Submit</button>
     </form>
    </div>

</div>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
</body>
</html>