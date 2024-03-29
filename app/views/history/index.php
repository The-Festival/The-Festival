<?php
$var = 'history';
$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
require __DIR__ . '/../header.php';
?>
<div class="hero-image">
  <div class="hero-text">
    <h1 class="display-1">The Festival</h1>
    <p>321 days 10 hours 48 minutes 38 seconds</p>
  </div>
</div>

<div class="w-75 my-5 mx-auto ">
  <div class="block-1">


    <p>Take a 2 hour tour the City of Haarlem to immerse yourself into the history of one of the oldest cities in the Netherlands. An amazing walk of discovery covering nine historic landmarks starting at St. Bavo Kerk the walk shows how much the city has changed from the 13th Century. Refreshments will be available at the iconic Jopenkerk. Do not miss on on this great opportunity for the whole family</p>
  </div>

  <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1QwRf-NzzYyQ-awbVT88sfzkIro1xAT8&ehbc=2E312F"class="w-100" height="480"></iframe>

  <div class="block-1 mb-5">
    
    <div class="slideshow-container" style="min-height:350px;">

<!-- Full-width images with number and caption text -->
      <?php for($i = 0; $i < count($slider); $i++){?>

        <div class="mySlides fade" style="box-sizing:border-box;">
            <p style="float:left; max-width:50%"><?php echo $slider[$i]->getText(); ?></p>
            <img style="float:right; max-width:30%; max-height:50%%;" src="<?php echo $slider[$i]->getPhoto(); ?>" alt="">
        </div>

      <?php } ?>

<!-- Next and previous buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
    </div>

<!-- The dots/circles -->
    <div style="text-align:center">

      <?php for($i = 0; $i < count($slider); $i++){?> 

          <span class="dot" onclick="currentSlide(<?php echo $i+1;?>)"></span>

      <?php } ?>
    </div>

  </div>

  <table class="table mb-5">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
      <th scope="col">Available languages</th>
      <th scope="col">Available spaces</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($tourInfo as $tour) {
      $datetime = explode(" ", $tour->getDatetime());
      ?>
      <tr>
        <td><?php echo $datetime[0]; ?></td>
        <td><?php echo $datetime[1]; ?></td>
        <td><?php echo $tour->getName(); ?></td>
        <td><?php echo $tour->getSpacesLeft(); ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>

<div class="container-fluid text-center">
        <div class="row justify-content-center">
          <div class="d-flex w-50 mx-auto justify-content-center tourInfoBox align-middle p-3">
            <div class="m-auto">
            <p>Starting location: <b>St. Bavo Church</b></p>
            <p>Price per person: <b>&euro;17.50</b></p>
            <p class="mb-0">Family up to 4 people: <b>&euro;60,00</b></p>
            </div>
            <a class="tourBTN" href="/history/addTourToCart?id=1">BOOK A TOUR</a>
          </div>
            
                
        </div>
    </div>

</div>


<div class="container-fluid text-center">
  <div class="row justify-content-center">
    <div class="d-flex w-50 mx-auto justify-content-center tourInfoBox align-middle p-3">
      <div class="m-auto">
          <p>Share this tour on social media</p>
          <p><a href="http://reddit.com/submit?url=<?php echo $url ?>&title=Simple Share Buttons" target="_blank">Reddit</a></p>
          <p><a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">Pinterest</a></p>
      </div>
    </div>
  </div>
              
</div>

<div class="row justify-content-center to-know-background">
        <div class="col-8 to-know">
                <h3 class="display-3 bold text-white font-weight-bold">Good to know:</h3>
                <ul class="to-know-list">
                    <li >Due to the nature of this walk participants must be a minimum of 12 years
old and no strollers are allowed.</li>
                    <li >
Groups will consist of 12 participants + 1
 guide</li>
                </ul>
                <img src="/img/Yummy1.png" id="to-know-img"></img>
        </div>     
    </div>



<?php
include __DIR__ . '/../footer/footer.php';
?>
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


