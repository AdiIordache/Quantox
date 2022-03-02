<?php

use Quantox\Database\DataExtractor;

require 'vendor/autoload.php';

$dataExtractor = new DataExtractor();
$dataExtractor->getStudent();

$controllerMap = [
  'getJson' => new ControlerJson(),
  'getXml' => new ControllerXml()
];
