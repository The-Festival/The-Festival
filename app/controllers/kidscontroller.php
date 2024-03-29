<?php
class KidsController
{
    public function index()
    {
      require __DIR__ . '/../views/kids/desktop/infoDesktop.php';
    }

    public function app(){
        require __DIR__ . '/../views/kids/mobile/mobileAppHomePage.php';
    }

    // Egg problem

    public function activityOne(){
           require __DIR__ . '/../views/kids/mobile/activitylinkpages/activity1.php';     
    }

    public function activityTwo(){
        require __DIR__ . '/../views/kids/mobile/activitylinkpages/activity2.php'; 
    }
    public function activityThree(){
        require __DIR__ . '/../views/kids/mobile/activitylinkpages/activity3.php';
    }

    public function activityFour(){
        require __DIR__ . '/../views/kids/mobile/activitylinkpages/activity4.php';
    }

    public function activityFive(){
        require __DIR__ . '/../views/kids/mobile/activitylinkpages/activity5.php';
    }

    public function activitySix(){
        require __DIR__ . '/../views/kids/mobile/activitylinkpages/activity6.php';
    }

    public function facttwo(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/fact2.php';
    }
    public function factthree(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/fact3.php';
    }
    public function factfour(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/fact4.php';
    }
    public function factfive(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/fact5.php';
    }

    public function factfinished(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/factfinished.php';
    }

    public function theeggproblem(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/theggproblemMain.php';
    }

    public function drfeathersfound(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeathersfound.php';
    }

    public function eggproblemfacts(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/factspageinitial.php';
    }

    public function eggproblempage(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/eggproblem.php';
    }

    public function eggfound(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/eggfound.php';
    }
    public function wrongAnswer(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/wrongAnswer.php';
    }

    public function allfacts(){
        $this->start_session_if_not_started();

        // check if session is set
        $_SESSION['activityTwoComplete'] = 'true';
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/allfacts.php';

    }

    // Lost Calculator

    public function lostcalculator(){
        require __DIR__ . '/../views/kids/mobile/lostcalculator/profdigit.php';
    }

    public function proffacts(){
        require __DIR__ . '/../views/kids/mobile/lostcalculator/factspage.php';
    }

    public function profproblem(){
        require __DIR__ . '/../views/kids/mobile/lostcalculator/profproblem.php';
    }

    public function foundcalculator(){

        // start session
        $this->start_session_if_not_started();
        // check if session is set
        $_SESSION['activityThreeComplete'] = 'true';
        require __DIR__ . '/../views/kids/mobile/lostcalculator/foundcalculator.php';
    }

    function start_session_if_not_started() {
        if (session_status() === PHP_SESSION_NONE) {
          session_start();
        }
      }
}