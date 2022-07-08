<?php

declare(strict_types=1);

namespace App\Controller\Greetings;

use App\Common\Responses\NotFoundJsonResponse;
use App\Packages\Common\Application\Exception\ResourceNotFoundException;
use App\Packages\Greetings\Application\DTO\GreetingDTO;
use App\Packages\Greetings\Application\GetGreetingService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GetGreetingByIdController extends AbstractController
{
    public function __construct(private GetGreetingService $service)
    {
    }

    public function __invoke(int $id, Request $request): JsonResponse|GreetingDTO
    {
        try {
            return ($this->service)($id);
        } catch (ResourceNotFoundException) {
            return (new NotFoundJsonResponse())();
        }
    }

}
