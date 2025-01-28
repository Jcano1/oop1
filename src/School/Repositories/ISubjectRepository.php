<?php

namespace App\School\Repositories;
use App\School\Entities\Subject;

    interface ISubjectRepository{
        public function GetsubjectsByCourse($idcourse);
        
    }