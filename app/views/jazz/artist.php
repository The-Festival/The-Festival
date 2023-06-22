<?php
$var = 'artist';
include __DIR__ . '/../header.php';
?>
<div class="container">
    <div class="row">
        <article class="col-lg-6 p-5">
            <h2 class="artist-h2">About</h2>
            <p class="artist-p">
                <?= $artist->getAbout() ?>
            </p>
            <h2 class="artist-h2">Time / Date / Location</h2>
            <p class="artist-p">
            <ul>
                <?php foreach ($eventList as $event) : ?>
                    <li>
                        <?= $event->getFormattedTime() ?> /
                        <?= $event->getLocation() ?> :
                        <?= $event->getHall() ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            </p>
            <h2 class="artist-h2">Price</h2>
            <ul class="artist-ul">
                <?php foreach ($eventList as $event) : ?>
                    <li>
                        <?= $event->getFormattedTime() ?> :
                        <?= $event->getFormattedPrice() ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        </article>
        <aside class="d-flex align-items-center flex-column col-lg-6">
            <h2 class="artist-h2">Albums</h2>
            <div class="d-flex align-items-center gap-3">
                <img src="/img/artists/<?= $artist->getName() ?>/album-1.png" alt="Album cover">
                <img src="/img/artists/<?= $artist->getName() ?>/album-2.png" alt="Album cover">
            </div>
            <h2 class="mt-3 artist-h2">Listen to the artist:</h2>
            <!-- Icon with play button -->
            <div class="d-flex justify-content-center align-items-center">
                <a href="#" class="text-dark">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                    </svg>
                </a>
                <div>
                    Wavelength I have no idea how to do this...
                </div>
            </div>
        </aside>
    </div>
</div>
<?php
include __DIR__ . '/../footer/footer.php';
?>