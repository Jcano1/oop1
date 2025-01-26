<?php
   namespace App\School\Services;

   use App\Infrastructure\Database\DatabaseConnection;
   use App\Infrastructure\Persistence\StudentRepository;
   use App\School\Entities\Student;

class createStudentService{
    private Student $Student;
    private StudentRepository $StudentRepository;
    private DatabaseConnection $bd;

    function SaveStudent(array $DatosStudent){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->Student=new Student($DatosStudent['nombre'],$DatosStudent['email'],$DatosStudent['password'],$DatosStudent['last_name'],$DatosStudent['DNI'],"Student");
        $this->StudentRepository=new StudentRepository($bd);
        $this->StudentRepository->save($this->Student);
    }
}