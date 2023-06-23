<?php
require __DIR__ . '/../header.php';
?>

<head>
<meta charset="UTF-8"
        rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
        crossorigin="anonymous">
    <link type="text/css"
        rel = "stylesheet"
        href = "/css/passwdstyle.css"/>
    <title>Reset Password</title>
</head>
<div class="container-fluid text-center">
        <div class="row justify-content-center">
          <h3 class = "d-flex text-center"><?php if(isset($_GET['errorMessage'])){
      echo $_GET['errorMessage'];
      }?></h3>
            <form class="formPasswd" action="login/loginprogress" method="POST">
              <div class="form-group">
                  <label class="form-label" for="username">Username</label>
                  <input type="text" class="form-control" name="username" placeholder="Username">
              </div>
              <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
                <small id="emailHelp" class="form-text text-muted">dont have an account, press <a href="/signin">Here</a></small>
                <small id="emailHelp" class="form-text text-muted"><a href="/resetpasswd">Forgot password?</a></small>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
  </form>
        </div>
    </div>




<?php
require __DIR__ . '/../footer/footer.php';
?>
