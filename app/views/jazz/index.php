<body>
    <?php
    $var = 'jazz';
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
        <p class="intro-paragraph">The Haarlem Jazz Festival is a four-day celebration of jazz music, taking place from
            July 27th to July 30th in the historic city of Haarlem. Set against the stunning backdrop of Haarlem's
            historic architecture and picturesque canals, the festival brings together some of the biggest names in
            jazz, as well as up-and-coming talent, for a series of concerts, workshops, and jam sessions. With a diverse
            lineup of international and local artists, the Haarlem Jazz Festival is a must-attend event for any jazz
            enthusiast.</p>
    </article>

    <!-- 5 buttons to represent the artist selection -->
    <form action="/jazz/date" method="GET">
        <div class="container">
            <div class="row gap-3 justify-content-center">
                <button class="btn date-button" id="date" name="date" value="0" type="submit">All <br> Artists</button>
                <button class="btn date-button" id="date" name="date" value="2023-07-27" type="submit">Thu <br>
                    27</button>
                <button class="btn date-button" id="date" name="date" value="2023-07-28" type="submit">Fri <br>
                    28</button>
                <button class="btn date-button" id="date" name="date" value="2023-07-29" type="submit">Sat <br>
                    29</button>
                <button class="btn date-button" id="date" name="date" value="2023-07-30" type="submit">Sun <br>
                    30</button>
            </div>
        </div>
    </form>

    <!-- Artist cards -->

    <div class="container">
        <div class="row gap-3 my-3 d-flex justify-content-center" id="artist-cards">
            <?php foreach ($artistList as $artist) : ?>
                <?php $events = $artist->getEvents(); ?>
                <?php $firstEvent = array_shift($events); ?>
                <a href="/jazz/artist?id=<?= $artist->getId() ?>" class="card p-0 col-3 d-flex align-items-center justify-content-center artist-card">
                    <div class="card-title g-0 w-100 artist-card-title">
                        <?= $artist->getName() ?>
                    </div>
                    <div class="card-body w-100 d-flex align-self-start flex-column artist-card-body">
                        <img class="artist-image mb-3 align-self-center" src="/img/artists/<?= $artist->getName() ?>/artist.png" alt="<?= $artist->getName() ?>">
                        <p><strong>Time:</strong>
                            <?= $firstEvent->getFormattedTime() ?>
                        </p>
                        <p><strong>Location:</strong> Patronaat</p>
                        <p><strong>Hall:</strong>
                            <?= $firstEvent->getHall() ?>
                        </p>
                        <p><strong>Price:</strong>
                            <?= $firstEvent->getFormattedPrice() ?>
                        </p>
                        <a href="/jazz/artist?id=<?= $artist->getId() ?>">Discover more!</a>
                        <button class="btn btn-primary mt-3 artist-card-btn w-100">Add to Cart +</button>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- End -->

    <!-- 4 Cards that represents the passes -->

    <div class="container p-3 mb-3">
        <div class="row gap-5 d-flex justify-content-center">
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">Day pass <br> Thursday</h4>
                    <p class="card-paragraph">All-Access pass for <br> Thursday <br> Time: 18:00 - 22:00 <br> Price: €35
                    </p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">Day pass <br> Friday</h4>
                    <p class="card-paragraph">All-Access pass for <br> Friday <br> Time: 18:00 - 22:00 <br> Price: €35
                    </p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">Day pass <br> Saturday</h4>
                    <p class="card-paragraph">All-Access pass for <br> Saturday <br> Time: 18:00 - 22:00 <br> Price: €35
                    </p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm card-wrapper">
                <div class="card-body">
                    <h4 class="card-heading">All-access <br> pass</h4>
                    <p class="card-paragraph">All-Access pass for <br> Thu-Fri-Sat-Sun. <br> Time: 18:00 - 22:00 <br>
                        Price: €80</p>
                    <button class="btn btn-primary card-button">Add to Cart +</button>
                </div>
            </div>
        </div>
    </div>
    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>