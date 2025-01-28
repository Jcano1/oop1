<?php
   namespace App\School\Services;

   use App\Infrastructure\Database\DatabaseConnection;
   use App\Infrastructure\Persistence\TeacherRepository;
   use App\School\Repositories\ITeacherRepository;
   use App\School\Entities\Teacher;

class createTeacherService{
    private Teacher $teacher;
    private ITeacherRepository $teacherRepository;
    private DatabaseConnection $bd;
    function __construct(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->teacherRepository=new TeacherRepository($bd);
    }
    function SaveTeacher(array $DatosTeacher){
        $this->teacher=new Teacher($DatosTeacher['nombre'],$DatosTeacher['email'],$DatosTeacher['password'],$DatosTeacher['last_name'],"teacher");
        $this->teacherRepository->save($this->teacher);
    }
}