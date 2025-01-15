<?php
   namespace App\Controllers;

   use App\School\Services\TeacherService;
   use App\School\Services\DepartmentService;


    class TeacherController {
        private TeacherService $teacherService;
        private DepartmentService $departmentService;
        public function __construct(){
        }
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
        function teachers(){
            $this->teacherService= new TeacherService();
            $this->departmentService= new DepartmentService();
            $data=["infoTeacher"=>$this->teacherService->GetAllTeachers(),'infoDepartment'=>$this->departmentService->GetAllDepartments()];
            echo view('teachers',$data);
        }
        function CreateTeacherview(){
            echo view('CreateTeacher');
        }
        function CreateTeacher(){
            $this->teacherService= new TeacherService();
            $this->teacherService->SaveTeacher($this->parsePOST());
            $this->teachers();
        }
        function UpdateTeacherDepartment(){
            $this->teacherService= new TeacherService();
            $resultado=$this->parseGET();
            var_dump($resultado);
            $idteacher=$resultado['teacherId'];
            $idDepartment=$resultado['DepartamentosId'];
            $this->teacherService->UpdateTeacherDepartment($idteacher,$idDepartment);
        }
    }
?>