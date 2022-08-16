<?php

namespace App\Entity;

use App\Repository\AdministrativeDepartmentRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AdministrativeDepartmentRepository::class)
 */
class AdministrativeDepartment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $firstname_of_deceased;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $lastname_of_deceased;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $maiden_name_of_deceased;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $adress_deceased;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $zip_code_of_deceased;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $city_of_deceased;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $date_of_birth;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $place_of_birth;

    /**
     * @ORM\Column(type="date")
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $date_of_deceased;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $place_of_deceased;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $firstname;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $lastname;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $adress;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $postal_code;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     * @Groups("app_api_contact_serviceAdministrativeDepartment")
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, mappedBy="administrativeDepartment", cascade={"persist", "remove"}, orphanRemoval=true)
     * @Groups("app_api_serviceAdministrativeDepartment")
     */
    private $contact;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstnameOfDeceased(): ?string
    {
        return $this->firstname_of_deceased;
    }

    public function setFirstnameOfDeceased(string $firstname_of_deceased): self
    {
        $this->firstname_of_deceased = $firstname_of_deceased;

        return $this;
    }

    public function getLastnameOfDeceased(): ?string
    {
        return $this->lastname_of_deceased;
    }

    public function setLastnameOfDeceased(string $lastname_of_deceased): self
    {
        $this->lastname_of_deceased = $lastname_of_deceased;

        return $this;
    }

    public function getMaidenNameOfDeceased(): ?string
    {
        return $this->maiden_name_of_deceased;
    }

    public function setMaidenNameOfDeceased(?string $maiden_name_of_deceased): self
    {
        $this->maiden_name_of_deceased = $maiden_name_of_deceased;

        return $this;
    }

    public function getAdressDeceased(): ?string
    {
        return $this->adress_deceased;
    }

    public function setAdressDeceased(string $adress_deceased): self
    {
        $this->adress_deceased = $adress_deceased;

        return $this;
    }

    public function getZipCodeOfDeceased(): ?int
    {
        return $this->zip_code_of_deceased;
    }

    public function setZipCodeOfDeceased(int $zip_code_of_deceased): self
    {
        $this->zip_code_of_deceased = $zip_code_of_deceased;

        return $this;
    }

    public function getCityOfDeceased(): ?string
    {
        return $this->city_of_deceased;
    }

    public function setCityOfDeceased(string $city_of_deceased): self
    {
        $this->city_of_deceased = $city_of_deceased;

        return $this;
    }

    public function getDateOfBirth(): ?\DateTimeInterface
    {
        return $this->date_of_birth;
    }

    public function setDateOfBirth(\DateTimeInterface $date_of_birth): self
    {
        $this->date_of_birth = $date_of_birth;

        return $this;
    }

    public function getPlaceOfBirth(): ?string
    {
        return $this->place_of_birth;
    }

    public function setPlaceOfBirth(string $place_of_birth): self
    {
        $this->place_of_birth = $place_of_birth;

        return $this;
    }

    public function getDateOfDeceased(): ?\DateTimeInterface
    {
        return $this->date_of_deceased;
    }

    public function setDateOfDeceased(\DateTimeInterface $date_of_deceased): self
    {
        $this->date_of_deceased = $date_of_deceased;

        return $this;
    }

    public function getPlaceOfDeceased(): ?string
    {
        return $this->place_of_deceased;
    }

    public function setPlaceOfDeceased(string $place_of_deceased): self
    {
        $this->place_of_deceased = $place_of_deceased;

        return $this;
    }

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(?string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(?string $lastname): self
    {
        $this->lastname = $lastname;

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

    public function setAdress(?string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getPostalCode(): ?int
    {
        return $this->postal_code;
    }

    public function setPostalCode(?int $postal_code): self
    {
        $this->postal_code = $postal_code;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

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

    public function getContact(): ?Contact
    {
        return $this->contact;
    }

    public function setContact(?Contact $contact): self
    {
        // unset the owning side of the relation if necessary
        if ($contact === null && $this->contact !== null) {
            $this->contact->setAdministrativeDepartment(null);
        }

        // set the owning side of the relation if necessary
        if ($contact !== null && $contact->getAdministrativeDepartment() !== $this) {
            $contact->setAdministrativeDepartment($this);
        }

        $this->contact = $contact;

        return $this;
    }
}
