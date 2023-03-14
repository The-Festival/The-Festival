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
        <div class="col-lg-12 top">
            <h1 id="title">Naam</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
        <h3 id="sub-title">onderTitel</h3>
        </div>
    <div class="row justify-content-center">
        <div class="col-4 description-box" >
            <h3 class="heading">Description</h3>
            <p class="text-black">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aperiam vitae ullam deleniti nemo. Vitae est libero tempore tenetur excepturi dolor cum distinctio modi laudantium nisi reprehenderit facere quasi, illo veritatis!</p>
        </div>
        <div class="col-6 img-1" >
            <img src="" alt="plaatje">
        </div>
    </div>
    <div class="row justify-content-center to-know-background">
        <div class="col-4 info-box" id="details-box">
            <h3 class="title-white">Details</h3>
                <ul class="detail-list">
                    <li>Price:</li>
                    <li>Cuisine:</li>
                    <li>Type:</li>
                    <li>Rating:</li>
                </ul>
        </div>
        <div class="col-2 img-2">
            <img src="" alt="plaatje">
        </div>
        <div class="col-4 info-box" id="contact-box">
            <h3 class="title-white">Contact</h3>
                <ul class="detail-list">
                    <li>Address:</li>
                    <li>Phone:</li>
                    <li>Email:</li>
                </ul>
        </div>        
    </div>
    <div class="row justify-content-center">
        <div class="col-4 img-3" >
            <img src="" alt="plaatje">
        </div>
        <div class="col-6 reservation" >
            <h3 class="title-white">Make a Reservation</h3>
            <form id="reservation-form" action="">

                <label class="formLabel" for="nrPeople">Number of people:</label>
                <input class="formField" type="number" name="nrPeople" id="nrPeople">

                <label class="formLabel" for="day">Choose your day:</label>
                    <select class="formField" name="day" id="day">
                        //php opties
                        <option value="">Monday</option>
                    </select>

                <label class="formLabel" for="time">Choose your session:</label>
                    <select class="formField" name="time" id="time">
                        //php opties
                        <option value="">Session 1: 17:00-18:30</option>
                    </select>

                <label class="formLabel" for="requests">Additional requests:</label>
                <textarea class="formField" id="requests" name="requests" ></textarea>

                <div><button class="make-reservation-button">Make reservation</button></div>
        </div>
    </div>
</div>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>


