<?php

declare(strict_types=1);

namespace App\Common\Responses;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class InternalErrorResponse
{
    public function __invoke(): JsonResponse {
        return new JsonResponse(
            [
                'error' => 'Internal error',
            ],
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
