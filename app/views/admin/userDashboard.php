<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type = "text/css" rel="stylesheet" href="css/userDashboard.css">
    <title>User Dashboard</title>
  </head>
  <body>
    <h1 class = "d-flex justify-content-center">User</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <div class="container">
  <div class="col d-flex flex-row-reverse">
        <div> <form action="/admin/userdashboard" method = "POST">
            <button type="submit" class="btn btn-primary m-1">Search</button>        
        </div>
        <div>
            <input class="form-control form-control-dark w-100 m-1" type="text" placeholder="Search on name" name = "search" aria-label="Search">
            </form>
        </div>
        <div>
        <button type="button" onclick = "window.location.href = '/admin/createuser'" class="btn btn-success m-1">Create User</button>
        </div>
        <div class="dropdown m-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/admin/userdashboard">All</a></li>
                <li><a class="dropdown-item" href="?role=admin">Admin</a></li>
                <li><a class="dropdown-item" href="?role=employee">Employee</a></li>
                <li><a class="dropdown-item" href="?role=customer">Customer</a></li>
            </ul>
            </div>
   
  </div>
</div>
    <div class = "d-flex justify-content-center">
    <table class="table table-bordered table-striped widened w-75 p-3">
        <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Fullname</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Registration Date</th>
                                    </tr>
        </thead>
        <tbody>
            <?php foreach($users as $user): ?>
                <tr>
                    <td><?php echo $user->getUserID(); ?></td>
                    <td><?php echo $user->getFullname(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td><?php echo $user->getRole(); ?></td>
                    <td><?php echo $user->getRegistrationDate(); ?></td>
                    <td>
                        <a href="/admin/edituser?id=<?php echo $user->getUserID(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/userdashboard?delete=<?php echo $user->getUserId(); ?>" class="btn btn-danger">Delete</a>    
                </tr>
            <?php endforeach; ?>
        
    </div>
  </body>
</html>