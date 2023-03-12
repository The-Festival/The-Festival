<?php
$var = 'artist';
include __DIR__ . '/../header.php';
?>

<div class="artist-hero">
    <img src="/img/artist-subhero.png" alt="Artist">
    <img src="/img/artist-subhero2.png" alt="Artist">
</div>
<div class="container">
    <div class="row">
        <article class="col-lg-6">
            <h2 class="artist-h2">About</h2>
            <p class="artist-p">The Gumbo Kings are a five-piece band that combines the groove of New Orleans with rough delta blues and the melody of soul from ancient Memphis.</p>
            <h2 class="artist-h2">Genre</h2>
            <p class="artist-p">Blues / Alternative / Indie</p>
            <h2 class="artist-h2">Important Tracks</h2>
            <p class="artist-p">Hot Damn! / Here We Are / Four Walls / Changes Somehow</p>
            <h2 class="artist-h2">Time / Date / Location</h2>
            <p class="artist-p">
            <ul>
                <li>Thursday, 27 July, 18:300 - 19:00 - Patronaat</li>
                <li>Sunday, 30 July, 19:00 - 20:00 - Grote Markt</li>
            </ul>
            </p>
            <h2 class="artist-h2">Price</h2>
            <p class="artist-p">€ 15.00</p>
        </article>
        <aside class="d-flex align-items-center flex-column col-lg-6">
            <h2 class="artist-h2">Albums</h2>
            <div class="d-flex align-items-center gap-3">
                <img src="/img/album-cover.png" alt="Album cover">
                <img src="/img/album-cover-2.png" alt="Album cover">
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