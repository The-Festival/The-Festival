<?php
$var = 'history';
$name = $slider[$_GET['id']-1]->getName();
require __DIR__ . '/../../header.php';
?>
<div class="hero-image mb-3" id="hero-image"></div>

<div class="container w-75">

  <form action="test" method="POST" class="border border-dark p-3 mb-5">
    <label for="newName" class="form-label text-primary display-6">Edit Event Name</label>
    <input type="text" class="form-control" name="newName" value="<?php echo $name; ?>">
    <button class="btn btn-primary">submit</button>
  </form>

  <?php 
  if($data != null){
    foreach($data as $dat){ ?>
      <form action="/admin/editTextAndImage" method="POST" class="border border-dark p-3 mb-5">

        <input type="hidden" name="id" value="<?php echo $dat->getPointOfInterest(); ?>">

        <label for="newText" class="form-label text-primary display-6">Edit Event Text / Image</label>
    
        <div class="detailSection containter w-75 mx-auto mb-5">
          <textarea class="form-control" name="newText" rows="3"><?php echo $dat->getText(); ?></textarea>
          <img src="<?php echo $dat->getPhoto(); ?>" alt="image" class="detailIMG">
        </div>
        <label for="newFile">upload new image</label>
        <input type="file" class="form-control" name="newFile">
  
     
  
      <button class="btn btn-primary">submit</button>
    </form>
    <?php } 
  } else { ?>
    <form action="test" method="post" enctype="multipart/form-data" class="border border-dark p-3 mb-5">
      <label for="newText" class="form-label text-primary display-6">Edit Event Text / Image</label>
  
      <div class="d-flex gap-3 flex-row containter">
        <textarea class="form-control" name="newText" rows="3"></textarea>
        <input type="file" class="form-control float-right" name="newFile">
      </div>
  
      <button class="btn btn-primary">submit</button>
    </form>
  <?php } ?>
  

  
</div>


<?php 
require __DIR__ . '/../../footer/footer.php';
?>
<?php if($banner == null){ ?>
<script>
  function heroBackground() {
    var hero = document.getElementById("hero-image");
        hero.style.backgroundImage = 'none';
        hero.style.backgroundColor = 'grey';

        var form = document.createElement("form");
        form.setAttribute('method', 'post');
        form.setAttribute('action', '/admin/uploadBanner');
        form.setAttribute('enctype', 'multipart/form-data');

        var div = document.createElement("div");
        div.classList.add("form-group", "w-75", "mx-auto");

        var label = document.createElement("label");
        label.setAttribute('for', 'file');
        label.innerHTML = "Upload Banner";
        label.classList.add("form-label");
        div.appendChild(label);

        var input = document.createElement("input");
        input.setAttribute('type', 'file');
        input.setAttribute('name', 'file');
        input.classList.add('form-control')
        div.appendChild(input);

        var button = document.createElement("button");
        button.classList.add('btn', 'btn-primary');
        button.innerHTML = "Upload";
        div.appendChild(button);

        form.appendChild(div);
        hero.appendChild(form);

    }
    window.onload = heroBackground();    
</script>
<?php } ?>
<?php if(isset($banner) != null){ 
  ?>
  <script>
    function heroBackground2() {
        document.getElementById("hero-image").style.backgroundImage = "url('<?php echo $banner[0]->getFilepath(); ?>')";
    }
    window.onload = heroBackground2();
  </script>
<?php } ?>