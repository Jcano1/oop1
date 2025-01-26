<?php
    namespace App\School\Services;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Persistence\TeacherRepository;

class  GetAllTeachersService{

    private TeacherRepository $teacherRepository;
    private DatabaseConnection $bd;
    function __construct(){

    }
    function GetAllTeachers(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->teacherRepository= new TeacherRepository($bd);
        $resultado=$this->teacherRepository->GetAllteachers();
        return $resultado;
    }
}