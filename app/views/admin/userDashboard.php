<?php include_once __DIR__ . "/../header.php"?>
  <body>
    <h1 class = "d-flex justify-content-center">User</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container">
  <div class="col d-flex flex-row-reverse">
        <div> <form action="/users" method = "POST">
            <button type="submit" class="btn btn-primary m-1">Search</button>        
        </div>
        <div>
            <input class="form-control form-control-dark w-100 m-1" type="text" placeholder="Search on name" name = "search" aria-label="Search">
            </form>
        </div>
        <div>
        <button type="button" onclick = "window.location.href = '/users/createuser'" class="btn btn-success m-1">Create User</button>
        </div>
        <div class="dropdown m-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/users">All</a></li>
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
                    <td><?php echo $user->getUserId(); ?></td>
                    <td><?php echo $user->getFullName(); ?></td>
                    <td><?php echo $user->getEmail(); ?></td>
                    <td><?php echo $user->getRole(); ?></td>
                    <td><?php echo $user->getRegistrationDate(); ?></td>
                    <td>
                        <a href="/users/edituser?id=<?php echo $user->getUserId(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/users?delete=<?php echo $user->getUserId(); ?>" class="btn btn-danger">Delete</a>    
                </tr>
            <?php endforeach; ?>
    </div>
  </body>
</html>