<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Entities\Student;
    use App\School\Repositories\IStudentRepository;

    class StudentRepository implements IStudentRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }
        public function save(Student $student){
            $stmt=$this->db->prepare("INSERT INTO users(first_name,last_name,email,password,user_type,uuid) VALUES(:username,:last_name,:email,:password,:user_type,:uuid)");
            $stmt->execute([
                'username'=>$student->getUsername(),
                'last_name'=>$student->getLast_name(),
                'email'=>$student->getEmail(),
                'password'=>$student->getPassword(),
                'user_type'=>$student->getUsertipe(),
                'uuid'=>rand(0,1000)
            ]);
            $id=$this->db->lastInsertId();
            $stmt=$this->db->prepare("INSERT INTO students(user_id,DNI,enrollment_year) VALUES(:id,:dni,:enrollment)");
            $stmt->execute([
                "id"=>$id,
                "dni"=>$student->getDNI(),
                "enrollment"=>$student->getEnrollmentYear()
            ]);
        }

        public function GetAllStudents(){
            $stmt=$this->db->prepare('SELECT u.first_name, u.last_name, u.id, u.email, t.dni, t.id, t.enrollment_year as idStudent  FROM users u JOIN students t ON u.id = t.user_id WHERE u.user_type = "Student";');
            $stmt->execute();
            return $stmt->fetchAll();
        }


    }



?>
