<?php

namespace App\Entity;

use App\Repository\BabysittingServiceRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=BabysittingServiceRepository::class)
 */
class BabysittingService
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Groups("app_api_contact_babysittingService")
     */
    private $number_child;

    /**
     * @ORM\Column(type="integer")
     * @Assert\NotBlank()
     * @Groups("app_api_contact_babysittingService")
     */
    private $number_hour;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * @Groups("app_api_contact_babysittingService")
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, mappedBy="babysittingService", cascade={"persist", "remove"})
     */
    private $contact;

    /**
     * @ORM\ManyToMany(targetEntity=Days::class, inversedBy="babysittingServices", cascade={"persist", "remove"})
     * @Groups("app_api_contact_babysittingService")
     */
    private $days;

    /**
     * @ORM\ManyToMany(targetEntity=Intervention::class, inversedBy="babysittingServices", cascade={"persist", "remove"})
     * @Groups("app_api_contact_babysittingService")
     */
    private $intervention;

    public function __construct()
    {
        $this->days = new ArrayCollection();
        $this->intervention = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumberChild(): ?int
    {
        return $this->number_child;
    }

    public function setNumberChild(int $number_child): self
    {
        $this->number_child = $number_child;

        return $this;
    }

    public function getNumberHour(): ?int
    {
        return $this->number_hour;
    }

    public function setNumberHour(int $number_hour): self
    {
        $this->number_hour = $number_hour;

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
            $this->contact->setBabysittingService(null);
        }

        // set the owning side of the relation if necessary
        if ($contact !== null && $contact->getBabysittingService() !== $this) {
            $contact->setBabysittingService($this);
        }

        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection<int, Days>
     */
    public function getDays(): Collection
    {
        return $this->days;
    }

    public function addDay(Days $day): self
    {
        if (!$this->days->contains($day)) {
            $this->days[] = $day;
        }

        return $this;
    }

    public function removeDay(Days $day): self
    {
        $this->days->removeElement($day);

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