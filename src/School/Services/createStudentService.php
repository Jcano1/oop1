<?php
   namespace App\School\Services;

   use App\Infrastructure\Database\DatabaseConnection;
   use App\School\Repositories\IStudentRepository;
   use App\Infrastructure\Persistence\StudentRepository;
   use App\School\Entities\Student;

class createStudentService{
    private Student $Student;
    private IStudentRepository $StudentRepository;
    private DatabaseConnection $bd;
    function __construct(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->StudentRepository=new StudentRepository($bd);
    }
    function SaveStudent(array $DatosStudent){
        
        $this->Student=new Student($DatosStudent['nombre'],$DatosStudent['email'],$DatosStudent['password'],$DatosStudent['last_name'],$DatosStudent['DNI'],"Student");
        $this->StudentRepository->save($this->Student);
    }
}