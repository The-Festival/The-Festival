<?php
require_once(__DIR__ . '/../services/homeservice.php');

class WzywigService {
    private $homeService;

    function __construct(){
        $this->homeService = new HomeService();
    }



    function replace_file_content($filename, $new_content) {
        // Open the file for writing
        $file = fopen($filename, "w");
        if ($file === false) {
          // Unable to open file for writing
          return false;
        }
        
        // Write the new content to the file
        fwrite($file, $new_content);
        
        // Close the file
        fclose($file);
        
        return true;
      }

    public function checkUpload() {
                       // Only these origins are allowed to upload images 
        $accepted_origins = array("http://localhost", "https://www.codexworld.com", "http://192.168.1.1", "http://example.com"); 
        
        // Set the upload folder 
        $imageFolder = "img/"; 
        
        if (isset($_SERVER['HTTP_ORIGIN'])) { 
            // same-origin requests won't set an origin. If the origin is set, it must be valid. 
            if (in_array($_SERVER['HTTP_ORIGIN'], $accepted_origins)) { 
                header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']); 
            } else { 
                header("HTTP/1.1 403 Origin Denied"); 
                return; 
            } 
        } 
        
        // Don't attempt to process the upload on an OPTIONS request 
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') { 
            header("Access-Control-Allow-Methods: POST, OPTIONS"); 
            return; 
        } 
        
        reset ($_FILES); 
        $temp = current($_FILES); 
        if (is_uploaded_file($temp['tmp_name'])){ 
            // Sanitize input 
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) { 
                header("HTTP/1.1 400 Invalid file name."); 
                return; 
            } 
        
            // Verify extension 
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "jpeg", "png"))) { 
                header("HTTP/1.1 400 Invalid extension."); 
                return; 
            } 
        
            // Accept upload if there was no origin, or if it is an accepted origin 
            $filetowrite = $imageFolder . $temp['name']; 
            if(move_uploaded_file($temp['tmp_name'], $filetowrite)){ 
                // Respond to the successful upload with JSON. 
                // Use a location key to specify the path to the saved image resource. 
                // { location : '/your/uploaded/image/file'} 
                $this->homeService->insertImg(1, "home", $filetowrite, 0);
                echo json_encode(array('location' => $filetowrite)); 
            }else{ 
                header("HTTP/1.1 400 Upload failed."); 
                return; 
            } 
        } else { 
            // Notify editor that the upload failed 
            header("HTTP/1.1 500 Server Error"); 
        } 
        
    }
}