<?php

namespace App\Controller\Back;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
/**
 * @Route("/back/contact")
 */
class ContactController extends AbstractController
{
    /**
     * @Route("/", name="app_contact_index", methods={"GET"})
     */
    public function index(ContactRepository $contactRepository): Response
    {
        return $this->render('contact/index.html.twig', [
            'contacts' => $contactRepository->findAll(),
        ]);
    }

    /**
     * @Route("/babysitting/service", name="app_contact_babysitting", methods={"GET"})
     */
    public function contactByServiceBabysitting(ContactRepository $contactRepository): Response
    {
        return $this->render('contact/index_find_by_service.html.twig', [
            'contacts' => $contactRepository->findAllContactByBabysittingServiceSQL(),
        ]);
    }

    /**
     * @Route("/aide-menager/service", name="app_contact_housekeeping", methods={"GET"})
     */
    public function contactByHousekeeping(ContactRepository $contactRepository): Response
    {
        return $this->render('/contact/index_find_by_service.html.twig', [
            'contacts' => $contactRepository->findAllContactByHousekeepingServiceSQL(),
        ]);
    }

    /**
     * @Route("/aide-personne/service", name="app_contact_personalAssistance", methods={"GET"})
     */
    public function contactByPersonalAssistance(ContactRepository $contactRepository): Response
    {
        return $this->render('/contact/index_find_by_service.html.twig', [
            'contacts' => $contactRepository->findAllContactByPersonalAssistanceServiceSQL(),
        ]);
    }

    /**
     * @Route("/administratif/service", name="app_contact_administrativeDepartment", methods={"GET"})
     */
    public function contactByAdministrativeDepartment(ContactRepository $contactRepository): Response
    {
        return $this->render('/contact/index_find_by_service.html.twig', [
            'contacts' => $contactRepository->findAllContactByAdministrativeDepartmentServiceSQL(),
        ]);
    }

    /**
     * @Route("/new", name="app_contact_new", methods={"GET", "POST"})
     */
    /*
    public function new(Request $request, ContactRepository $contactRepository,MailerInterface $mailer): Response
    {
        $contact = new Contact();
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->add($contact, true);
            
            return $this->redirectToRoute('app_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/new.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }
    */

    /**
     * @Route("/{id}", name="app_contact_show", methods={"GET"})
     */
    public function show(Contact $contact): Response
    {   
        $babysittingService = $contact->getBabysittingService();
        $personalAssistanceService = $contact->getPersonalAssistanceService();
        $housekeepingService = $contact->getHousekeeping();
        $administrativeDepartmentService = $contact->getAdministrativeDepartment();
        return $this->render('contact/show.html.twig', [
            'contact' => $contact,
            'babysittingService' => $babysittingService,
            'personalAssistanceService' => $personalAssistanceService,
            'housekeepingService' => $housekeepingService,
            'administrativeDepartmentService' => $administrativeDepartmentService
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_contact_edit", methods={"GET", "POST"})
     */
    /*
    public function edit(Request $request, Contact $contact, ContactRepository $contactRepository): Response
    {
        $form = $this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $contactRepository->add($contact, true);

            return $this->redirectToRoute('app_contact_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('contact/edit.html.twig', [
            'contact' => $contact,
            'form' => $form,
        ]);
    }
    */

    /**
     * @Route("/{id}", name="app_contact_delete", methods={"POST"})
     */
    public function delete(Request $request, Contact $contact, ContactRepository $contactRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$contact->getId(), $request->request->get('_token'))) {
            $contactRepository->remove($contact, true);
        }

        return $this->redirectToRoute('app_contact_index', [], Response::HTTP_SEE_OTHER);
    }
}
