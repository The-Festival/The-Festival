<?php 
require_once(__DIR__ . '/../repositories/homerepository.php');
class HomeService
{   
    private $homeRepository;

    public function __construct()
    {
        $this->homeRepository = new HomeRepository();
    }
    public function getAboutText()
    {
        return $this->homeRepository->getAboutText();
    }

    public function updateAboutText($aboutText)
    {
        return $this->homeRepository->updateAboutText($aboutText);
    }

    public function getJazzEventsDaily($date)
    {   
        return $this->homeRepository->getJazzEventsDaily($date);
    }

    public function getToursOnDate($date)
    {   var_dump($this->homeRepository->getToursOnDate($date));
        return $this->homeRepository->getToursOnDate($date);
    }

    function getJazzEventString($jazzEvent) {
        $html = '<li class="event">Jazz: ';
        if (isset($jazzEvent['first_session'])) {
            $html .= 'First event ' . date('H:i', strtotime($jazzEvent['first_session'])) . ' Last event ' . date('H:i', strtotime($jazzEvent['last_session'])) . '<br>';
            $html .= 'Hall: ' . $jazzEvent['first_session_hall'] . ' | ' . $jazzEvent['last_session_hall'];
        } else {
            $html .= 'No events';
        }
        $html .= '</li>';
        return $html;
    }

    function getTourString($tour) {
        $html = '<li class="event">Tour: ';
        $html .= date('Y-m-d', strtotime($tour['start_time'])) . ' ' . date('H:i', strtotime($tour['start_time'])) . ' ' . $tour['start_location'];
        $html .= '</li>';
        return $html;
    }
    
    

}
?>