<?php
$var = 'artist';
include __DIR__ . '/../header.php';
?>
<div class="container p-5 m-5">
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
                <button style="background: transparent; border:none;" onclick="playAudio('music-1')">
                    <img class="album-cover" src="/img/artists/<?= $artist->getName() ?>/album-1.png" style="border:2px solid #6716C7" alt="Album cover" onclick="toggleBorder(this)">
                </button>
                <button style="background: transparent; border:none;" onclick="playAudio('music-2')">
                    <img class="album-cover" src="/img/artists/<?= $artist->getName() ?>/album-2.png" alt="Album cover" onclick="toggleBorder(this)">
                </button>
            </div>
            <h2 class="mt-3 artist-h2">Listen to the artist:</h2>
            <!-- Icon with play button -->
            <div class="d-flex justify-content-center align-items-center">
                <button id="play-button" class="text-dark" style="background: transparent; border:none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16">
                        <path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z" />
                    </svg>
                </button>
                <button id="pause-button" class="text-dark" style="background: transparent; border:none;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-pause-fill" viewBox="0 0 16 16">
                        <rect width="3" height="10" x="3" y="3" rx="0.5" ry="0.5" />
                        <rect width="3" height="10" x="8" y="3" rx="0.5" ry="0.5" />
                    </svg>
                </button>
                <audio id="music-player" src="../../music/music-1.mp3"></audio>
                <svg class="music-player" version="1.1" width="165" height="100" viewBox="0 0 30 25">
                    <rect x="0" y="12" width="1.5" height="4" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="3" y="10" width="1.5" height="8" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="6" y="11" width="1.5" height="6" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="9" y="8" width="1.5" height="11" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="12" y="10" width="1.5" height="8" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="15" y="7" width="1.5" height="13" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="18" y="10" width="1.5" height="8" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="21" y="8" width="1.5" height="11" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="24" y="7" width="1.5" height="14" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="27" y="9" width="1.5" height="10" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="30" y="11" width="1.5" height="6" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                    <rect x="33" y="12" width="1.5" height="4" fill="transparent" stroke="black" stroke-width="0.5" ry="1" rx="1" />
                </svg>
            </div>
            <!-- Volume slider -->
            <input class="slider" type="range" min="0" max="100" value="25" step="1" oninput="setVolume(this.value)" onchange="setVolume(this.value)">
            <p class="artist-p mt-3">Volume: <strong id="volume-value" class="artist-p-strong">25</strong></p>
            <script>
                function setVolume(volume) {
                    var audio = $('#music-player')[0];
                    audio.volume = volume / 100;
                    $('#volume-value').text(volume);
                }
            </script>
        </aside>
    </div>
</div>
<script>
    function toggleBorder(img) {
        var images = document.getElementsByClassName("album-cover");
        for (var i = 0; i < images.length; i++) {
            if (images[i] !== img) {
                images[i].style.border = "";
            }
        }
        if (img.style.border) {
            img.style.border = "";
        } else {
            img.style.border = "2px solid #6716C7";
        }
    }

    function playAudio(filename) {
        var audio = $('#music-player')[0];
        audio.src = '../../music/' + filename + '.mp3';
        playSong();
    }

    function playSong() {
        var audio = $('#music-player')[0];
        var playButton = $('#play-button');
        var pauseButton = $('#pause-button');
        audio.play();
        audio.volume = 0.5;
        playButton.hide();
        pauseButton.show();
    }

    $(document).ready(function() {
        var audio = $('#music-player')[0];
        var playButton = $('#play-button');
        var pauseButton = $('#pause-button');

        playButton.click(function() {
            audio.play();
            audio.volume = 0.25;
            playButton.hide();
            pauseButton.show();
        });

        pauseButton.click(function() {
            audio.pause();
            playButton.show();
            pauseButton.hide();
        });

        pauseButton.hide(); // hide pause button on page load

        var duration = audio.duration * 1000;
        var rects = $('.music-player rect');
        var numRects = rects.length;
        var interval = duration / numRects;
        var i = 0;

        var intervalId = setInterval(function() {
            if (i >= numRects) {
                clearInterval(intervalId);
                return;
            }

            if (audio.paused) {
                return;
            }

            if (i >= numRects) {
                clearInterval(intervalId);
                return;
            }

            var rect = rects.eq(i);
            rect.css('fill', '#6716C7');
            i++;
        }, interval);
    });
</script>
<?php
include __DIR__ . '/../footer/footer.php';
?>