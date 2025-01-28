<?php
    namespace App\Controllers;

   use App\School\Services\GetAllStudentsService;
   use App\School\Services\GetAllcoursesService;

class studentViewController {
    private GetAllStudentsService $studentService;
    private GetAllcoursesService $coursesService;

    function students(){
        $this->studentService= new GetAllStudentsService();
        $this->coursesService= new GetAllcoursesService();
        $data=["infoStudent"=>$this->studentService->GetAllStudents(),'infoCoruse'=>$this->coursesService->GetAllCourses()];
        echo view('student',$data);
    }

}