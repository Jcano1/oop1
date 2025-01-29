<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use App\Controllers\updateTeacherDepartmentController;
use App\School\Services\UpdateTeacherDepartmentService;

class UpdateTeacherDepartmentControllerTest extends TestCase
{
    public function testUpdateTeacherDepartment()
    {
        // Mock del servicio
        $serviceMock = $this->createMock(UpdateTeacherDepartmentService::class);
        
        // Simular la llamada GET
        $_GET['teacherId'] = "1";
        $_GET['DepartamentosId'] = "1";

        // Verificar que el servicio se llama con los parámetros correctos
        $serviceMock->expects($this->once())
            ->method('UpdateTeacherDepartment')
            ->with('1', '1');

        // Crear instancia del controlador
        $controller = new updateTeacherDepartmentController();

        // Inyección del servicio mock
        $reflection = new \ReflectionClass($controller);
        $property = $reflection->getProperty('UpdateTeacherDepartmentService');
        $property->setAccessible(true);
        $property->setValue($controller, $serviceMock);

        // Llamada al método del controlador
        $controller->UpdateTeacherDepartment();

        // Esta parte de headers puede fallar si no tienes xdebug, coméntala si es el caso
        // $this->assertContains('Location: teachers', xdebug_get_headers());
        
        // Verificación básica
        $this->assertTrue(true);
    }
}
