<script><?php include 'mobileAppHomeScript.js'?></script>
<link href='https://fonts.googleapis.com/css?family=Itim' rel='stylesheet'>
<style>
<?php include 'mobileStyle.css'; ?>
</style>
<header>
<body>
<div class="">
    <div class="">
        <img id="logo" class="" src="/../img/logo.png" alt="mobile design">
    </div>
</div>
</header>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 text-center">
      <p id="headerText">Tyler's Museum Scavenger Hunt</p>
      <p id="greetingText">Greetings children, welcome to the Tyler's Museum Scavenger Hunt. This special scavenger hunt has been designed specifically for you to explore and discover the fascinating information within the Tyler's Museum. To learn more about the hunt, please click on one of the red circles on the floor plan.</p>
    </div>
    <div class="col-md-4 text-center">
      <div id="whiteBox" >
        <div id="redText">
          Click the red circles to learn more about the scavenger hunt and start exploring the Tyler's Museum!
        </div>
      </div>
    </div>
    <div id = "floorplanDiv" >
        <img id="floorplan" class="" src="/../img/Floorplan.png" alt="mobile design">
        <div id = "redCircle1" onclick="window.location.href='/kids/activityone'">1</div>
        <div id = "redCircle2" onclick="window.location.href='/kids/activitytwo'" style = "<?php 
        if(isset($_SESSION['activityTwoComplete'])) {
            echo "background: #057D38; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);";
        }
        ?>">2</div> 
        <div id = "redCircle3" onclick="window.location.href='/kids/activitythree'" style = "<?php 
        if(isset($_SESSION['activityThreeComplete'])) {
            echo "background: #057D38; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);";
        }
        ?>">3</div> 
        <div id = "redCircle4" onclick="window.location.href='/kids/activityfour'">4</div> 
        <div id = "redCircle5" onclick="window.location.href='/kids/activityfive'">5</div> 
        <div id = "redCircle6" onclick="window.location.href='/kids/activitysix'">6</div> 
    </div>
  </div>
</div>
</body>
<footer>
    <div class="row justify-content-between align-items-center">
        <div class="col-md-6">
            <img id="logo" class="img-fluid" src="/../img/logo.png" alt="mobile design">
        </div>
        <div class="col-md-6 text-center">
            The Festival | Developed by Snowflake
        </div>
    </div>
</footer>

