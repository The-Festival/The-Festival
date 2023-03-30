
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

    <h1 class = "d-flex justify-content-center">Create Historical Event</h1>

    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">

      <form action="/admin/processHistoryEvent" method="POST" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="mb-3">
          <label for="sliderText" class="form-label">Slider Text</label>
          <textarea name="sliderText" id="sliderText" cols="30" rows="5" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
          <label for="sliderImage" class="form-label">Slider Image</label>
          <input type="file" class="form-control" id="sliderImage" name="sliderImage" value="" required>
        </div>
        <div class="mb-3">
          <label for="place" class="form-label">Place</label>
          <input type="text" class="form-control" id="place" name="place" value="Haarlem" required>
        </div>
        <div class="mb-3">
          <label for="postalCode" class="form-label">Postal Code</label>
          <input type="text" class="form-control" id="postalCode" name="postalCode" value="" required>
        </div>
        <div class="mb-3">
          <label for="streetName" class="form-label">Street Name</label>
          <input type="text" class="form-control" id="streetName" name="streetName" value="" required>
        </div>
        <div class="mb-3">
          <label for="number" class="form-label">Number</label>
          <input type="number" class="form-control" id="number" name="number" value="" required>
        </div>
        
        

        <button type="submit" name="add" class="btn btn-primary w-50 float-left">Submit</button>
        <a class="btn btn-danger w-50 float-right" onclick="window.location.href='/admin/historyDashboard'">Back</a>

      </form>

    </div>
  </div>
</div>
  </body>
</html>

