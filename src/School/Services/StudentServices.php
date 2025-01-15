<?php
    namespace App\School\Services;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Persistence\StudentRepository;
    use App\School\Entities\Student;

class  StudentServices{
    private Student $Student;
    private StudentRepository $teacherRepository;
    private DatabaseConnection $bd;
}

?>