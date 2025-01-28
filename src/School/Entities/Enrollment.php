<?php
    namespace App\School\Entities;



    class Enrollment{
        private int $id;
        private $studentid;
        private $subjectid;
        private $enrollmentdate;
        
        function __construct($studentid,$subjectid){
                $this->studentid=$studentid;
                $this->subjectid=$subjectid;
                $this->enrollmentdate= Date('Y');
                var_dump($this->enrollmentdate);
        }
        

        public function getStudentid()
        {
                return $this->studentid;
        }

        public function getSubjectid()
        {
                return $this->subjectid;
        }

        /**
         * Get the value of enrollmentdate
         */ 
        public function getEnrollmentdate()
        {
                return $this->enrollmentdate;
        }
    }