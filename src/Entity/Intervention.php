<?php

namespace App\Entity;

use App\Repository\InterventionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=InterventionRepository::class)
 */
class Intervention
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("app_api_intervention")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_contact_babysittingService")
     * @Groups("app_api_contact_personalAssistanceService")
     * @Groups("app_api_intervention")
     */
    private $moment;

    /**
     * @ORM\ManyToMany(targetEntity=BabysittingService::class, mappedBy="intervention")
     */
    private $babysittingServices;

    /**
     * @ORM\ManyToMany(targetEntity=PersonalAssistanceService::class, mappedBy="intervention")
     */
    private $personalAssistanceServices;

    public function __construct()
    {
        $this->babysittingServices = new ArrayCollection();
        $this->personalAssistanceServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMoment(): ?string
    {
        return $this->moment;
    }

    public function setMoment(string $moment): self
    {
        $this->moment = $moment;

        return $this;
    }

    /**
     * @return Collection<int, BabysittingService>
     */
    public function getBabysittingServices(): Collection
    {
        return $this->babysittingServices;
    }

    public function addBabysittingService(BabysittingService $babysittingService): self
    {
        if (!$this->babysittingServices->contains($babysittingService)) {
            $this->babysittingServices[] = $babysittingService;
            $babysittingService->addIntervention($this);
        }

        return $this;
    }

    public function removeBabysittingService(BabysittingService $babysittingService): self
    {
        if ($this->babysittingServices->removeElement($babysittingService)) {
            $babysittingService->removeIntervention($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, PersonalAssistanceService>
     */
    public function getPersonalAssistanceServices(): Collection
    {
        return $this->personalAssistanceServices;
    }

    public function addPersonalAssistanceService(PersonalAssistanceService $personalAssistanceService): self
    {
        if (!$this->personalAssistanceServices->contains($personalAssistanceService)) {
            $this->personalAssistanceServices[] = $personalAssistanceService;
            $personalAssistanceService->addIntervention($this);
        }

        return $this;
    }

    public function removePersonalAssistanceService(PersonalAssistanceService $personalAssistanceService): self
    {
        if ($this->personalAssistanceServices->removeElement($personalAssistanceService)) {
            $personalAssistanceService->removeIntervention($this);
        }

        return $this;
    }
}
