<?php
    namespace App\School\Services;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Entities\Department;
    use App\Infrastructure\Persistence\DepartmentRepository;

    class DepartmentService{
        private DepartmentRepository $DepartmentRepository;
        private DatabaseConnection $bd;
        function GetAllDepartments(){
            $this->bd=new DatabaseConnection();
            $bd=$this->bd->getConnection();
            $this->DepartmentRepository= new DepartmentRepository($bd);
            $resultado=$this->DepartmentRepository->GETAllDepartment();
            return $resultado;
        }

    }

?>