<?php

namespace App\Entity;

use App\Repository\HousekeepingRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=HousekeepingRepository::class)
 */
class Housekeeping
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
     * @Groups("app_api_contact_housekeeping")
     */
    private $number_hour;

    /**
     * @ORM\Column(type="string", length=2000, nullable=true)
     * @Groups("app_api_contact_housekeeping")
     */
    private $content;

    /**
     * @ORM\OneToOne(targetEntity=Contact::class, mappedBy="housekeeping", cascade={"persist", "remove"})
     */
    private $contact;

    /**
     * @ORM\ManyToMany(targetEntity=Frequency::class, inversedBy="housekeepings", cascade={"persist", "remove"})
     * @Groups("app_api_contact_housekeeping")
     */
    private $frequency;

    public function __construct()
    {
        $this->frequency = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function setContent(string $content): self
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
            $this->contact->setHousekeeping(null);
        }

        // set the owning side of the relation if necessary
        if ($contact !== null && $contact->getHousekeeping() !== $this) {
            $contact->setHousekeeping($this);
        }

        $this->contact = $contact;

        return $this;
    }

    /**
     * @return Collection<int, Frequency>
     */
    public function getFrequency(): Collection
    {
        return $this->frequency;
    }

    public function addFrequency(Frequency $frequency): self
    {
        if (!$this->frequency->contains($frequency)) {
            $this->frequency[] = $frequency;
        }

        return $this;
    }

    public function removeFrequency(Frequency $frequency): self
    {
        $this->frequency->removeElement($frequency);

        return $this;
    }
}
