<?php
require __DIR__ . '/../header.php';
?>

<form action="signin/signinVerification" method="POST">
  <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" name="username" placeholder="Username">
  </div>
  <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" placeholder="Password">
    <small id="emailHelp" class="form-text text-muted">already have an account, press <a href="/login">Here</a></small>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php

require __DIR__ . '/../footer/footer.php';
?>