
<?php
$var = 'dashboard';
include __DIR__ . '/../../header.php';
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<!-- Buttons to switch what dashboard the admin wants to see -->

<div class="row dashboard-button-background">
    <button class="col text-light dashboard-button ">Jazz</button>
    <button class="col text-light dashboard-button ">Yummy</button>
    <a href="/admin/historyDashboard" class="col active text-light dashboard-button ">History</a>

</div>

    <h1 class = "d-flex justify-content-center">Edit User</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/admin/userdashboard" method="POST">
        <div class="mb-3">
          <label for="fullname" class="form-label">Full Name</label>
          <input type="text" class="form-control" id="fullname" name="fullname" value="" required>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Password</label>
          <input type="text" class="form-control" id="fullname" name="password" value="" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="" required>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Role</label>
          <select class="form-select" id="role" name="role" multiple required>
            <option value="admin">Admin</option>
            <option value="employee">Employee</option>
            <option value="customer">Customer</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="registration_date" class="form-label">Registration Date</label>
          <input type="date" class="form-control" id="registration_date" name="registration_date" value="<?php echo date('Y-m-d'); ?>" required>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
        <button class="btn btn-danger" onclick="window.location.href='/admin/userDashboard'">Back</button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>