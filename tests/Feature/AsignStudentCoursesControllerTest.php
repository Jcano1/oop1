<?php

namespace Tests\Feature;

use PHPUnit\Framework\TestCase;
use App\Controllers\AsignStudentCoursesController;
use App\School\Services\CreateEnrollments;

class AsignStudentCoursesControllerTest extends TestCase
{
    public function testAsignStudentCourse()
    {
        // Mock del servicio CreateEnrollments
        $enrollmentServiceMock = $this->createMock(CreateEnrollments::class);

        // Simular la llamada GET
        $_GET['StudentId'] = "1";
        $_GET['CorusesId'] = "4";

        // Verificar que el método createEnrollment sea llamado con los parámetros correctos
        $enrollmentServiceMock->expects($this->once())
            ->method('createEnrollment')
            ->with('4', '1');

        // Crear una instancia del controlador
        $controller = new AsignStudentCoursesController();

        // Inyección del servicio mock
        $reflection = new \ReflectionClass($controller);
        $property = $reflection->getProperty('enrollmentService');
        $property->setAccessible(true);
        $property->setValue($controller, $enrollmentServiceMock);

        // Llamada al método del controlador
        $controller->AsignStudentCourse();

        // Verificación básica, ya que la función header('Location: Student') no afecta la lógica que estamos probando
        $this->assertTrue(true);
    }
}
