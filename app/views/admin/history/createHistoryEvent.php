
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
      <form action="/admin/userdashboard" method="POST">
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
          <label for="location" class="form-label">Location</label>
          <input type="text" class="form-control" id="location" name="location" value="" required>
        </div>

        

        <div class="mb-3" id="pageContainer">
          <h2 class="text-primary">Page Text and image's</h2>
    
          <div class="mb-3">
            <label for="pageText" class="form-label">Page Text</label>
            <textarea name="pageText" id="pageText" cols="30" rows="5" class="form-control" required></textarea>
          </div>

          <div class="mb-3">
            <label for="pageIMG" class="form-label">Page Image</label>
            <input type="file" class="form-control" id="pageIMG" name="pageIMG" value="" required>
          </div>

        </div>
        
        <a href="#pageContainer" id="addPageData" class=" btn btn-success mb-3 mx-auto w-100">Add page text and image</a>
        <br>
        <button type="submit" name="add" class="btn btn-primary w-50 float-left">Submit</button>
        <button class="btn btn-danger w-50 float-right" onclick="window.location.href='/admin/userDashboard'">Back</button>
      </form>
    </div>
  </div>
</div>
  </body>
</html>

<script>

  var container = document.getElementById('pageContainer');
  document.getElementById('addPageData').addEventListener('click', ()=>{
    var pageText = document.getElementById('pageText');
    var pageIMG = document.getElementById('pageIMG');
    if(container.childElementCount >= 10){
      return;
    }
    if(pageText.value == '' || pageIMG.value == ''){
      alert("please fill in the page text and image before adding another");
      return;
    }
    var group = document.createElement('div');
    group.classList.add('mb-3');

    var label = document.createElement('label');
    label.classList.add('form-label');
    label.value = 'Page Text';
    var pageText = document.createElement('textarea');
    pageText.classList.add('form-control');
    pageText.setAttribute("name","pageText");
    pageText.setAttribute("rows","5")


    group.appendChild(label);
    group.appendChild(pageText);

    container.appendChild(group);

    var group = document.createElement('div');
    group.classList.add('mb-3');

    var labelimg = document.createElement('label');
    labelimg.classList.add('form-label');
    labelimg.value = 'Page Image';
    var pageIMG = document.createElement('input');
    pageIMG.classList.add('form-control');
    pageIMG.setAttribute("name","pageIMG");
    pageIMG.setAttribute("type","file");

    group.appendChild(labelimg);
    group.appendChild(pageIMG);

    container.appendChild(group);
  })
</script>