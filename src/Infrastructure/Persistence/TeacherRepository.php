<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Entities\Teacher;
    use App\School\Repositories\ITeacherRepository;

    class TeacherRepository implements ITeacherRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function save(Teacher $teacher){
            $stmt=$this->db->prepare("INSERT INTO users(first_name,last_name,email,password,user_type,uuid) VALUES(:username,:last_name,:email,:password,:user_type,:uuid)");
            $stmt->execute([
                'username'=>$teacher->getUsername(),
                'last_name'=>$teacher->getLast_name(),
                'email'=>$teacher->getEmail(),
                'password'=>$teacher->getPassword(),
                'user_type'=>"teacher",
                'uuid'=>rand(0,1000)
            ]);
            $id=$this->db->lastInsertId();
            $stmt=$this->db->prepare("INSERT INTO teachers(user_id,department_id) VALUES(:id,0)");
            $stmt->execute([
                "id"=>$id
            ]);
        }
        function findBydni($dni):?Teacher{
            $stmt=$this->db->prepare("SELECT * FROM users WHERE dni=:dni");
            $stmt->execute(['dni'=>$dni]);
            return $stmt->fetchObject(Teacher::class);
        }
        function GetAllteachers(){
            $stmt=$this->db->prepare('SELECT u.first_name, u.last_name, u.id, u.email, t.department_id, t.id as idteacher  FROM users u JOIN teachers t ON u.id = t.user_id WHERE u.user_type = "teacher";');
            $stmt->execute();
            return $stmt->fetchAll();
        }

        function UpdateTeacherDepartment($idTeacher,$idDepartment){
            $stmt=$this->db->prepare('UPDATE teachers SET department_id = :idDepartment WHERE id = :idTeacher');
            $stmt->execute([
                'idDepartment'=>$idDepartment,
                'idTeacher'=>$idTeacher
            ]);
            var_dump('prueba');
        }
    }