<?php

namespace Service;

use Model\Student;

class StudentService
{
 public function calculateFailForCsm(Student $student): Student
 {
    $grades = $student->getGrades();
    $average = array_sum($grades) / count($grades);

    if ($average >= 7)
    {
        $student->setPassed(true);
    }

    return $student;
 }

    public function calculateFailForCsmb(Student $student): Student
    {
        $grades = $student->getGrades();

        if (count($grades) > 2)
        {
            array_shift($grades);
            if ($this->isBiggestGradeLargeEnough($grades)) {
                $student->setPassed(true);
                exit('cuc');
            }
        }
        if (count($grades) <= 2 && $this->isBiggestGradeLargeEnough($grades)) {
            $student->setPassed(true);
        }
        return $student;
    }

    /**
     * @param array $grades
     * @return bool
     */
    protected function isBiggestGradeLargeEnough(array $grades): bool
    {
        return array_pop($grades) > 8;
    }

    public function arrayToXml($array, $rootElement = null, $xml = null) {
        $_xml = $xml;

        // If there is no Root Element then insert root
        if ($_xml === null) {
            $_xml = new \SimpleXMLElement($rootElement !== null ? $rootElement : '<root/>');
        }

        // Visit all key value pair
        foreach ($array as $k => $v) {

            // If there is nested array then
            if (is_array($v)) {

                // Call function for nested array
                $this->arrayToXml($v, $k, $_xml->addChild($k));
            }

            else {

                // Simply add child element.
                $_xml->addChild($k, $v);
            }
        }

        return $_xml->asXML();
    }
}