<?php
    namespace App\Controllers;
    use App\School\Services\CreateEnrollments;

    class AsignStudentCoursesController{
        private CreateEnrollments $enrollmentService;
        function __construct(){
            
        }
        private function parseGET(){
            foreach ($_GET as $key => $value) {
                $arrayGET[$key]=$value;
            }
            return $arrayGET;
        }
        public function AsignStudentCourse(){
            $this->enrollmentService= new CreateEnrollments();
            $recivido=$this->parseGET();
            $studentid=$recivido['StudentId'];
            $CorusesId=$recivido['CorusesId'];
            $this->enrollmentService->createEnrollment($CorusesId,$studentid);
            header('Location: Student');
        }
        
    }