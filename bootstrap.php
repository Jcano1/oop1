<?php

use App\Controllers\StudentController;
    define('VIEWS',__DIR__.'/src/views');
    require __DIR__.'/vendor/autoload.php';
    $dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use App\Controllers\HomeController;
    use App\Controllers\CreateTeacherViewController;
    use App\Controllers\updateTeacherDepartmentController;
    use App\Controllers\teachersViewController;
    use App\Controllers\studentViewController;
    use App\Controllers\CreateStudentViewController;
    use App\Controllers\createStudentController;
    use App\Controllers\AsignStudentCoursesController;

    use App\Controllers\createTeacherController;


    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Routing\Router;
    
    use App\School\Services\Services;
    

    //carga de servicios siguiendo dependencias
    $db=DatabaseConnection::getConnection();
    $services=new Services();
    $services->addServices('db',fn()=>$db);
    $db=$services->getService('db');
    $services->addServices('enrollmentRepository',fn()=>new EnrollmentRepository($db));
   
    $router=new Router();
    $router->addRoute('GET','/',[new HomeController(),'index'])
            ->addRoute('GET','/home',[new HomeController(),'index'])
            ->addRoute('GET','/teachers',[new teachersViewController(),'teachers'])
            ->addRoute('GET','/CreateTeacher',[new CreateTeacherViewController(),'CreateTeacherview'])
            ->addRoute('POST','/createNewTeacher',[new createTeacherController(),'CreateTeacher'])
            ->addRoute('GET','/UpdateDepartment',[new updateTeacherDepartmentController(),'UpdateTeacherDepartment'])
            ->addRoute('GET','/Student',[new studentViewController(),'students'])
            ->addRoute('GET','/CreateStudent',[new CreateStudentViewController(),'CreateStudentView'])
            ->addRoute('POST','/createNewStudent',[new createStudentController(),'CreateStudent'])
            ->addRoute('GET','/UpdateCourses',[new AsignStudentCoursesController(),'AsignStudentCourse']);
