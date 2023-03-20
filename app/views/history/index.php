<?php

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
    
    <div id="slider">
      
    <?php
              $count = 1;
              foreach($slider as $slide){
              if($count == 1){
              ?>

                 <input type="radio" name="slider" id="slide<?php echo $count; ?>" checked>

           <?php
              }else { ?>
                 <input type="radio" name="slider" id="slide<?php echo $count; ?>">

              <?php }
           $count++;
           }
          ?>
   <div id="slides">
      <div id="overflow">
         <div class="inner">

          <?php
              $count = 1;
              foreach($slider as $slide){
              ?>
              <div class="slide slide_<?php echo $count; ?>">
               <div class="slide-content">
                  <h2>Slide 1</h2>
                  <p>Content for Slide 1</p>
               </div>
            </div>
           <?php
           $count++;
           }
          ?>

         </div>
      </div>
   </div>
   <div id="controls">

   <?php
              $count = 1;
              foreach($slider as $slide){
              ?>
              <label for="slide<?php echo $count; ?>" class="display-5 fw-bold">></label>
           <?php
           $count++;
           }
          ?>

   </div>
   <div id="bullets">
   <?php
              $count = 1;
              foreach($slider as $slide){
              ?>
              <label for="slide<?php echo $count; ?>"></label>
              
           <?php
           $count++;
           }
          ?>
   </div>
</div>
<style>

#slider {
   margin: 0 auto;
   width: 800px;
   max-width: 100%;
   text-align: center;
}
#slider input[type=radio] {
   display: none;
}
#slider label {
   cursor:pointer;
   text-decoration: none;
}
#slides {
   padding: 10px;
   border: 3px solid #ccc;
   background: #fff;
   position: relative;
   z-index: 1;
}
#overflow {
   width: 100%;
   overflow: hidden;
}
#slide1:checked ~ #slides .inner {
   margin-left: 0;
}
#slide2:checked ~ #slides .inner {
   margin-left: -100%;
}
#slide3:checked ~ #slides .inner {
   margin-left: -200%;
}
#slide4:checked ~ #slides .inner {
   margin-left: -300%;
}
#slide5:checked ~ #slides .inner {
   margin-left: -400%;
}
#slide6:checked ~ #slides .inner {
   margin-left: -500%;
}
#slide7:checked ~ #slides .inner {
   margin-left: -600%;
}
#slide8:checked ~ #slides .inner {
   margin-left: -700%;
}
#slide9:checked ~ #slides .inner {
   margin-left: -800%;
}
#slides .inner {
   transition: margin-left 800ms cubic-bezier(0.770, 0.000, 0.175, 1.000);
   width: 900%;
   line-height: 0;
   height: 300px;
}
#slides .slide {
   width: 11.1%;
   float:left;
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100%;
   color: #fff;
}
#slides .slide_1 {
   background: #00171F;
}
#slides .slide_2 {
   background: #003459;
}
#slides .slide_3 {
   background: #007EA7;
}
#slides .slide_4 {
   background: #00A8E8;
}
#controls {
   margin: -180px 0 0 0;
   width: 100%;
   height: 50px;
   z-index: 3;
   position: relative;
}
#controls label {
   transition: opacity 0.2s ease-out;
   display: none;
   width: 50px;
   height: 50px;
   opacity: .4;
}
#controls label:hover {
   opacity: 1;
}
#slide1:checked ~ #controls label:nth-child(9),
#slide1:checked ~ #controls label:nth-child(8),
#slide1:checked ~ #controls label:nth-child(7),
#slide2:checked ~ #controls label:nth-child(6),
#slide3:checked ~ #controls label:nth-child(5),
#slide1:checked ~ #controls label:nth-child(2),
#slide2:checked ~ #controls label:nth-child(3),
#slide3:checked ~ #controls label:nth-child(4),
#slide4:checked ~ #controls label:nth-child(1) {
   float:right;
   margin: 0 -50px 0 0;
   display: block;
}
#slide1:checked ~ #controls label:nth-last-child(9),
#slide1:checked ~ #controls label:nth-last-child(8),
#slide1:checked ~ #controls label:nth-last-child(7),
#slide2:checked ~ #controls label:nth-last-child(6),
#slide3:checked ~ #controls label:nth-last-child(5),
#slide1:checked ~ #controls label:nth-last-child(2),
#slide2:checked ~ #controls label:nth-last-child(3),
#slide3:checked ~ #controls label:nth-last-child(4),
#slide4:checked ~ #controls label:nth-last-child(1) {
    transform: rotate(-180deg);
   float:left;
   margin: 0 0 0 -50px;
   display: block;
}
#bullets {
   margin: 150px 0 0;
   text-align: center;
}
#bullets label {
   display: inline-block;
   width: 10px;
   height: 10px;
   border-radius:100%;
   background: #ccc;
   margin: 0 10px;
}
#slide3:checked ~ #bullets label:nth-child(9),
#slide3:checked ~ #bullets label:nth-child(8),
#slide3:checked ~ #bullets label:nth-child(7),
#slide3:checked ~ #bullets label:nth-child(6),
#slide3:checked ~ #bullets label:nth-child(5),
#slide1:checked ~ #bullets label:nth-child(1),
#slide2:checked ~ #bullets label:nth-child(2),
#slide3:checked ~ #bullets label:nth-child(3),
#slide4:checked ~ #bullets label:nth-child(4) {
   background: #444;
}
@media screen and (max-width: 900px) {
   #slide1:checked ~ #controls label:nth-child(2),
   #slide2:checked ~ #controls label:nth-child(3),
   #slide3:checked ~ #controls label:nth-child(4),
   #slide4:checked ~ #controls label:nth-child(1),
   #slide1:checked ~ #controls label:nth-last-child(2),
   #slide2:checked ~ #controls label:nth-last-child(3),
   #slide3:checked ~ #controls label:nth-last-child(4),
   #slide4:checked ~ #controls label:nth-last-child(1) {
      margin: 0;
   }
   #slides {
      max-width: calc(100% - 140px);
      margin: 0 auto;
   }
}

</style>
  </div>
</div>
