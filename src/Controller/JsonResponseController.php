<?php

namespace Controller;

use Symfony\Component\HttpFoundation\JsonResponse;

class JsonResponseController extends AbstractController
{
    public function provideResponse(): JsonResponse
    {
        $student = $this->getStudentForResponse();
        $this->studentService->calculateFailForCsm($student);

        return new JsonResponse(json_encode($student));
    }


}