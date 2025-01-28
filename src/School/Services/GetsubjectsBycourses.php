<?php

namespace App\School\Services;

use App\Infrastructure\Database\DatabaseConnection;
use App\Infrastructure\Persistence\subjectsRepository;

class GetsubjectsBycourses{

    private subjectsRepository $subjectsRepository;

    function __construct(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->subjectsRepository=new subjectsRepository($bd);
    }

    function Getsubjectsbycourses($courseid){
        return $this->subjectsRepository->GetsubjectsByCourse($courseid);
    }



}