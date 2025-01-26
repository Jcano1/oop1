<?php
    namespace App\Controllers;

   use App\School\Services\GetAllStudentsService;

class studentViewController {
    private GetAllStudentsService $studentService;

    function students(){
        $this->studentService= new GetAllStudentsService();
        $data=["infoStudent"=>$this->studentService->GetAllStudents()];
        echo view('student',$data);
    }

}