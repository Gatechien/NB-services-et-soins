<?php

namespace App\Controller\Api;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use Doctrine\Persistence\ManagerRegistry;
use Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

/**
 * @Route("/api/contact", name="app_api_contact_")
 */
class ContactController extends ApiController
{
    /**
     * @Route("/", name="browse", methods={"GET"})
     */
    public function browse(ContactRepository $contactRepository): JsonResponse
    {
        $contacts = $contactRepository->findAll();

        return $this->json(
            $contacts,
            Response::HTTP_OK,
            [],
            ["groups" =>[
                "app_api_contact"
            ]]
        );
    }

    /**
     * @Route("/{id}", name="read", methods={"GET"})
     */
    public function read(Contact $contact = null): JsonResponse
    {
        if ($contact === null) {
            return $this->json404("le service n'a pas été trouvé");
        }

        if ($contact->getAdministrativeDepartment() !== null) {
            return $this->json(
                $contact,
                Response::HTTP_OK,
                [],
                ["groups" =>[
                    "app_api_contact_serviceAdministrativeDepartment"
                ]]
            );
        }

        if ($contact->getBabysittingService() !== null) {
            return $this->json(
                $contact,
                Response::HTTP_OK,
                [],
                ["groups" =>[
                    "app_api_contact_babysittingService"
                ]]
            );
        }

        if ($contact->getHousekeeping() !== null) {
            return $this->json(
                $contact,
                Response::HTTP_OK,
                [],
                ["groups" =>[
                    "app_api_contact_housekeeping"
                ]]
            );
        }

        if ($contact->getPersonalAssistanceService() !== null) {
            return $this->json(
                $contact,
                Response::HTTP_OK,
                [],
                ["groups" =>[
                    "app_api_contact_personalAssistanceService"
                ]]
            );
        } else {
            return $this->json(
                $contact,
                Response::HTTP_OK,
                [],
                ["groups" =>[
                    "app_api_contact"
                ]]
            );
        }
    }

    /**
     * @Route("",name="add", methods={"POST"})
     *
     * @param Request $request
     * @param ManagerRegistry $manager
     * @param SerializerInterface $serializerInterface
     * @param ValidatorInterface $validator
     * @return JsonResponse
     */
    public function add(Request $request, ManagerRegistry $manager, SerializerInterface $serializerInterface, ValidatorInterface $validator,MailerInterface $mailer): JsonResponse
    {
        $jsonContent = $request->getContent();

        try {
            $new = $serializerInterface->deserialize($jsonContent, Contact::class, "json");
        } catch (Exception $e) {
            return $this->json($e->getMessage(), Response::HTTP_BAD_REQUEST);
        }

        $errors = $validator->validate($new);
        
        if (count($errors)> 0) {
            return $this->json422($errors, Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $em = $manager->getManager();
        $em->persist($new);
        $em->flush();
          //email
          $email = (new Email())
          ->from('hello@example.com')
          ->to('you@example.com')
          ->subject('formulaire reçus')
          ->text('formulaire reçus')
          ->html('<p>formulaire reçus</p>');
          $mailer->send($email);

        if ($new->getAdministrativeDepartment() !== null) {
            return $this->json(
                $new,
                Response::HTTP_CREATED,
                [
                    'Location' => $this->generateUrl('app_api_contact_read', ['id' => $new->getId()])
                ],
                [
                    "groups" => "app_api_contact_serviceAdministrativeDepartment"
                ]
            );
        }

        if ($new->getBabysittingService() !== null) {
            return $this->json(
                $new,
                Response::HTTP_CREATED,
                [
                    'Location' => $this->generateUrl('app_api_contact_read', ['id' => $new->getId()])
                ],
                [
                    "groups" => "app_api_contact_babysittingService"
                ]
            );
        }

        if ($new->getHousekeeping() !== null) {
            return $this->json(
                $new,
                Response::HTTP_CREATED,
                [
                    'Location' => $this->generateUrl('app_api_contact_read', ['id' => $new->getId()])
                ],
                [
                    "groups" => "app_api_contact_housekeeping"
                ]
            );
        }

        if ($new->getPersonalAssistanceService() !== null) {
            return $this->json(
                $new,
                Response::HTTP_CREATED,
                [
                    'Location' => $this->generateUrl('app_api_contact_read', ['id' => $new->getId()])
                ],
                [
                    "groups" => "app_api_contact_personalAssistanceService"
                ]
            );
        }
    }

    #Administrative Department Service
    #"firstname": string
    #"lastname": string
    #"maiden_name": string
    #"mail": string
    #"adress": string
    #"zip_code": int
    #"city": string
    #"phone_number": string
    #"content": string
    #"preferency": true / false
    #"created_at": datetime
    #"administrativeDepartment": {
        #"firstname": string
        #"lastname": string
        #"mail": string
        #"adress": string
        #"city": string
        #"content": string
        #"firstname_of_deceased": string
        #"lastname_of_deceased": string
        #"maiden_name_of_deceased": string
        #"adress_deceased": string
        #"zip_code_of_deceased": int
        #"city_of_deceased": string
        #"date_of_birth": datetime
        #"place_of_birth": string
        #"date_of_deceased": datetime
        #"place_of_deceased": string
        #"postal_code": int
    #}

    #Babysitting Service
    #"firstname": string
    #"lastname": string
    #"maiden_name": string
    #"mail": string
    #"adress": string
    #"zip_code": int
    #"city": string
    #"phone_number": string
    #"content": string
    #"preferency": true / false
    #"created_at": datetime
    #"babysittingService": {
        #"content": string
        #"days": [id,id]
        #"intervention": [id,id]
        #"number_child": int
        #"number_hour": int
    #}

    #Housekeeping Service
    #"firstname": string
    #"lastname": string
    #"maiden_name": string
    #"mail": string
    #"adress": string
    #"zip_code": int
    #"city": string
    #"phone_number": string
    #"content": string
    #"preferency": true / false
    #"created_at": datetime
    #"housekeeping": {
        #"content": string
        #"frequency": [id]
        #"number_hour": int
    #}

    #Personal Assitance Service
    #"firstname": string
    #"lastname": string
    #"maiden_name": string
    #"mail": string
    #"adress": string
    #"zip_code": int
    #"city": string
    #"phone_number": string
    #"content": string
    #"preferency": true / false
    #"created_at": datetime
    #"personalAssistanceService": {
        #"content": string
        #"organization": string
        #"personalAssistance": [id]
        #"intervention": [id,id]
        #"financial_help": true
        #"number_hour": int
    #}
}