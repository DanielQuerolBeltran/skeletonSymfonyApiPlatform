<?php

declare(strict_types=1);

namespace App\Controller\Greetings;

use App\Common\Responses\InternalErrorResponse;
use App\Common\Responses\InvalidBodyRequestResponse;
use App\Packages\Common\Application\Exception\InvalidResourceException;
use App\Packages\Common\Application\Exception\PersistenceErrorException;
use App\Packages\Greetings\Application\CreateGreetingService;
use App\Packages\Greetings\Application\DTO\GreetingDTO;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class CreateGreetingController extends AbstractController
{
    public function __construct(private CreateGreetingService $service)
    {
    }

    public function __invoke(Request $request): JsonResponse|GreetingDTO
    {
        $bodyRequest = $request->getContent();
        if (empty($bodyRequest)) {
            return (new InvalidBodyRequestResponse())();
        }

        $bodyRequest = json_decode($bodyRequest, true);

        if (empty($name = $bodyRequest['name'])) {
            return (new InvalidBodyRequestResponse())();
        }

        try {
            return ($this->service)($name);
        } catch (InvalidResourceException $e) {
            return (new InvalidBodyRequestResponse())();
        } catch (PersistenceErrorException) {
            return (new InternalErrorResponse())();
        }
    }
}
