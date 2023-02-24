<?php
require __DIR__ . '/../header.php';
?>

<form action="login/loginprogress" method="POST">
  <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <small id="emailHelp" class="form-text text-muted">dont have an account, press <a href="signin">Here</a></small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

echo "alles root";
require __DIR__ . '/../footer/footer.php';
?>