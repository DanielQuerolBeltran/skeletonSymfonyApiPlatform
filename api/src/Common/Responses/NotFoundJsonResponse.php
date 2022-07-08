<?php

declare(strict_types=1);

namespace App\Common\Responses;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class NotFoundJsonResponse
{
    public function __invoke(): JsonResponse {
        return new JsonResponse(
            [
                'error' => 'Resource not found',
            ],
            Response::HTTP_NOT_FOUND
        );
    }
}
