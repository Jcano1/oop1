<?php

    namespace App\School\Entities;

    use App\School\Entities\User;
   
    use App\School\Trait\Timestampable;

    class Student extends User {
        use Timestampable;
        protected $DNI;
        protected $EnrollmentYear;
        protected $enrollments=[];

       
        function __construct($name,$email,$password,$last_name,$DNI,$usertipe){
            parent::__construct($name,$email,$password,$last_name,$usertipe);
            $this->updateTimestamps();
            $this->DNI=$DNI;
            $this->getEnrollmentYear=date('Y');
        }

        public function getDNI()
        {
                return $this->DNI;
        }

        public function getEnrollmentYear()
        {
                return $this->getEnrollmentYear;
        }
    }