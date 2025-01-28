<?php
   namespace App\Infrastructure\Persistence;

   use App\School\Repositories\ICourseRepository;
   
class CourseRepository implements ICourseRepository{
    private \PDO $db;
    function __construct(\PDO $db){
        $this->db=$db;
    }

    public function GetAllCourses(){
        $consulta='SELECT * from courses';
        $stmt=$this->db->prepare($consulta);
        $stmt->execute();
        return $stmt->fetchAll();
    }

}