<?php
   namespace App\School\Services;

   use App\Infrastructure\Database\DatabaseConnection;
   use App\Infrastructure\Persistence\TeacherRepository;
   use App\School\Entities\Teacher;

class createTeacherService{
    private Teacher $teacher;
    private TeacherRepository $teacherRepository;
    private DatabaseConnection $bd;

    function SaveTeacher(array $DatosTeacher){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->teacher=new Teacher($DatosTeacher['nombre'],$DatosTeacher['email'],$DatosTeacher['password'],$DatosTeacher['last_name'],"teacher");
        $this->teacherRepository=new TeacherRepository($bd);
        $this->teacherRepository->save($this->teacher);
    }
}