<?php

require __DIR__ . '/../header.php';

$poi = $POI[0]

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

      <!-- Full-width slides/quotes -->
      <div class="mySlides">
        <q>I love you the more in that I believe you had liked me for my own sake and for nothing else</q>
        <p class="author">- John Keats</p>
      </div>

      <div class="mySlides">
        <q>But man is not made for defeat. A man can be destroyed but not defeated.</q>
        <p class="author">- Ernest Hemingway</p>
      </div>

      <div class="mySlides">
        <q>I have not failed. I've just found 10,000 ways that won't work.</q>
        <p class="author">- Thomas A. Edison</p>
      </div>

      <!-- Next/prev buttons -->
      <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="next" onclick="plusSlides(1)">&#10095;</a>
      </div>

      <!-- Dots/bullets/indicators -->
      <div class="dot-container">
      <span class="dot" onclick="currentSlide(1)"></span>
      <span class="dot" onclick="currentSlide(2)"></span>
      <span class="dot" onclick="currentSlide(3)"></span>
      </div>

    </div>
</div>
