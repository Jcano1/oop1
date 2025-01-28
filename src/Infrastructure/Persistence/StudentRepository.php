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
            $resultadoStudents=$stmt->fetchAll();
            for($i=0;$i<count($resultadoStudents);$i++){
                $id=$resultadoStudents[$i]['id'];
                $stmt=$this->db->prepare('SELECT 
                    enrollments.id,
                    enrollments.student_id,
                    students.dni,
                    enrollments.subject_id,
                    subjects.name AS subject_name,
                    enrollments.enrollment_date
                FROM 
                    enrollments
                JOIN 
                    students ON enrollments.student_id = students.id
                JOIN 
                    subjects ON enrollments.subject_id = subjects.id
                WHERE 
                    enrollments.student_id = :id
                LIMIT 1;');
                $stmt->execute([
                    'id'=>$id
                ]);
                $resultado=$stmt->fetchAll();
                if(count($resultado)==0){
                    $resultadoStudents[$i]['courseid']=0;
                }else{
                    $idsubject=$resultado[0]['subject_id'];
                    $stmt=$this->db->prepare('SELECT 
                        courses.id
                    FROM 
                        courses
                    JOIN 
                        subjects ON courses.id = subjects.course_id
                    WHERE 
                        subjects.id = :id;
                    ');

                    $stmt->execute([
                        'id'=>$idsubject
                    ]);
                    $resultado=$stmt->fetchAll();
                    $resultadoStudents[$i]['courseid']=$resultado[0]['id'];
                }

                
            }
            return $resultadoStudents;
        }

        public function mihuevios(){
            print 'hola';
        }

    }



?>
