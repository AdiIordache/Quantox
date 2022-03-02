<?php

namespace Controller;

use PHPUnit\Util\Xml;


class XmlResponseController extends AbstractController
{
    public function provideResponse(): string
    {
        $student = $this->getStudentForResponse();

        $this->studentService->calculateFailForCsmb($student);

        $studentArray = (array) $student;

        $xml = $this->studentService->arrayToXml($studentArray);

        return $xml;
    }
}