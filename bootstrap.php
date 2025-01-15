<?php

use App\Controllers\StudentController;
    define('VIEWS',__DIR__.'/src/views');
    require __DIR__.'/vendor/autoload.php';
    $dotenv=Dotenv\Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    use App\Controllers\HomeController;
    use App\Controllers\TeacherController;
    use App\Infrastructure\Database\DatabaseConnection;
    use App\Infrastructure\Routing\Router;
    use App\School\Services\EnrollmentService;
    use App\Infrastructure\Persistence\EnrollmentRepository;
    
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
            ->addRoute('GET','/teachers',[new TeacherController(),'teachers'])
            ->addRoute('GET','/CreateTeacher',[new TeacherController(),'CreateTeacherview'])
            ->addRoute('POST','/createNewTeacher',[new TeacherController(),'CreateTeacher'])
            ->addRoute('GET','/UpdateDepartment',[new TeacherController(),'UpdateTeacherDepartment'])
            ->addRoute('GET','/Student',[new StudentController(),'Student'])
            ->addRoute('GET','/CreateStudent',[new StudentController(),'CreateStudentView'])
            ->addRoute('POST','/CreateNewStudent',[new StudentController(),'CreateNewStudent']);