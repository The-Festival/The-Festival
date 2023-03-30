<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link type = "text/css" rel="stylesheet" href="css/userDashboard.css">
    <title>Order Dashboard</title>
  </head>
  <body>
    <h1 class = "d-flex justify-content-center">Order</h1>

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
        <div>
        <button type="button" onclick = "window.location.href = '/admin/createorder'" class="btn btn-success m-1">Create User</button>
        </div>
  </div>
</div>
    <div class = "d-flex justify-content-center">
    <table class="table table-bordered table-striped widened w-75 p-3">
        <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Client Name</th>
                                        <th>Address</th>
                                        <th>Phone Number</th>
                                        <th>Email Addres</th>
                                        <th>Order Time</th>
                                        <th>Payment Method</th>
                                        <th>Total Vat</th>
                                        <th>Total Price</th>
                                        <th>Actions</th>
                                    </tr>
        </thead>
        <tbody>
            <?php foreach($orders as $order): ?>
                <tr>
                    <td><?php echo $order->getOrderId(); ?></td>
                    <td><?php echo $order->getClientName(); ?></td>
                    <td><?php echo $order->getAddress(); ?></td>
                    <td><?php echo $order->getPhonenumber(); ?></td>
                    <td><?php echo $order->getEmailaddress(); ?></td>
                    <td><?php echo $order->getOrderTime(); ?></td>
                    <td><?php echo $order->getPaymentMethod(); ?></td>
                    <td><?php echo $order->getTotalVat(); ?></td>
                    <td><?php echo $order->getTotalPrice(); ?></td>
                    <td>
                        <a href ="/admin/ticketdashboard?ticketsOrder=<?php echo $order ->getOrderId(); ?>" class = "btn btn-info">Tickets</a>
                        <a href="/admin/editorder?editOrder=<?php echo $order->getOrderId(); ?>" class="btn btn-primary">Edit</a>
                        <a href="/admin/orderdashboard?deleteOrder=<?php echo $order->getOrderId(); ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        
    </div>
  </body>
</html>