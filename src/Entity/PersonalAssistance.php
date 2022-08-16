<?php

namespace App\Entity;

use App\Repository\PersonalAssistanceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=PersonalAssistanceRepository::class)
 */
class PersonalAssistance
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("app_api_personal_assistance")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_personal_assistance")
     */
    private $type;

    /**
     * @ORM\ManyToMany(targetEntity=PersonalAssistanceService::class, mappedBy="personalAssistance")
     */
    private $personalAssistanceServices;

    public function __construct()
    {
        $this->personalAssistanceServices = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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
            $personalAssistanceService->addPersonalAssistance($this);
        }

        return $this;
    }

    public function removePersonalAssistanceService(PersonalAssistanceService $personalAssistanceService): self
    {
        if ($this->personalAssistanceServices->removeElement($personalAssistanceService)) {
            $personalAssistanceService->removePersonalAssistance($this);
        }

        return $this;
    }
}
