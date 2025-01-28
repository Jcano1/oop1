<?php
    namespace App\School\Services;
use App\Infrastructure\Database\DatabaseConnection;
use App\School\Repositories\ICourseRepository;
use App\Infrastructure\Persistence\CourseRepository;

class GetAllcoursesService{
    private DatabaseConnection $bd;
    private ICourseRepository $courseRepository; 
    function __construct(){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->courseRepository=new CourseRepository($bd);
    }
    function GetAllCourses(){
        $resultado=$this->courseRepository->GetAllCourses();
        return $resultado;
    }
}