<?php
    namespace App\Controllers;

    use App\Controllers\teachersViewController;
    use App\School\Services\createTeacherService;

class createTeacherController{

    private teachersViewController $vistas;
    private createTeacherService $teacherService;

    private function parsePOST(){
        foreach ($_POST as $key => $value) {
            $arrayPOST[$key]=$value;
        }
        return $arrayPOST;
    }       
    function CreateTeacher(){
        $this->vistas= new teachersViewController;
        $this->teacherService= new createTeacherService();
        $this->teacherService->SaveTeacher($this->parsePOST());
        $this->vistas->teachers();
    }
}