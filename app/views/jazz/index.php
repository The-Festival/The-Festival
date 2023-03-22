<body>
    <?php
    $var = 'jazz';
    include __DIR__ . '/../header.php';
    ?>

    <!-- Hero with "The Festival" and a count down timer -->

    <div class="hero">
        <a href="/artists">
            <h1 class="hero-title">The Festival</h1>
        </a>
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

    <!-- Artist cards -->

    <!-- -->

    <div class="container">
        <div class="row gap-3 my-3 d-flex justify-content-center">
            <?php foreach ($artistList as $artist) : ?>
                <div class="card p-0 col-3 d-flex align-items-center justify-content-center artist-card">
                    <div class="card-title g-0 w-100 artist-card-title"><?= $artist->getName() ?></div>
                    <div class="card-body w-100 d-flex align-self-start flex-column artist-card-body">
                        <img class="artist-image mb-3 align-self-center" src="/img/artist-subhero.png" alt="Img">
                        <p><strong>Time:</strong> 20:00 - 21:00</p>
                        <p><strong>Location:</strong> Patronaat</p>
                        <p><strong>Hall:</strong> Main Hall</p>
                        <p><strong>Price:</strong> <?= $artist->getPrice() ?></p>
                        <a href="#">Discover more!</a>
                        <button class="btn btn-primary mt-3 artist-card-btn w-100">Add to Cart +</button>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <style>
        .artist-card {
            background: rgba(255, 255, 255, 0.6);
            border: 7px solid #000000;
            max-width: 300px;
        }

        .artist-card-title {
            background: #6716C7;
            border-bottom: 7px solid #000000;
            font-family: 'Lobster Two';
            font-weight: 400;
            font-size: 37px;
            text-align: center;
            color: #FFFFFF;
        }

        .artist-card-btn {
            background: #0C60DD;
            box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.25), inset 4px 4px 7px rgba(255, 255, 255, 0.25);
            border-radius: 20px;
        }

        .artist-image {
            width: 100%;
            max-width: 200px;
            aspect-ratio: 1/1;
            object-fit: cover;
            border-radius: 50%;
        }

        .artist-card-body {
            font-family: 'Poppins';
            font-size: 1.25rem;
            line-height: 100%;
        }
    </style>

    <!-- End -->

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
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">Day pass <br> Friday</h4>
                    <p class="card-paragraph">All-Access pass for <br> Friday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">Day pass <br> Saturday</h4>
                    <p class="card-paragraph">All-Access pass for <br> Saturday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">All-access <br> pass</h4>
                    <p class="card-paragraph">All-Access pass for <br> Thu-Fri-Sat-Sun. <br> Time: 18:00 - 22:00 <br> Price: €80</p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>