<!DOCTYPE html>
<html lang="en" style="height: 100%;">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../css/jazzstylesheet.css">
    <title>Jazz</title>
</head>

<body>

    <?php
    include __DIR__ . '/../header.php';
    ?>

    <!-- Hero with "The Festival" and a count down timer -->

    <div class="hero">
        <h1 class="hero-title">The Festival</h1>
    </div>

    <!-- Intro -->

    <article class="container">
        <div class="row justify-content-between">
            <h2 class="intro-title">Haarlem Jazz</h2>
            <h2 class="intro-title">27 July - 30 July</h2>
        </div>
        <p class="intro-paragraph">The Haarlem Jazz Festival is a four-day celebration of jazz music, taking place from July 27th to July 30th in the historic city of Haarlem. Set against the stunning backdrop of Haarlem's historic architecture and picturesque canals, the festival brings together some of the biggest names in jazz, as well as up-and-coming talent, for a series of concerts, workshops, and jam sessions. With a diverse lineup of international and local artists, the Haarlem Jazz Festival is a must-attend event for any jazz enthusiast.</p>
    </article>

    <!-- 5 buttons to represent the artist selection -->
    <div class="container">
        <div class="row gap-3 justify-content-center">
            <button class="btn date-button">All <br> Artists</button>
            <button class="btn date-button">Thu <br> 27</button>
            <button class="btn date-button">Fri <br> 28</button>
            <button class="btn date-button">Sat <br> 29</button>
            <button class="btn date-button">Sun <br> 30</button>
        </div>
    </div>

    <!-- 4 Cards that represents the passes -->

    <div class="container">
        <div class="row gap-5">
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">Day pass <br> Thursday</h4>
                    <p class="card-paragraph">All-Access pass for <br> Thursday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper" >
                <div class="card-body">
                    <h4 class="card-heading" >Day pass <br> Friday</h4>
                    <p class="card-paragraph" >All-Access pass for <br> Friday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary card-button" >Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper" >
                <div class="card-body">
                    <h4 class="card-heading" >Day pass <br> Saturday</h4>
                    <p class="card-paragraph" >All-Access pass for <br> Saturday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary card-button" >Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper" >
                <div class="card-body">
                    <h4 class="card-heading" >All-access <br> pass</h4>
                    <p class="card-paragraph" >All-Access pass for <br> Thu-Fri-Sat-Sun. <br> Time: 18:00 - 22:00 <br> Price: €80</p>
                    <button class="btn btn-primary card-button" >Add to Cart +</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>

</html>