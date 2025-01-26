<?php
   namespace App\Controllers;

   use App\School\Services\UpdateTeacherDepartmentService;
   use App\Controllers\teachersViewController;

    class updateTeacherDepartmentController {

        private UpdateTeacherDepartmentService $UpdateTeacherDepartmentService;
        private teachersViewController $vistas;

        public function __construct(){
        }
        private function parseGET(){
            foreach ($_GET as $key => $value) {
                $arrayGET[$key]=$value;
            }
            return $arrayGET;
        }

        function UpdateTeacherDepartment(){
            $this->UpdateTeacherDepartmentService= new UpdateTeacherDepartmentService();
            $this->vistas= new teachersViewController;
            $resultado=$this->parseGET();
            $idteacher=$resultado['teacherId'];
            $idDepartment=$resultado['DepartamentosId'];
            $this->UpdateTeacherDepartmentService->UpdateTeacherDepartment($idteacher,$idDepartment);
            $this->vistas->teachers();
        }
    }
?>