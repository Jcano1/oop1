<?php
    namespace App\Controllers;

    use App\Controllers\studentViewController;
    use App\School\Services\createStudentService;
    var_dump('prueba');
class createStudentController{
 
    private studentViewController $vistas;
    private createStudentService $studentService;

    private function parsePOST(){
        foreach ($_POST as $key => $value) {
            $arrayPOST[$key]=$value;
        }
        return $arrayPOST;
    }

    function CreateStudent(){
        
        $this->vistas= new studentViewController;
        $this->studentService= new createStudentService();
        $this->studentService->SaveStudent($this->parsePOST());
        $this->vistas->Students();
    }
}