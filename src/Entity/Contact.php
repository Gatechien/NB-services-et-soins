<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Persistence\ManagerRegistry;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Assert\NotBlank()
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $maiden_name;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $adress;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $zip_code;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $phone_number;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $content;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $preferency;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $created_at;

    /**
     * @ORM\OneToOne(targetEntity=AdministrativeDepartment::class, inversedBy="contact", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     * @Groups("app_api_contact")
     */
    private $administrativeDepartment;

    /**
     * @ORM\OneToOne(targetEntity=BabysittingService::class, inversedBy="contact", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact")
     */
    private $babysittingService;

    /**
     * @ORM\OneToOne(targetEntity=Housekeeping::class, inversedBy="contact", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups("app_api_contact_housekeeping")
     * @Groups("app_api_contact")
     */
    private $housekeeping;

    /**
     * @ORM\OneToOne(targetEntity=PersonalAssistanceService::class, inversedBy="contact", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_contact")
     */
    private $personalAssistanceService;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getMaidenName(): ?string
    {
        return $this->maiden_name;
    }

    public function setMaidenName(?string $maiden_name): self
    {
        $this->maiden_name = $maiden_name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zip_code;
    }

    public function setZipCode(int $zip_code): self
    {
        $this->zip_code = $zip_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(?string $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function isPreferency(): ?bool
    {
        return $this->preferency;
    }

    public function setPreferency(bool $preferency): self
    {
        $this->preferency = $preferency;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getAdministrativeDepartment(): ?AdministrativeDepartment
    {
        return $this->administrativeDepartment;
    }

    public function setAdministrativeDepartment(?AdministrativeDepartment $administrativeDepartment): self
    {
        $this->administrativeDepartment = $administrativeDepartment;

        return $this;
    }

    public function getBabysittingService(): ?BabysittingService
    {
        return $this->babysittingService;
    }

    public function setBabysittingService(?BabysittingService $babysittingService): self
    {
        $this->babysittingService = $babysittingService;

        return $this;
    }

    public function getHousekeeping(): ?Housekeeping
    {
        return $this->housekeeping;
    }

    public function setHousekeeping(?Housekeeping $housekeeping): self
    {
        $this->housekeeping = $housekeeping;

        return $this;
    }

    public function getPersonalAssistanceService(): ?PersonalAssistanceService
    {
        return $this->personalAssistanceService;
    }

    public function setPersonalAssistanceService(?PersonalAssistanceService $personalAssistanceService): self
    {
        $this->personalAssistanceService = $personalAssistanceService;

        return $this;
    }
}
