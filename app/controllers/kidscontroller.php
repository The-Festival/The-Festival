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

    public function theeggproblem(){
        require __DIR__ . '/../views/kids/mobile/theeggproblem/theggproblemMain.php';
    }


}