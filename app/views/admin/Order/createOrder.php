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
    <h1 class = "d-flex justify-content-center">Create Order</h1>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/admin/orderdashboard" method="POST">
        <div class="mb-3">
          <label for="fullname" class="form-label">Client Name</label>
          <input type="text" class="form-control" id="fullname" name="client_name"  required>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Adress</label>
          <input type="text" class="form-control" id="fullname" name="address"  required>
        </div>
        <div class="mb-3">
          <label for="fullname" class="form-label">Phone Number</label>
          <input type="tel" class="form-control" id="fullname" name="phone" required maxlength = "15">
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email"  required>
        </div>
        <div class="mb-3">
          <label for="registration_date" class="form-label">Order Time</label>
          <input type="datetime-local" class="form-control" id="order_time" name="order_time"  required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Payment Method</label>
          <select name="payment_method" class = "form-control">
            <option value="paypal">Paypal</option>
            <option value="ideal">Ideal</option>
            <option value="creditcard">Creditcard</option>
          </select>
        </div>
        <button type="submit" name="createOrder" class="btn btn-primary">Submit</button>
        <button class = "btn btn-danger" onclick = "window.location.href = '/admin/orderdashboard'">Back</button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>