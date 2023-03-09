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
        require __DIR__ . '/../views/kids/mobile/theeggproblem/drfeatherfacts/allfacts.php';
    }
}