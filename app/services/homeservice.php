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
    {   //var_dump($this->homeRepository->getToursOnDate($date));
        return $this->homeRepository->getToursOnDate($date);
    }

    public function getAllEventStringsOnDate($date)
    {   
        $jazzEventOnDate = $this->homeRepository->getJazzEventsDaily($date);
        $toursOnDate = $this->homeRepository->getToursOnDate($date);
        $stringJazzEvent = $this->getJazzEventString($jazzEventOnDate);
        $stringTours = $this->getTourString($toursOnDate);
        $string = $stringJazzEvent . $stringTours;
        return $string;
    }

    function getJazzEventString($jazzEvents) {
        $html = '<br><b>Haarlem Jazz</b>';
        foreach ($jazzEvents as $jazzEvent) {
            $html .= '<li class="event">';
            if (isset($jazzEvent['first_session'])) {
                $html .= 'First event ' . date('H:i', strtotime($jazzEvent['first_session'])) . ' Last event ' . date('H:i', strtotime($jazzEvent['last_session'])) . '<br>';
                $html .= 'Hall: ' . $jazzEvent['first_session_hall'] . ' | ' . $jazzEvent['last_session_hall'];
            } else {
                $html .= 'No events today';
            }
            $html .= '</li>';
        }
        return $html;
    }


   function getTourString($tours) {
    $html = '<br><b>A Stroll trough History</b>';
    if(!isset($tours['tour_id'])){
        $html .= '<li class="event">No tours today</li>';
    }
    foreach ($tours as $tour) {
        $html .= '<li class="event">Tours at: ';
        $html .= ' ' . date('H:i', strtotime($tour['start_time'])) . ' ' . $tour['start_location'];
        $html .= '</li>';
    }
    return $html;
    }
    
    function getLocations(){
        //var_dump($this->homeRepository->getLocations());
        return $this->homeRepository->getLocations();
    }
}
?>