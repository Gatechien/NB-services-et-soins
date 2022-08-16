<?php

namespace App\Controller\Api;

use App\Entity\Intervention;
use App\Repository\InterventionRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/intervention", name="app_api_intervention")
 */
class InterventionController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(InterventionRepository $interventionRepository): JsonResponse
    {
        $interventions = $interventionRepository->findAll();

        return $this->json(
            $interventions,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_intervention"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(Intervention $intervention = null): JsonResponse
    {
        if ($intervention === null) {
            return $this->json404("l'aide à la personne n'a pas été trouvé");
        }

        return $this->json(
            $intervention,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_intervention"
            ]]
        );
    }

    #"moment": string
}
