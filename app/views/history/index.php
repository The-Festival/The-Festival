<?php
$var = 'history';
require __DIR__ . '/../header.php';
$poi = $POI[0];
?>
<div class="hero-image">
  <div class="hero-text">
    <h1 class="display-1">The Festival</h1>
    <p>321 days 10 hours 48 minutes 38 seconds</p>
  </div>
</div>

<div class="w-75 my-5 mx-auto ">
  <div class="block-1">


    <p><?php echo $poi->getText(); ?></p>
  </div>

  <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1QwRf-NzzYyQ-awbVT88sfzkIro1xAT8&ehbc=2E312F"class="w-100" height="480"></iframe>

    <div class="block-1">
    
    <div class="slideshow-container">

<!-- Full-width images with number and caption text -->
<?php for($i = 0; $i < count($slider); $i++){?>

   <div class="mySlides fade">
      <p><?php echo $slider[$i]->getText(); ?></p>
      <div class="text">Caption Text</div>
   </div>

<?php } ?>

<style></style>

<!-- <div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="img2.jpg" style="width:100%">
  <div class="text">Caion Two</div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="img3.jpg" style="width:100%">
  <div class="text">Caption Three</div>
</div> -->

<!-- Next and previous buttons -->
<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">

   <?php for($i = 0; $i < count($slider); $i++){?> 

      <span class="dot" onclick="currentSlide(<?php echo $i+1;?>)"></span>

   <?php } ?>
<!-- <span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span> -->
</div>

   </div>
</div>
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>



</div> -->