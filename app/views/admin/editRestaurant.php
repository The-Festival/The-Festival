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
    <h1 class = "d-flex justify-content-center">Edit Restaurant</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <form action="/yummy/editRestaurant" method="POST">
      <div class="mb-3">
          <label for="ID" class="form-label">User ID</label>
          <input type="text" class="form-control" id="id" name="id" value="<?php echo $restaurant->restaurant_id; ?>" readonly>
        </div>
      <div class="mb-3">
          <label for="text" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="<?php echo $restaurant->name; ?>" required>
        </div>
        <div class="mb-3">
          <label for="text" class="form-label">Description</label>
          <input type="textfield" class="form-control" id="description" name="description" value="<?php echo $restaurant->description; ?>" required>
        </div>
        <div class="mb-3">
          <label for="int" class="form-label">Price adults</label>
          <input type="int" class="form-control" id="price" name="price" value="<?php echo $restaurant->price; ?>" required>
        </div>
        <div class="mb-3">
          <label for="int" class="form-label">Price kids</label>
          <input type="int" class="form-control" id="price" name="price_kids" value="<?php echo $restaurant->price_kids; ?>" required>
        </div>
        <div class="mb-3">
          <label for="role" class="form-label">Star rating</label>
          <select class="form-select" id="star_rating" name="star_rating" multiple required>
            <option value="1 <?php if ($restaurant->star_rating === '1') echo 'selected'; ?>">1</option>
            <option value="2 <?php if ($restaurant->star_rating === '2') echo 'selected'; ?>">2</option>
            <option value="3 <?php if ($restaurant->star_rating === '3') echo 'selected'; ?>">3</option>
            <option value="2 <?php if ($restaurant->star_rating === '4') echo 'selected'; ?>">4</option>
            <option value="3 <?php if ($restaurant->star_rating === '5') echo 'selected'; ?>">5</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="cuisine" class="form-label">Cuisine</label>
          <input type="text" class="form-control" id="cuisine" name="cuisine" value="<?php echo $restaurant->cuisine; ?>" required>
        </div>
        <div class="mb-3">
          <label for="website" class="form-label">Website</label>
          <input type="text" class="form-control" id="website" name="website" value="<?php echo $restaurant->website; ?>" required>
        </div>
        <div class="mb-3">
          <label for="phonenumber" class="form-label">Phonenumber</label>
          <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="<?php echo $restaurant->phonenumber; ?>" required>
        </div>
        <div class="mb-3">
          <label for="total_seats" class="form-label">Total seats</label>
          <input type="int" class="form-control" id="total_seats" name="total_seats" value="<?php echo $restaurant->total_seats; ?>" required>
        </div>
        <div class="mb-3">
          <label for="streetname" class="form-label">Streetname</label>
          <input type="text" class="form-control" id="streetname" name="streetname" value="<?php echo $restaurant->streetname; ?>" required>
        </div>
        <div class="mb-3">
          <label for="postalcode" class="form-label">Postalcode</label>
          <input type="text" class="form-control" id="postalcode" name="postalcode" placeholder="1234AB" value="<?php echo $restaurant->postalcode; ?>" required>
        </div>
        <div class="mb-3">
          <label for="city" class="form-label">City</label>
          <input type="text" class="form-control" id="city" name="city" placeholder="" value="<?php echo $restaurant->city; ?>" required>
        </div>
        <div class="mb-3">
          <label for="housenumber" class="form-label">Housenumber</label>
          <input type="text" class="form-control" id="housenumber" name="housenumber" placeholder="" value="<?php echo $restaurant->housenumber; ?>" required>
        </div>
        <button type="submit" name="update" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>