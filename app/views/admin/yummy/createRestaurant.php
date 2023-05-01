<?php include __DIR__ . '/../../header.php'; ?>

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
    <h1 class = "d-flex justify-content-center">New Restaurant</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/yummy/addRestaurant" method="POST">
        <div class="mb-3">
          <label for="text" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Description</label>
          <input type="textfield" class="form-control" id="description" name="description" value="" required>
        </div>
        <div class="mb-3">
          <label for="int" class="form-label">Price adults</label>
          <input type="int" class="form-control" id="price" name="price" value="" required>
        </div>
        <div class="mb-3">
          <label for="int" class="form-label">Price kids</label>
          <input type="int" class="form-control" id="price" name="price_kids" value="" required>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Star rating</label>
          <select class="form-select" id="star_rating" name="star_rating" multiple required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="2">4</option>
            <option value="3">5</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cuisine" class="form-label">Cuisine</label>
          <input type="text" class="form-control" id="cuisine" name="cuisine" value="" required>
        </div>
        <div class="mb-3">
          <label for="website" class="form-label">Website</label>
          <input type="text" class="form-control" id="website" name="website" value="" required>
        </div>
        <div class="mb-3">
          <label for="phonenumber" class="form-label">Phonenumber</label>
          <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="" required>
        </div>
        <div class="mb-3">
          <label for="total_seats" class="form-label">Total seats</label>
          <input type="int" class="form-control" id="total_seats" name="total_seats" value="" required>
        </div>
        <div class="mb-3">
          <label for="streetname" class="form-label">Streetname</label>
          <input type="text" class="form-control" id="streetname" name="streetname" value="" required>
        </div>
        <div class="mb-3">
          <label for="postalcode" class="form-label">Postalcode</label>
          <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="1234AB" value="" required>
        </div>
        <div class="mb-3">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city" placeholder="" value="" required>
        </div>
        <div class="mb-3">
          <label for="housenumber" class="form-label">Housenumber</label>
          <input type="text" class="form-control" id="housenumber" name="housenumber" placeholder="" value="" required>
        </div>
        <button type="submit" name="add" class="btn btn-primary">Submit</button>
        <button class="btn btn-danger" onclick="window.location.href='/yummy/yummyDashboard'">Back</button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>
<?php include __DIR__ . '/../../footer/footer.php'; ?>