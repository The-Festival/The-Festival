<script><?php include 'eggproblemScript.js'?></script>
<link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
<?php include 'theeggproblemStyle.css'; ?>
</style>
<body>
<header>
<div>
    <div >
        <img id="logo" class="" src="/../img/logo.png" alt="mobile design">
    </div>
</div>
</header>
    <h1>The Egg Problem</h1>
    <div class = "container">
    <div class="row mt-5">
        <div class="col-4"><img src="/../img/fireworks.png" alt=""></div>
        <div class="col-4"><img src="/../img/Dr.Feathers.png" alt=""></div>
        <div class="col-4"><img src="/../img/fireworks.png" alt=""></div>
    </div>
    <div class="row mt-5">
        <div id = "goodjobtext" class = "col-12"><p>GOOD JOB!</p></div>
    </div>
    <div class="row mt-5">
        <div class = "col-12"><h3>Great job finding the fresh egg and solving the problem! You've been a big help. But wait, there's one more challenge left for you. Are you ready? Let's go!</h3></div>
    </div>
    <div class="row mt-5">
        <div class = "col-12"><h3>Complete the sentence.</h3> </div>
    </div>
    <div class="row mt-5">
        <div class = "col-12"><h3>Eggs have been eaten by humans for ...... of years.</h3> </div>
    </div>
    <div class="row mt-5">
        <div class = "col-6"><button onclick="window.location.href='/kids/allfacts'" class = "button">Thousands</button></div>
        <div class = "col-6"><button id = "hundered" onclick = "makeElementWiggle('hundered')" class = "button">Hundreds</button></div>
    </div>
    <div class="row mt-5">
        <div id = "" class = "col-6"><button id = "tens" onclick = "makeElementWiggle('tens')" class = "button">Tens</button></div>
        <div id = "" class = "col-6"><button id = "million" onclick = "makeElementWiggle('million')" class = "button">Millions</button></div>
    </div>
</div>
</body>