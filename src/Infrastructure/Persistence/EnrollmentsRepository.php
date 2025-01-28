<?php

    namespace App\Infrastructure\Persistence;


    use App\School\Entities\Enrollment;
    use App\School\Repositories\IEnrollmentRepository;

    class EnrollmentsRepository implements IEnrollmentRepository{
        private \PDO $db;
        function __construct(\PDO $db){
            $this->db=$db;
        }

        function voidEnrollment(Enrollment $enrollment){
            $stmt=$this->db->prepare("DELETE FROM enrollments WHERE student_id = :id;");
            var_dump($enrollment->getStudentid());
            $stmt->execute([
                'id'=>$enrollment->getStudentid()
            ]);
        }
        function save(Enrollment $enrollment){
            $stmt=$this->db->prepare("INSERT INTO enrollments(student_id,subject_id) VALUES(:studentid,:subject_id)");
            $stmt->execute([
                'studentid'=>$enrollment->getStudentid(),
                'subject_id'=>$enrollment->getSubjectid()
            ]);
            return $stmt->fetchObject();
        }
        


    }