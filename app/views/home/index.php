<?php
include __DIR__ . '/../header.php';
include __DIR__ . '/../../models/User.php';
 if(isset($_SESSION['user'])){
    $user = unserialize($_SESSION['user']);
   //  var_dump(unserialize($_SESSION['user']));
    echo "welcome ". $user->getFullname();
 }

// echo "<h1>Homepage!</h1>";

?>
</head>
  <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" 
        crossorigin="anonymous">
    <link type="text/css"
        rel = "stylesheet"
        href = "css/styleHome.css"/>
</head>

<body>
    <div class="container-fluid text-center">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <h1 id="title">The Festival</h1>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" >
            <h3 class="heading">Welcome to The Fesitval</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <a id="genInfo"><?php echo $data['about'] ?></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <a><button class="buttonNav">Jazz</button></a>
        </div>
        <div class="col-4">
            <a href="/yummy/yummy"><button class="buttonNav">Yummy</button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <a><button class="buttonNav">History</button></a>
        </div>
        <div class="col-4">
            <a><button class="buttonNav">Kids</button></a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" id="eventCalender">
            <h3 class="heading">What's happening each day</h3>
            <div class="row justify-content-center">
                <div class="col-4 events">
                    <h class="event-heading">Thursday 27th June</h>
                    <ul>
                         <?php echo $jazzEventString?>
                         <?php echo $tourString?>
                    </ul>
                </div>
                <div class="col-4 events">
                    <h class="event-heading">Friday 28th June</h>
                    <ul>
                        <li class="event">event</li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
    	    </div>
            <div class="row justify-content-center">
                <div class="col-4 events">
                    <h class="event-heading">Saturday 29th June</h>
                    <ul>
                        <li class="event">event</li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
                <div class="col-4 events">
                    <h class="event-heading">Sunday 30th June</h>
                    <ul>
                        <li class="event">event</li>
                        <li class="event">event</li>
                        <li class="event">event</li>
                    </ul>
                </div>
    	    </div>
            <button id="btnCreateProgram">CREATE YOUR OWN PROGRAM</button>
        </div>
    </div>
    <div class="row justify-content-center" >
        <div class="col-10" id="eventMap">
            <h3 class="heading">Where are the events?</h3>
            <div class="row justify-content-center">
                <div class="col-7">
                    <img src="/img/mapHome.png" alt="map" id="map">
                </div>
                <div class="col-3">
                    <h4 id="locations">Locations</h4>
                    <ol>
                        <?php foreach($locations as $location) {
                            echo "<li class='location'><b>" . $location->getPlace_name() . "</b> " . $location->getStreetname() . " ". $location->getHousenumber() . ", " . $location->getPostalcode() ." " .$location->getCity()."</li>";
                        }?>
                    </ol>
                </div>
                </div>
        </div>
    </div>
    </div>
</body>

<?php
include __DIR__ . '/../footer/footer.php';

