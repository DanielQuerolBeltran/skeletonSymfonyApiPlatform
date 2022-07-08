<?php

declare(strict_types=1);

namespace App\Common\Responses;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class InvalidUuidSetAsParameterResponse
{
    public function __invoke(): JsonResponse {
        return new JsonResponse(
            [
                'error' => 'Invalid uuid supplied as parameter',
            ],
            Response::HTTP_BAD_REQUEST
        );
    }
}
