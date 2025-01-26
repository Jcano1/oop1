<?php
    namespace App\School\Services;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Persistence\StudentRepository;

class  GetAllStudentsService{

    private StudentRepository $StudentRepository;
    private DatabaseConnection $bd;
    function __construct(){

    }
    function GetAllStudents(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->StudentRepository= new StudentRepository($bd);
        $resultado=$this->StudentRepository->GetAllStudents();
        return $resultado;
    }
}