<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Entities\Student;
    use App\School\Repositories\IStudentRepository;

    class StudentRepository implements IStudentRepository{

        public function __construct(){
            
        }
        public function save(Student $student){

        }


    }



?>
