
<!-- Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="partials/_HandleSignup.php" method="post" onsubmit="return myfun()">
  <div class="mb-3">
    <label for="signupEmail" class="form-label">Email address</label>
    <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp">
    <span id="message" style="color: red;"> </span>
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  
  <div class="mb-3">
    <label for="signupEmail" class="form-label">Username</label>
    <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
    <span id="message1" style="color: red;"> </span>
    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="signupPassword" name="password" value="">
    <span id="message2" style="color: red;"> </span>
  </div>
  <div class="mb-3">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="signupCpassword" name="cpassword" value="">
    <span id="message3" style="color: red;"> </span>
  </div>
  <!-- <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <!-- <button type="submit" class="btn btn1">Submit</button> -->

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn1" id="submit" value="Submit">Submit</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script src="partials/signup.js"></script>
