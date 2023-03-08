<?php
include __DIR__ . '/../header.php';

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
            <h3 class="heading">Welcome to ............. database input</h3>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10">
            <a id="genInfo">Database input info tekst</a>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <button class="buttonNav">Jazz</button>
        </div>
        <div class="col-4">
            <button class="buttonNav">Kids</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-4">
            <button class="buttonNav">History</button>
        </div>
        <div class="col-4">
            <button class="buttonNav">Food</button>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-10" id="eventCalender">
            <h3 class="heading">What's happening each day</h3>
            <div class="row justify-content-center">
                <div class="col-4">
                    <article class="events">event</article>
                </div>
                <div class="col-4">
                    <article class="events">event</article>
                </div>
    	    </div>
            <div class="row justify-content-center">
                <div class="col-4">
                    <article class="events">event</article>
                </div>
                <div class="col-4">
                    <article class="events">event</article>
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
                    map
                </div>
                <div class="col-3">
                    info
                </div>
                </div>
        </div>
    </div>
    </div>
</body>

<?php
include __DIR__ . '/../footer/footer.php';

