<?php
$var = 'history';
require __DIR__ . '/../../header.php';
?>
<div class="hero-image mb-3" id="hero-image"></div>

<div class="container w-75">

  <form action="test" method="POST" class="border border-dark p-3 mb-5">
    <label for="newName" class="form-label text-primary display-6">Edit Event Name</label>

    <?php 
    if(isset($data[0])){ ?>
      <input type="text" class="form-control" name="newName" value="<?php echo $data[0]->getName(); ?>">
    <?php } else { ?>
      <input type="text" class="form-control" name="newName" value="">
    <?php } ?>

    <button class="btn btn-primary">submit</button>
  </form>

  <form action="test" method="POST" class="border border-dark p-3 mb-5">
    <label for="newText" class="form-label text-primary display-6">Edit Event Text</label>

    <?php if(isset($data[0])){ ?>
      <textarea class="form-control" name="newText" rows="3"><?php echo $data[0]->getText(); ?></textarea>
    <?php } else { ?>
      <textarea class="form-control" name="newText" rows="3"></textarea>
    <?php } ?>

    <button class="btn btn-primary">submit</button>
  </form>
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
  var_dump($banner);
  ?>
  <script>
    function heroBackground2() {
        document.getElementById("hero-image").style.backgroundImage = "url('<?php echo $banner[0]->getFilepath(); ?>')";
    }
    window.onload = heroBackground2();
  </script>
<?php } ?>