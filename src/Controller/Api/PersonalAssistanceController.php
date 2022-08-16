<?php

namespace App\Controller\Api;

use App\Entity\PersonalAssistance;
use App\Repository\PersonalAssistanceRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/personal/assistance", name="app_api_personal_assistance")
 */
class PersonalAssistanceController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(PersonalAssistanceRepository $personalAssistanceRepository): JsonResponse
    {
        $personalAssistances = $personalAssistanceRepository->findAll();

        return $this->json(
            $personalAssistances,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_personal_assistance"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(PersonalAssistance $personalAssistance = null): JsonResponse
    {
        if ($personalAssistance === null) {
            return $this->json404("l'aide à la personne n'a pas été trouvé");
        }

        return $this->json(
            $personalAssistance,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_personal_assistance"
            ]]
        );
    }

    #"type": string
}
