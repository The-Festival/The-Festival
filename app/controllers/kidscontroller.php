<?php
class KidsController
{
    public function index()
    {
        // Detect screen size
            if(strpos($_SERVER['HTTP_USER_AGENT'], 'Mobile') !== false) {
                $screenSize = 'mobile';
            } else {
                $screenSize = 'desktop';
            }
  
        // Load appropriate file based on screen size
            if($screenSize === 'mobile') {
                // load kids app on mobile
                require __DIR__ . '/../views/kids/mobile/mobileAppHomePage.php';
            } else {
                // load info page on desktop
                require __DIR__ . '/../views/kids/desktop/infoDesktop.php';
            }
    }

}