<?php
    namespace App\Infrastructure\Persistence;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\School\Entities\Department;
    use App\School\Repositories\IDepartmentRepository;

    class DepartmentRepository implements IDepartmentRepository{
        private \PDO $db;

        function __construct(\PDO $db){
            $this->db=$db;
        }

        function GETAllDepartment(){
            $stmt=$this->db->prepare('SELECT name,id FROM departments');
            $stmt->execute();
            return $stmt->fetchAll();
        }

    }