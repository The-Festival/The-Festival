<?php
include __DIR__ . '/../header.php';

?>
</head>
  <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
        crossorigin="anonymous">
    <link type="text/css"
        rel = "stylesheet"
        href = "/css/styleYummy.css"/>
</head>

<body>
<div class="container-fluid text-center">
    <div class="row justify-content-center">
        <div class="col-lg-12 top">
            <h1 id="title">Yummy</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h3 class="heading">Welcome to Yummy!</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <p class="text-black">Although Haarlem had not a globally known culinary tradition there are lots of restaurants that are worth your while. Here you can find all the restaurants that participate in this festival and their discounted prices! The food varies from Dutch cuisine to Indian!</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h2 class="header-large">The Festival's Hottest</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-2 hottest-rest" >
            <div class="row hottest-text"><p>Ratatouille</p></div>
            <div class="row hottest-img"><img src="/img/Dish-1.png"></img></div>
            <div class="row hottest-text"><p>€45/2 hrs</p></div>
            <div class="row"><button class="reserve-button">Reserve</button></div>
        </div>
        <div class="col-2 hottest-rest" >
            <div class="row hottest-text"><p>Restaurant ML</p></div>
            <div class="row hottest-img"><img src="/img/Dish-2.png"></img></div>
            <div class="row hottest-text"><p>€45/2 hrs</p></div>
            <div class="row"><button class="reserve-button">Reserve</button></div>
        </div>
        <div class="col-2 hottest-rest" >
            <div class="row hottest-text"><p>Specktakel</p></div>
            <div class="row hottest-img"><img src="/img/Dish-3.png"></img></div>
            <div class="row hottest-text"><p>€35/1.5 hrs</p></div>
            <div class="row"><button class="reserve-button">Reserve</button></div>
        </div>
    </div>
    <div class="row justify-content-center to-know-background">
                <div class="col-8 to-know">
                    <h3 class="title-white">Good to know:</h3>
                    <ul class="to-know-list">
                        <li >Children under 12 years have 50% off at every restaurant</li>
                        <li >Reservation is mandatory. A reservation fee of €10/person will be charged when a reservation is made on the Haarlem Festival site</li>
                        <li >All restaurants are located in Haarlem, Netherlands</li>
                    </ul>
                    <img src="/img/Yummy1.png" id="to-know-img"></img>
                </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h2 class="header-large" >Our selection</h2>
            <div class="row justify-content-center">
                
                <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" ></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/ratatouille1.jpg" class="d-block w-100" alt="Ratatouille">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/ratatouille1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/ratatouille1.jpg" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
        <a href="/yummy/yummyDetail"><button class="reserve-button-end">Reserve</button></a>
        </div>
    </div>
</div>
    <script>
        var myCarousel = document.querySelector('#carouselExampleCaptions')
        var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 2000,
        wrap: false
        })</script>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>


