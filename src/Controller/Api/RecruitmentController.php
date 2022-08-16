<?php

namespace App\Controller\Api;

use App\Entity\Recruitment;
use App\Repository\RecruitmentRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/api/recruitment", name="app_api_recruitment")
 */
class RecruitmentController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(RecruitmentRepository $recruitmentRepository ): JsonResponse
    {
        $recruitments = $recruitmentRepository->findAll();

        return $this->json(
            $recruitments,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_recruitment"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(Recruitment $recruitment = null): JsonResponse
    {
        if ($recruitment === null) {
            return $this->json404("l'annonce' n'a pas été trouvé");
        }

        return $this->json(
            $recruitment,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_recruitment"
            ]]
        );
    }

    #"title": string
    #"visibility": true / false
    #"published_on": datetime
    #"title_description": string
    #"description": string
    #"title_description2": string
    #"description2": string
    #"title_description3": string
    #"description3": string
    #"we_search": string
    #"avantage": string
    #"licence_requeried": string
    #"experience_requeried": string
    #"drive_license": true / false
    #"type_contrat": string
    #"salary": string
    #"deplacement_info": string
    #"day_off": string
    #"opportunity": string
    #"working_hour": string
}

