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
    <h1 class = "d-flex justify-content-center">Edit Order</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->

    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/admin/orderdashboard" method="POST">
        <div class="mb-3">
          <label for="ID" class="form-label">Order ID</label>
          <input type="text" class="form-control" id="id" name="order_id" value="<?php echo $order->getOrderId(); ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Client Name</label>
          <input type="text" class="form-control" id="fullname" name="client_name" value="<?php echo $order->getClientName(); ?>" required>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Adress</label>
          <input type="text" class="form-control" id="fullname" name="address" value="<?php echo $order->getAddress(); ?>" required>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="fullname" name="phone" value="<?php echo $order->getPhonenumber(); ?>" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="<?php echo $order->getEmailaddress(); ?>" required>
        </div>
        <div class="mb-3">
          <label for="registration_date" class="form-label">Order Time</label>
          <input type="datetime-local" class="form-control" id="order_time" name="order_time" value="<?php echo $order->getOrderTime(); ?>" required>
        </div>
        <div class="mb-3">
        <select name="payment_method" class="form-control">
            <option value="paypal"<?php if ($order->getPaymentMethod() == 'paypal') echo ' selected'; ?>>Paypal</option>
            <option value="ideal"<?php if ($order->getPaymentMethod() == 'ideal') echo ' selected'; ?>>Ideal</option>
            <option value="creditcard"<?php if ($order->getPaymentMethod() == 'creditcard') echo ' selected'; ?>>Creditcard</option>
      </select>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Total Price</label>
          <input type="number" step = "0.01" class="form-control" id="payment Method" name="total_price" value="<?php echo $order->getTotalPrice(); ?>" readonly>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Total Vat</label>
          <input type="number" step = "0.01" class="form-control" id="payment Method" name="total_vat" value="<?php echo $order->getTotalVat(); ?>" readonly>
        </div>
        <button type="submit" name="editOrder" class="btn btn-primary">Submit</button>
        <button class = "btn btn-danger" onclick = "window.location.href = '/admin/orderdashboard'">Back</button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>