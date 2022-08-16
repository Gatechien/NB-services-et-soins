<?php

namespace App\Controller\Back;

use App\Entity\Recruitment;
use App\Form\RecruitmentType;
use App\Repository\RecruitmentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/back/recrutement")
 */
class RecruitmentController extends AbstractController
{
    /**
     * @Route("/", name="app_recruitment_index", methods={"GET"})
     */
    public function index(RecruitmentRepository $recruitmentRepository): Response
    {
        return $this->render('recruitment/index.html.twig', [
            'recruitments' => $recruitmentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_recruitment_new", methods={"GET", "POST"})
     */
    public function new(Request $request, RecruitmentRepository $recruitmentRepository): Response
    {
        $recruitment = new Recruitment();
        $form = $this->createForm(RecruitmentType::class, $recruitment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recruitmentRepository->add($recruitment, true);

            return $this->redirectToRoute('app_recruitment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recruitment/new.html.twig', [
            'recruitment' => $recruitment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_recruitment_show", methods={"GET"})
     */
    public function show(Recruitment $recruitment): Response
    {
        return $this->render('recruitment/show.html.twig', [
            'recruitment' => $recruitment,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_recruitment_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Recruitment $recruitment, RecruitmentRepository $recruitmentRepository): Response
    {
        $form = $this->createForm(RecruitmentType::class, $recruitment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $recruitmentRepository->add($recruitment, true);

            return $this->redirectToRoute('app_recruitment_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('recruitment/edit.html.twig', [
            'recruitment' => $recruitment,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_recruitment_delete", methods={"POST"})
     */
    public function delete(Request $request, Recruitment $recruitment, RecruitmentRepository $recruitmentRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$recruitment->getId(), $request->request->get('_token'))) {
            $recruitmentRepository->remove($recruitment, true);
        }

        return $this->redirectToRoute('app_recruitment_index', [], Response::HTTP_SEE_OTHER);
    }
}
