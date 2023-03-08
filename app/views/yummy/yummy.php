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
        <div class="col-lg-12">
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
            <p>Algemene tekst yummy</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h3>The Festival's Hottest</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-3" >
            <div class="row"><p>Naam</p></div>
            <div class="row"><img></img></div>
            <div class="row"><p>price</p></div>
            <div class="row"><button>Reserve</button></div>
        </div>
        <div class="col-3" >
            <div class="row"><p>Naam</p></div>
            <div class="row"><img></img></div>
            <div class="row"><p>price</p></div>
            <div class="row"><button>Reserve</button></div>
        </div>
        <div class="col-3" >
            <div class="row"><p>Naam</p></div>
            <div class="row"><img></img></div>
            <div class="row"><p>price</p></div>
            <div class="row"><button>Reserve</button></div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8" >
            <h3>Good to know</h3>
            <a>Good to know tekst</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h2>Our selection</h2>
                <div class="row justify-content-center">
                <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
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
                    <img src="..." class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                    </div>
                    <div class="carousel-item">
                    <img src="..." class="d-block w-100" alt="...">
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
            <button>Reserve</button>
        </div>
    </div>
</div>
    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>


