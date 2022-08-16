<?php

namespace App\Controller\Back;

use App\Entity\PersonalAssistance;
use App\Form\PersonalAssistanceType;
use App\Repository\PersonalAssistanceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/assistance-personne")
 */
class PersonalAssistanceController extends AbstractController
{
    /**
     * @Route("/", name="app_personal_assistance_index", methods={"GET"})
     */
    public function index(PersonalAssistanceRepository $personalAssistanceRepository): Response
    {
        return $this->render('personal_assistance/index.html.twig', [
            'personal_assistances' => $personalAssistanceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_personal_assistance_new", methods={"GET", "POST"})
     */
    public function new(Request $request, PersonalAssistanceRepository $personalAssistanceRepository): Response
    {
        $personalAssistance = new PersonalAssistance();
        $form = $this->createForm(PersonalAssistanceType::class, $personalAssistance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personalAssistanceRepository->add($personalAssistance, true);

            return $this->redirectToRoute('app_personal_assistance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personal_assistance/new.html.twig', [
            'personal_assistance' => $personalAssistance,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_personal_assistance_show", methods={"GET"})
     */
    /*
    public function show(PersonalAssistance $personalAssistance): Response
    {
        return $this->render('personal_assistance/show.html.twig', [
            'personal_assistance' => $personalAssistance,
        ]);
    }
    */

    /**
     * @Route("/{id}/edit", name="app_personal_assistance_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, PersonalAssistance $personalAssistance, PersonalAssistanceRepository $personalAssistanceRepository): Response
    {
        $form = $this->createForm(PersonalAssistanceType::class, $personalAssistance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $personalAssistanceRepository->add($personalAssistance, true);

            return $this->redirectToRoute('app_personal_assistance_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('personal_assistance/edit.html.twig', [
            'personal_assistance' => $personalAssistance,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_personal_assistance_delete", methods={"POST"})
     */
    public function delete(Request $request, PersonalAssistance $personalAssistance, PersonalAssistanceRepository $personalAssistanceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$personalAssistance->getId(), $request->request->get('_token'))) {
            $personalAssistanceRepository->remove($personalAssistance, true);
        }

        return $this->redirectToRoute('app_personal_assistance_index', [], Response::HTTP_SEE_OTHER);
    }
}
