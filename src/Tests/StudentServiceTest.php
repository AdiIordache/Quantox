<?php

namespace Tests;

use Model\Student;
use PHPUnit\Framework\TestCase;
use Service\StudentService;

class StudentServiceTest extends TestCase
{
    public function testCalculateFailsForCsm()
    {
        $student = new Student(1,5,8,10,8.2);
        $secondStudent = new Student(1,3,8.5,4,1);
        $service = new StudentService();
        $this->assertEquals(true, ($service->calculateFailForCsm($student))->getPassed());
        $this->assertEquals(false, ($service->calculateFailForCsm($secondStudent))->getPassed());
    }

    public function testCalculateFailsForCsmb()
    {
        $student = new Student(1,5,null,null,7.9);
        $secondStudent = new Student(1,3,8.5,4,null);
        $thirdStudent = new Student(1,3,8.5,9,10);
        $service = new StudentService();
        $this->assertEquals(false, ($service->calculateFailForCsmb($student))->getPassed());
        $this->assertEquals(true, ($service->calculateFailForCsmb($secondStudent))->getPassed());
        $this->assertEquals(true, ($service->calculateFailForCsmb($thirdStudent))->getPassed());
    }
}
