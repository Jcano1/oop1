<?php
    namespace App\Controllers;


    use App\School\Services\createStudentService;

class createStudentController{
 

    private createStudentService $studentService;

    private function parsePOST(){
        foreach ($_POST as $key => $value) {
            $arrayPOST[$key]=$value;
        }
        return $arrayPOST;
    }

    function CreateStudent(){
        
        $this->studentService= new createStudentService();
        $this->studentService->SaveStudent($this->parsePOST());
        header('Location: Student');
    }
}