<?php
    namespace App\Controllers;

   use App\School\Services\GetAllTeachersService;
   use App\School\Services\GetAllDepartmentsService;

class teachersViewController {

    private GetAllTeachersService $teacherService;
    private GetAllDepartmentsService $departmentService;

    function teachers(){
        $this->teacherService= new GetAllTeachersService();
        $this->departmentService= new GetAllDepartmentsService();
        $data=["infoTeacher"=>$this->teacherService->GetAllTeachers(),'infoDepartment'=>$this->departmentService->GetAllDepartments()];
        echo view('teachers',$data);
    }

}