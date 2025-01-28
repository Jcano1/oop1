<?php

namespace App\School\Services;

use App\Infrastructure\Database\DatabaseConnection;
use App\School\Repositories\IEnrollmentsRepository;
use App\Infrastructure\Persistence\EnrollmentsRepository;
use App\School\Entities\Enrollment;

use App\School\Services\GetsubjectsBycourses;

class CreateEnrollments{
    private Enrollment $enrollment;
    private EnrollmentsRepository $EnrollmentsRepository;
    private DatabaseConnection $bd;
    private GetsubjectsBycourses $getSubjects;
    
    function __construct(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->EnrollmentsRepository=new EnrollmentsRepository($bd);
    }

    function createEnrollment($idcourse,$idstudent){
        $this->getSubjects= new GetsubjectsBycourses();
        $resultado=$this->getSubjects->Getsubjectsbycourses($idcourse);
        $this->enrollment= new Enrollment($idstudent,$resultado[0]['id']);
        $this->EnrollmentsRepository->voidEnrollment($this->enrollment);
        for ($i=0;$i<count($resultado);$i++){
            $this->enrollment= new Enrollment($idstudent,$resultado[$i]['id']);
            $this->EnrollmentsRepository->save($this->enrollment);
        }
        var_dump('echo');

    }

}