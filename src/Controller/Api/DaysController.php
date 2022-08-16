<?php

namespace App\Controller\Api;

use App\Entity\Days;
use App\Repository\DaysRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/days", name="app_api_days")
 */
class DaysController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(DaysRepository $daysRepository): JsonResponse
    {
        $personalAssistances = $daysRepository->findAll();

        return $this->json(
            $personalAssistances,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_days"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(Days $days = null): JsonResponse
    {
        if ($days === null) {
            return $this->json404("le jour n'a pas été trouvé");
        }

        return $this->json(
            $days,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_days"
            ]]
        );
    }

    #name: string
}
