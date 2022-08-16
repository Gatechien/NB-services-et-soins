<?php

namespace App\Controller\Back;

use App\Entity\Frequency;
use App\Form\FrequencyType;
use App\Repository\FrequencyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/frequence")
 */
class FrequencyController extends AbstractController
{
    /**
     * @Route("/", name="app_frequency_index", methods={"GET"})
     */
    public function index(FrequencyRepository $frequencyRepository): Response
    {
        return $this->render('frequency/index.html.twig', [
            'frequencies' => $frequencyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_frequency_new", methods={"GET", "POST"})
     */
    public function new(Request $request, FrequencyRepository $frequencyRepository): Response
    {
        $frequency = new Frequency();
        $form = $this->createForm(FrequencyType::class, $frequency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $frequencyRepository->add($frequency, true);
    
            return $this->redirectToRoute('app_frequency_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('frequency/new.html.twig', [
            'frequency' => $frequency,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_frequency_show", methods={"GET"})
     */
    /*
    public function show(Frequency $frequency): Response
    {
        return $this->render('frequency/show.html.twig', [
            'frequency' => $frequency,
        ]);
    }
    */
    
    /**
     * @Route("/{id}/edit", name="app_frequency_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Frequency $frequency, FrequencyRepository $frequencyRepository): Response
    {
        $form = $this->createForm(FrequencyType::class, $frequency);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $frequencyRepository->add($frequency, true);

            return $this->redirectToRoute('app_frequency_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('frequency/edit.html.twig', [
            'frequency' => $frequency,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_frequency_delete", methods={"POST"})
     */
    public function delete(Request $request, Frequency $frequency, FrequencyRepository $frequencyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$frequency->getId(), $request->request->get('_token'))) {
            $frequencyRepository->remove($frequency, true);
        }

        return $this->redirectToRoute('app_frequency_index', [], Response::HTTP_SEE_OTHER);
    }
}
