<?php

namespace App\Entity;

use App\Repository\PersonalAssistanceServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonalAssistanceServiceRepository::class)
 */
class PersonalAssistanceService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("app_api_contact_personalAssistanceService")
     */
    private $financial_help;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * @Groups("app_api_contact_personalAssistanceService")
     */
    private $content;

    /**
     * @ORM\Column(type="string", length=250, nullable=true)
     * @Groups("app_api_contact_personalAssistanceService")
     */
    private $organization;

    /**
     * @ORM\Column(type="integer", nullable=true)
     * @Groups("app_api_contact_personalAssistanceService")
     */
    private $number_hour;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, mappedBy="personalAssistanceService", cascade={"persist", "remove"})
     */
    private $contact;

    /**
     * @ORM\ManyToMany(targetEntity=PersonalAssistance::class, inversedBy="personalAssistanceServices", cascade={"persist", "remove"})
     * @Groups("app_api_contact_personalAssistanceService")
     */
    private $personalAssistance;

    /**
     * @ORM\ManyToMany(targetEntity=Intervention::class, inversedBy="personalAssistanceServices", cascade={"persist", "remove"})
     * @Groups("app_api_contact_personalAssistanceService")
     */
    private $intervention;

    public function __construct()
    {
        $this->personalAssistance = new ArrayCollection();
        $this->intervention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isFinancialHelp(): ?bool
    {
        return $this->financial_help;
    }

    public function setFinancialHelp(bool $financial_help): self
    {
        $this->financial_help = $financial_help;

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

    public function getOrganization(): ?string
    {
        return $this->organization;
    }

    public function setOrganization(?string $organization): self
    {
        $this->organization = $organization;

        return $this;
    }

    public function getNumberHour(): ?int
    {
        return $this->number_hour;
    }

    public function setNumberHour(?int $number_hour): self
    {
        $this->number_hour = $number_hour;

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
            $this->contact->setPersonalAssistanceService(null);
        }

        // set the owning side of the relation if necessary
        if ($contact !== null && $contact->getPersonalAssistanceService() !== $this) {
            $contact->setPersonalAssistanceService($this);
        }

        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection<int, PersonalAssistance>
     */
    public function getPersonalAssistance(): Collection
    {
        return $this->personalAssistance;
    }

    public function addPersonalAssistance(PersonalAssistance $personalAssistance): self
    {
        if (!$this->personalAssistance->contains($personalAssistance)) {
            $this->personalAssistance[] = $personalAssistance;
        }

        return $this;
    }

    public function removePersonalAssistance(PersonalAssistance $personalAssistance): self
    {
        $this->personalAssistance->removeElement($personalAssistance);

        return $this;
    }

    /**
     * @return Collection<int, Intervention>
     */
    public function getIntervention(): Collection
    {
        return $this->intervention;
    }

    public function addIntervention(Intervention $intervention): self
    {
        if (!$this->intervention->contains($intervention)) {
            $this->intervention[] = $intervention;
        }

        return $this;
    }

    public function removeIntervention(Intervention $intervention): self
    {
        $this->intervention->removeElement($intervention);

        return $this;
    }
}
