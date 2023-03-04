<body style="background: linear-gradient(96.09deg, #CFB8FF 15.59%, #FFC0F5 47.73%, #FFE9B0 80.81%);">

    <?php
    include __DIR__ . '/../header.php';
    ?>

    <!-- Hero with "The Festival" and a count down timer -->
    
    <div style="height:100%; background-color: coral; background: url(img/jazzhero.png); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <h1 style="text-align: center; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-family: 'Lobster Two'; font-style: normal; font-weight: 400; font-size: 280px; line-height: 280px; color: #F7EDFA; text-shadow: -20px 4px 4px rgba(0, 0, 0, 0.75);">The Festival</h1>
    </div>

    <!-- Intro -->

    <article class="container">
        <div class="row justify-content-between">
            <h2 style="font-family: 'Lobster Two'; font-style: normal; font-weight: 400; font-size: 80px; line-height: 100px; text-align: justify; color: #1D3588; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Haarlem Jazz</h2>
            <h2 style="font-family: 'Lobster Two'; font-style: normal; font-weight: 400; font-size: 80px; line-height: 100px; text-align: justify; color: #1D3588; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">27 July - 30 July</h2>
        </div>
        <p style="font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 36px; line-height: 54px;  color: #000000; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">The Haarlem Jazz Festival is a four-day celebration of jazz music, taking place from July 27th to July 30th in the historic city of Haarlem. Set against the stunning backdrop of Haarlem's historic architecture and picturesque canals, the festival brings together some of the biggest names in jazz, as well as up-and-coming talent, for a series of concerts, workshops, and jam sessions. With a diverse lineup of international and local artists, the Haarlem Jazz Festival is a must-attend event for any jazz enthusiast.</p>
    </article>

    <!-- 5 buttons to represent the artist selection -->
    <div class="container">
        <div class="row gap-3 justify-content-center">
            <button class="btn" style="background: #6716C7; border-radius: 46px; width: 192px; height: 208px; font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 55px; line-height: 82px; text-align: center; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">All <br> Artists</button>
            <button class="btn" style="background: #6716C7; border-radius: 46px; width: 192px; height: 208px; font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 55px; line-height: 82px; text-align: center; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Thu <br> 27</button>
            <button class="btn" style="background: #6716C7; border-radius: 46px; width: 192px; height: 208px; font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 55px; line-height: 82px; text-align: center; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Fri <br> 28</button>
            <button class="btn" style="background: #6716C7; border-radius: 46px; width: 192px; height: 208px; font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 55px; line-height: 82px; text-align: center; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Sat <br> 29</button>
            <button class="btn" style="background: #6716C7; border-radius: 46px; width: 192px; height: 208px; font-family: 'Poppins'; font-style: normal; font-weight: 400; font-size: 55px; line-height: 82px; text-align: center; color: #FFFFFF; text-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Sun <br> 30</button>
        </div>
    </div>

    <!-- 4 Cards that represents the passes -->

    <div class="container">
        <div class="row gap-5">
            <div class="card col-sm" style="padding: 0.5em 0.5em; background: #A8A1FF; box-shadow: 20px 10px 4px rgba(0, 0, 0, 0.5); border-radius: 83px;">
                <div class="card-body">
                    <h4 class="card-title" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 36px; line-height: 54px; text-align: center; color: #FFFFFF;">Day pass <br> Thursday</h4>
                    <p class="card-text" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 19px; line-height: 28px; color: #FFFFFF;">All-Access pass for <br> Thursday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary" style="width: 263px; height: 45px; background: #0C60DD; box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.25), inset 4px 4px 7px rgba(255, 255, 255, 0.25); border-radius: 20px;">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm" style="padding: 0.5em 0.5em; background: #A8A1FF; box-shadow: 20px 10px 4px rgba(0, 0, 0, 0.5); border-radius: 83px;">
                <div class="card-body">
                    <h4 class="card-title" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 36px; line-height: 54px; text-align: center; color: #FFFFFF;">Day pass <br> Friday</h4>
                    <p class="card-text" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 19px; line-height: 28px; color: #FFFFFF;">All-Access pass for <br> Friday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary" style="width: 263px; height: 45px; background: #0C60DD; box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.25), inset 4px 4px 7px rgba(255, 255, 255, 0.25); border-radius: 20px;">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm" style="padding: 0.5em 0.5em; background: #A8A1FF; box-shadow: 20px 10px 4px rgba(0, 0, 0, 0.5); border-radius: 83px;">
                <div class="card-body">
                    <h4 class="card-title" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 36px; line-height: 54px; text-align: center; color: #FFFFFF;">Day pass <br> Saturday</h4>
                    <p class="card-text" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 19px; line-height: 28px; color: #FFFFFF;">All-Access pass for <br> Saturday <br> Time: 18:00 - 22:00 <br> Price: €35</p>
                    <button class="btn btn-primary" style="width: 263px; height: 45px; background: #0C60DD; box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.25), inset 4px 4px 7px rgba(255, 255, 255, 0.25); border-radius: 20px;">Add to Cart +</button>
                </div>
            </div>
            <div class="card col-sm" style="padding: 0.5em 0.5em; background: #A8A1FF; box-shadow: 20px 10px 4px rgba(0, 0, 0, 0.5); border-radius: 83px;">
                <div class="card-body">
                    <h4 class="card-title" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 36px; line-height: 54px; text-align: center; color: #FFFFFF;">All-access <br> pass</h4>
                    <p class="card-text" style="font-family: 'Poppins'; font-style: normal; font-weight: 700; font-size: 19px; line-height: 28px; color: #FFFFFF;">All-Access pass for <br> Thu-Fri-Sat-Sun. <br> Time: 18:00 - 22:00 <br> Price: €80</p>
                    <button class="btn btn-primary" style="width: 263px; height: 45px; background: #0C60DD; box-shadow: 4px 4px 6px rgba(0, 0, 0, 0.25), inset 4px 4px 7px rgba(255, 255, 255, 0.25); border-radius: 20px;">Add to Cart +</button>
                </div>
            </div>
        </div>
    </div>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>