<?php

    namespace App\School\Entities;

    use App\School\Trait\Timestampable;
    use App\School\Entities\User;
    use App\School\Entities\Department;
    class Teacher extends User{
        use Timestampable;

        protected $department;

        function __construct($name,$email,$password,$last_name,$usertipe){
            parent::__construct($name,$email,$password,$last_name,$usertipe);
            $this->updateTimestamps();
        }

        public function addToDepartment(Department $dept){
            $this->department=$dept;
        }
    }