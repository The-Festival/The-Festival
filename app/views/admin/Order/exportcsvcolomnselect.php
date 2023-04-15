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
    <h1 class = "d-flex justify-content-center">Select colomns</h1>

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
      <form action="/admin/orderexportcsv" method="POST">
      <input  type="hidden"  name="csv">
      <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox1" name="order_id" required>
    <label class="form-check-label" for="checkbox1">Order id</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox2" name="client_name">
    <label class="form-check-label" for="checkbox2">Client Name</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox3" name="address">
    <label class="form-check-label" for="checkbox3">Address</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox4" name="phonenumber">
    <label class="form-check-label" for="checkbox4">Phonenumber</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox5" name="emailaddress">
    <label class="form-check-label" for="checkbox5">Email address</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox6" name="order_time">
    <label class="form-check-label" for="checkbox6">Order time</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox7" name="payment_method">
    <label class="form-check-label" for="checkbox7">Payment Method</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox8" name="total_vat">
    <label class="form-check-label" for="checkbox8">Total Vat</label>
  </div>
  <div class="form-check form-check-inline">
    <input class="form-check-input" type="checkbox" id="checkbox8" name="total_price">
    <label class="form-check-label" for="checkbox8">Total Price</label>
  </div>
  <div class="form-group mt-3">
  <button type="button" class="btn btn-info" id="check-all-btn">Check All</button>
  <button type="submit" class="btn btn-primary">Submit</button>
  <button type="button" class = "btn btn-danger" onclick = "window.location.href = '/admin/orderDashboard'">Back</button>
  </div>
      </form>
    </div>
  </div>
</div>
  </body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    //code provided by chatgpt

  $(document).ready(function() {
    // Add click event to the "Check All" button
    $('#check-all-btn').click(function() {
      $('input[type="checkbox"]').prop('checked', true);
    });
  });
</script>