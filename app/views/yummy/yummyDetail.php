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
    <?php if($restaurant != null): ?>
    <div class="row justify-content-center">
        <div class="col-lg-12 top">
            <h1 id="title"><?= $restaurant->getName()?></h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4 description-box" >
            <h3 class="heading">Description</h3>
            <p class="text-black"><?= $restaurant->getDescription()?></p>
        </div>
        <div class="col-6 img-1" >
            <img src="" alt="plaatje">
        </div>
    </div>
    <div class="row justify-content-center to-know-background">
        <div class="col-4 info-box" id="details-box">
            <h3 class="title-white">Details</h3>
                <ul class="detail-list">
                    <li>Price: €<?= $restaurant->getPrice()?></li>
                    <li>Price kids (-12): €<?= $restaurant->getPrice_kids()?></li>
                    <li>Cuisine: <?= $restaurant->getCuisine()?></li>
                    <li>Rating: <?= $restaurant->getStar_rating()?>/5 stars</li>
                </ul>
        </div>
        <div class="col-2 img-2">
            <img src="" alt="plaatje">
        </div>
        <div class="col-4 info-box" id="contact-box">
            <h3 class="title-white">Contact</h3>
                <ul class="detail-list">
                    <li>Address: <?= $restaurant->getStreetname()?> <?=$restaurant->getHousenumber()?> <?=$restaurant->getPostalcode()?> <?=$restaurant->getCity() ?></li>
                    <li>Phone: 
                        <?= $restaurant->getPhonenumber()?> </li>
                    <li>Website: <a href="<?= $restaurant->getWebsite()?>"><?= $restaurant->getWebsite()?></a></li>
                </ul>
        </div>        
    </div>
    <div class="row justify-content-center">
        <div class="col-4 img-3" >
            <img src="" alt="plaatje">
        </div>
        <div class="col-6 reservation" >
            <h3 class="title-white">Make a Reservation</h3>
            <form id="reservation-form" action="/yummy/makeReservation">

                <label class="formLabel" for="nrPeople">Number of people:</label>
                <input class="formField" type="number" name="nrPeople" id="nrPeople" min="1" max="<?= $restaurant->getTotal_seats() ?>" required>

                <label class="formLabel" for="time">Choose your session:</label>
                    <select class="formField" name="session" id="time" required>
                    <option value="" selected disabled hidden></option>
                        <!-- php opties -->
                        <?php foreach ($sessionsList as $session) : ?>
                            <option value="<?php echo $session->getSession_id();?>"> <?php echo $session->date?> </option>
                        <?php endforeach; ?>
                    </select>

                <label class="formLabel" for="requests">Additional requests:</label>
                <textarea class="formField" id="requests" name="requests" ></textarea>

                <div><button name="Reservation" class="make-reservation-button">Make reservation</button></div>
        </div>
    </div>
    <?php else: ?>
        <h1>Restaurant not found</h1></php>
        <?php endif; ?>
</div>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body> 
</html> 	
