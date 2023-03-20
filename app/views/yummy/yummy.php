<?php
include __DIR__ . '/../header.php';

?>
</head>
  <meta charset="UTF-8"
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
            <h1 id="title">Yummy</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h3 class="heading">Welcome to Yummy!</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <p class="text-black">Although Haarlem had not a globally known culinary tradition there are lots of restaurants that are worth your while. Here you can find all the restaurants that participate in this festival and their discounted prices! The food varies from Dutch cuisine to Indian!</p>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h2 class="header-large">The Festival's Hottest</h2>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-2 hottest-rest" >
            <div class="row hottest-text"><p>Ratatouille</p></div>
            <div class="row hottest-img"><img src="/img/Dish-1.png"></img></div>
            <div class="row hottest-text"><p>€45/2 hrs</p></div>
            <div class="row"><button class="reserve-button">Reserve</button></div>
        </div>
        <div class="col-2 hottest-rest" >
            <div class="row hottest-text"><p>Restaurant ML</p></div>
            <div class="row hottest-img"><img src="/img/Dish-2.png"></img></div>
            <div class="row hottest-text"><p>€45/2 hrs</p></div>
            <div class="row"><button class="reserve-button">Reserve</button></div>
        </div>
        <div class="col-2 hottest-rest" >
            <div class="row hottest-text"><p>Specktakel</p></div>
            <div class="row hottest-img"><img src="/img/Dish-3.png"></img></div>
            <div class="row hottest-text"><p>€35/1.5 hrs</p></div>
            <div class="row"><button class="reserve-button">Reserve</button></div>
        </div>
    </div>
    <div class="row justify-content-center to-know-background">
        <div class="col-8 to-know">
                <h3 class="title-white">Good to know:</h3>
                <ul class="to-know-list">
                    <li >Children under 12 years have 50% off at every restaurant</li>
                    <li >Reservation is mandatory. A reservation fee of €10/person will be charged when a reservation is made on the Haarlem Festival site</li>
                    <li >All restaurants are located in Haarlem, Netherlands</li>
                </ul>
                <img src="/img/Yummy1.png" id="to-know-img"></img>
        </div>     
    </div>
    
    <div class="row justify-content-center">
        <div class="col-10" > 
            <h2 class="header-large">Our selection</h2>
            <div class="row justify-content-center">
            <?php
            //foreach($result as $row){
                //echo "<div class=float-child>" . 
                  //      "<h5>Restaurant " . $row['name'] . "</h5>" .
                   //     "<p>" . $row['quisine'] . "</p>" .
                    //    "<button type=button class=btn id=btn-edit>Edit</button>" .
                   // "</div>";
           // }
            ?>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
        <a href="/yummy/yummyDetail"><button class="reserve-button-end">Reserve</button></a>
        </div>
    </div>
</div>

    <?php
    include __DIR__ . '/../footer/footer.php';
    ?>
</body>
