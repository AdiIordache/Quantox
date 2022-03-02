<?php

namespace Controller;

use Database\DataExtractor;
use Model\Student;

use Service\StudentService;

class AbstractController
{
    private DataExtractor $dataExtractor;
    protected StudentService $studentService;

    public function __construct($dataExtractor, $studentService)
    {
        $this->dataExtractor = $dataExtractor;
        $this->studentService = $studentService;
    }

    protected function getStudent($id): Student
    {
        $studentInformation = $this->validateQuery($id);

        $school = $studentInformation['school_id'] ?? null;
            $firstGrade = $studentInformation['first_grade'] ?? null;
            $secondGrade = $studentInformation['second_grade'] ?? null;
            $thirdGrade = $studentInformation['third_grade'] ?? null;
            $fourthGrade = $studentInformation['fourth_grade'] ?? null;

            return new Student($school, $firstGrade,$secondGrade, $thirdGrade, $fourthGrade, false);
    }

    public function getStudentId()
    {
        if (!isset($_GET['student'])) {
            throw new \InvalidArgumentException("Invalid query string specified");
        }

        return $_GET['student'];
    }

    public function getSchoolId()
    {
        $id = $this->getStudentId();
        $studentInformation = $this->validateQuery($id);

        return $studentInformation['school_id'];
    }

    /**
     * @return Student
     */
    protected function getStudentForResponse(): Student
    {
        $studentId = $this->getStudentId();

        return $this->getStudent($studentId);
    }

    /**
     * @param $id
     * @return array
     */
    protected function validateQuery($id): array
    {
        $studentInformation = $this->dataExtractor->getStudent($id);

        if (empty($studentInformation)) {
            throw new \InvalidArgumentException('The specified student id does not exist');
        }

        return $studentInformation;
    }
}