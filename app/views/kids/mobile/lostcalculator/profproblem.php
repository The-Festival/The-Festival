<link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
<?php include 'profdigitStyle.css'; ?>
</style>
<header>
<body>
<div class="">
    <div class="">
        <img id="logo" class="" src="/../img/logo.png" alt="mobile design">
    </div>
</div>
</header>
<div class = "container">
    <div class="row mt-5">
        <div class="col-12"> <h1>The Lost Calculator</h1></div>
    </div>
    <div class="row mt-5">
        <div class = "col-12"><img id = "profDigit"src="/../img/Prof. Digit.png" alt=""></div>
    </div>
    <div class="row mt-5">
        <div class = "col-12"><h3>Are you ready for a challenge? We need your help to find the lost calculator. The numbers and operations we need to solve this mystery are hidden in a floor-plan. Can you find them? Let's get started!</h3></div>
    </div>
    <div class="row mt-5">
        <div class = "col-8"><h3>Click on the red circles to find the numbers and symbols we need to solve the problem.</h3></div>
        <div class = "col-4"><img id = "profDigitRotate"src="/../img/Prof. Digit.png" alt=""></div>
    </div>
</div>
<div id = "floorplanDiv">
        <img id="floorplan" src="/../img/Floorplan.png" alt="mobile design">
        <div id = "redCircle1" class = "redCircle">=</div>
        <div id = "redCircle2" class = "redCircle">19</div> 
        <div id = "redCircle3" class = "redCircle">21</div> 
        <div id = "redCircle4" class = "redCircle">9</div> 
        <div id = "redCircle5" class = "redCircle">+</div> 
        <div id = "redCircle6" class = "redCircle">10</div> 
</div>
<div class = "container">
    <div class = "row mt-5 ml-5">
        <div class = "col-2"><h1>9</h1></div>
        <div class = "col-2"><h1>+</h1></div>
        <div class = "col-2"><h1>10</h1></div>
        <div class = "col-2"><h1>=</h1></div>
        <div class = "col-2"><h1>19</h1></div>
    </div>

    <div id = "goodJobContainer" class = "container">
        <div class = "row mt-5">   
            <div class = "col-8 mt-5"><h1>GOOD JOB</h1></div>
            <div class = "col-4"><img src="/../img/Prof. Digit.png" alt=""></div>
        </div>
        <div class = "row mt-5">
            <div class = "col-12"><p id = "welldoneText">Well done! By solving the problem and finding the hidden calculator, you've helped me tremendously. Now, I can use the calculator to solve my maths problems more easily. Thank you for your help!</p></div>
        </div>
        <div class = "row mt-5">
            <div class = "col-6"><img src="/../img/mathboard.png" alt=""></div>
            <div class = "col-6"><img src="/../img/calculator.png" alt=""></div>
        </div>
    </div>
    <div>
            <div id = "buttonReady"class = "button mt-5" onclick="window.location.href = '/kids/foundcalculator'" ><h1>Continue</h1></div>
    </div>

</div>
</body>