<?php
    namespace App\School\Services;

    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Persistence\TeacherRepository;
    use App\School\Entities\Teacher;

class  UpdateTeacherDepartmentService{
    private Teacher $teacher;
    private TeacherRepository $teacherRepository;
    private DatabaseConnection $bd;
    function __construct(){

    }

    function UpdateTeacherDepartment($idTeacher,$idDepartment){
        $this->bd=new DatabaseConnection();
        $bd=$this->bd->getConnection();
        $this->teacherRepository= new TeacherRepository($bd);
        $this->teacherRepository->UpdateTeacherDepartment($idTeacher,$idDepartment);
    }
}
?>