<?php
include_once __DIR__ . '/../models/custompage.php';
include_once __DIR__ . '/../repositories/custompagesrepository.php';
class CustompagesService{
    private $custompagesRepository;

    public function __construct(){
        $this->custompagesRepository = new CustompagesRepository();
    }

    public function checkIfPagesExists(){

        if($this->custompagesRepository->getAll() == null){
            return false;
        }
        return true;
    }

    public function getAll(){
        return $this->custompagesRepository->getAll();
    }

    public function getById($id){
        return $this->custompagesRepository->getById($id);
    }

    public function update($id, $name){
        $this->custompagesRepository->update($id, $name);
    }

    public function delete($id){
        $this->custompagesRepository->delete($id);
    }

    public function add($name){
        $this->custompagesRepository->add($name);
    }

    public function createFile($name){
        $myfile = fopen(__DIR__ . '/../views/custompages/' . $name . '.php', "w") or die("Unable to open file!");

        // prepare content to write
        $content = "<?php\n";
        $content .= "include __DIR__ . '/../../header.php';\n";
        $content .= "?>\n";
        $content .= "<?php\n";
        $content .= "include __DIR__ . '/../../footer/footer.php';\n";
        $content .= "?>\n";

        // write to file
        fwrite($myfile, $content);

        // close the file
        fclose($myfile);
    }

    public function deleteFile($name){
        unlink(__DIR__ . '/../views/custompages/' . $name . '.php');
    }

    public function getFileContent($name)
    {
        return file_get_contents(__DIR__ . '/../views/custompages/' . $name . '.php');
    }
}
