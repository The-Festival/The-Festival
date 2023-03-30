<?php
$var = 'dashboard';
include __DIR__ . '/../../header.php';
?>

<!-- Buttons to switch what dashboard the admin wants to see -->

<div class="row dashboard-button-background">
    <button class="col text-light dashboard-button ">Jazz</button>
    <button class="col text-light dashboard-button ">Yummy</button>
    <a href="admin/historyDashboard" class="col text-light dashboard-button active">History</a>

</div>
    <h1 class = "d-flex justify-content-center">Historical Places</h1>

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
        <button type="button" onclick = "window.location.href = '/admin/addHistoricalPlace'" class="btn btn-success m-1">Create Historical Place</button>
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
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Text</th>
                                        <th>Location</th>
                                        <th>Image</th>
                                    </tr>
        </thead>
        <tbody>
            <?php foreach($data as $poi){ ?>
                <tr>
                    <td><?php echo $poi->getPointOfInterest(); ?></td>
                    <td><?php echo $poi->getName(); ?></td>
                    <td><?php echo $poi->getText(); ?></td>
                    <td><?php echo $poi->getLocation(); ?></td>
                    <td><?php echo $poi->getPhoto(); ?></td>
                    <td>
                        <a href="/admin/editHistoryEvent?id=<?php echo $poi->getPointOfInterest(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/userdashboard?delete=<?php echo $poi->getPointOfInterest(); ?>" class="btn btn-danger">Delete</a>    
                </tr>
            <?php } ?>
        
    </div>
  </body>
</html>