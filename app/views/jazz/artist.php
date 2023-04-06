<?php
$var = 'artist';
include __DIR__ . '/../header.php';
?>

<div class="container">
    <div class="row">
        <article class="col-lg-6">
            <h2 class="artist-h2">About</h2>
            <p class="artist-p"><?php echo $artist->getAbout() ?></p>
            <h2 class="artist-h2">Time / Date / Location</h2>
            <p class="artist-p">
            <ul>
                <li>Thursday, 27 July, 18:300 - 19:00 - Patronaat</li>
                <li>Sunday, 30 July, 19:00 - 20:00 - Grote Markt</li>
            </ul>
            </p>
            <h2 class="artist-h2">Price</h2>
            <p class="artist-p"> <?php echo $artist->formatPrice() ?></p>
        </article>
        <aside class="d-flex align-items-center flex-column col-lg-6">
            <h2 class="artist-h2">Albums</h2>
            <div class="d-flex align-items-center gap-3">
                <?php
                for ($i = 1; $i < 4; $i++) {
                    if (file_exists(__DIR__ . '/../../public/img/artists/' . $artist->getName() . '/album-' . $i . '.png'))
                        echo '<img class="album" src="/img/artists/' . $artist->getName() . '/album-' . $i . '.png" alt="Album cover">';
                }
                ?>
            </div>
            <style>
                .album {
                    width: 200px;
                    height: 200px;
                    object-fit: cover;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
                }
            </style>
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