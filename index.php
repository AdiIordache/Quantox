<?php

use Controller\JsonResponseController;
use Controller\XmlResponseController;

use Database\DataExtractor;
use Service\StudentService;

require 'vendor/autoload.php';

$dataExtractor = new DataExtractor();
$service = new StudentService();


$jsonResponseController = new JsonResponseController($dataExtractor, $service);
$xmlResponseController = new XmlResponseController($dataExtractor, $service);

$studentId = $jsonResponseController->getSchoolId();
$controllerMap = [
    '1' => $jsonResponseController,
    '2' => $xmlResponseController,
];

print (($controllerMap[$studentId])->provideResponse());

