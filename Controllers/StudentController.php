<?php
   namespace App\Controllers;
   use App\School\Entities\Student;
   use App\School\Services\StudentServices;

   class StudentController{
    private StudentServices $StudentService;
   private function parsePOST(){
        foreach ($_POST as $key => $value) {
            $arrayPOST[$key]=$value;
        }
        return $arrayPOST;
    }
    private function parseGET(){
        foreach ($_GET as $key => $value) {
            $arrayGET[$key]=$value;
        }
        return $arrayGET;
    }

    public function __construct(){
    }

    public function Student(){
        //$this->StudentService= new StudentService();
        //$data=['infoStudent'=>$this->StudentService->GetAllStudents()];
        echo view('student');
    }
    public function CreateStudentView(){
        echo view('CreateStudent');
    }
    function CreateNewStudent(){
        $this->StudentService= new StudentServices();
        $this->StudentService->SaveTeacher($this->parsePOST());
        $this->Student();
    }
   }
?>