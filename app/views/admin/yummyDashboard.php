<?php include __DIR__ . '/../header.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type = "text/css" rel="stylesheet" href="css/userDashboard.css">
    <title>Yummy Dashboard</title>
  </head>

  <body>
    <h1 class = "d-flex justify-content-center">Yummy</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
    <div class="container">
  <div class="col d-flex flex-row-reverse">
        <div> <form action="/yummy/yummyDashboard" method = "POST">
            <button type="submit" class="btn btn-primary m-1">Search</button>        
        </div>
        <div>
            <input class="form-control form-control-dark w-100 m-1" type="text" placeholder="Search on name" name = "search" aria-label="Search">
            </form>
        </div>
        <div>
        <button type="button" onclick = "window.location.href = '/yummy/addRestaurant'" class="btn btn-success m-1">Create Restaurant</button>
        </div>
        <!-- <div class="dropdown m-1">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Filter
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="/admin/userdashboard">All</a></li>
                <li><a class="dropdown-item" href="?role=admin">Admin</a></li>
                <li><a class="dropdown-item" href="?role=employee">Employee</a></li>
                <li><a class="dropdown-item" href="?role=customer">Customer</a></li>
            </ul>
            </div> -->
   
  </div>
</div>
    <div class = "d-flex justify-content-center">
    <table class="table table-bordered table-striped widened w-50 p-3">
        <thead>
            <tr>
                <th>Restaurant id</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Price kids</th>
                <th>Star rating</th>
                <th>Cuisine</th>
                <th>Website</th>
                <th>Phonenumber</th>
                <!-- <th>Total seats</th> -->
                <th>Streetname</th>
                <th>Postalcode</th>
                <th>City</th>
                <th>Housenumber</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($restaurantList as $restaurant): ?>
                <tr>
                    <td><?php echo $restaurant->restaurant_id; ?></td>
                    <td><?php echo $restaurant->name; ?></td>
                    <td><?php echo $restaurant->description; ?></td>
                    <td>€ <?php echo $restaurant->price; ?></td>
                    <td>€ <?php echo $restaurant->price_kids; ?></td>
                    <td><?php echo $restaurant->star_rating; ?></td>
                    <td><?php echo $restaurant->cuisine; ?></td>
                    <td><?php echo $restaurant->website; ?></td>
                    <td><?php echo $restaurant->phonenumber; ?></td>
                    <!-- <td>total seats</td> -->
                    <td><?php echo $restaurant->streetname; ?></td>
                    <td><?php echo $restaurant->postalcode; ?></td>
                    <td><?php echo $restaurant->city; ?></td>
                    <td><?php echo $restaurant->housenumber; ?></td>
                    <td>
                        <a href="/yummy/edituser?id=<?php echo $restaurant->restaurnt_id; ?>" class="btn btn-primary">Edit</a>
                        <a href="/yummy/yummyDashboard?delete=<?php echo $restaurant->restaurant_id; ?>" class="btn btn-danger">Delete</a>    
                </tr>
            <?php endforeach; ?>
        </tbody>
        
    </div>
  </body>
</html>
