<?php
    namespace App\Infrastructure\Persistence;
use App\School\Repositories\ISubjectRepository;

    class subjectsRepository implements ISubjectRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        public function GetsubjectsByCourse($idcourse){
            $stmt=$this->db->prepare('SELECT * from subjects where course_id=:id');
            $stmt->execute([
                'id'=>$idcourse
            ]);
            return $stmt->fetchAll();
        }

    }