<?php

namespace App\Controller\Api;

use App\Entity\Frequency;
use App\Repository\FrequencyRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/frequency", name="app_api_frequency")
 */
class FrequencyController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(FrequencyRepository $frequencyRepository): JsonResponse
    {
        $frequencys = $frequencyRepository->findAll();

        return $this->json(
            $frequencys,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_frequency"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(Frequency $frequency = null): JsonResponse
    {
        if ($frequency === null) {
            return $this->json404("la frequence n'a pas été trouvé");
        }

        return $this->json(
            $frequency,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_frequency"
            ]]
        );
    }

    #"type": string
}
