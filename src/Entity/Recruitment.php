<?php

namespace App\Entity;

use App\Repository\RecruitmentRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=RecruitmentRepository::class)
 */
class Recruitment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("app_api_recruitment")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank()
     * @Groups("app_api_recruitment")
     */
    private $title;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("app_api_recruitment")
     */
    private $visibility;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $published_on;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank()
     * @Groups("app_api_recruitment")
     */
    private $title_description;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Groups("app_api_recruitment")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $title_description2;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $description2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $title_description3;

    /**
     * @ORM\Column(type="text", nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $description3;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank()
     * @Groups("app_api_recruitment")
     */
    private $we_search;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $avantage;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $licence_requeried;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $experience_requeried;

    /**
     * @ORM\Column(type="boolean")
     * @Groups("app_api_recruitment")
     */
    private $drive_license;

    /**
     * @ORM\Column(type="string", length=50)
     * @Assert\NotBlank()
     * @Groups("app_api_recruitment")
     */
    private $type_contrat;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $salary;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $deplacement_info;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $day_off;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $opportunity;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     * @Groups("app_api_recruitment")
     */
    private $working_hour;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function isVisibility(): ?bool
    {
        return $this->visibility;
    }

    public function setVisibility(bool $visibility): self
    {
        $this->visibility = $visibility;

        return $this;
    }

    public function getPublishedOn(): ?\DateTimeInterface
    {
        return $this->published_on;
    }

    public function setPublishedOn(?\DateTimeInterface $published_on): self
    {
        $this->published_on = $published_on;

        return $this;
    }

    public function getTitleDescription(): ?string
    {
        return $this->title_description;
    }

    public function setTitleDescription(string $title_description): self
    {
        $this->title_description = $title_description;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getTitleDescription2(): ?string
    {
        return $this->title_description2;
    }

    public function setTitleDescription2(?string $title_description2): self
    {
        $this->title_description2 = $title_description2;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getTitleDescription3(): ?string
    {
        return $this->title_description3;
    }

    public function setTitleDescription3(?string $title_description3): self
    {
        $this->title_description3 = $title_description3;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(?string $description3): self
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getWeSearch(): ?string
    {
        return $this->we_search;
    }

    public function setWeSearch(string $we_search): self
    {
        $this->we_search = $we_search;

        return $this;
    }

    public function getAvantage(): ?string
    {
        return $this->avantage;
    }

    public function setAvantage(?string $avantage): self
    {
        $this->avantage = $avantage;

        return $this;
    }

    public function getLicenceRequeried(): ?string
    {
        return $this->licence_requeried;
    }

    public function setLicenceRequeried(?string $licence_requeried): self
    {
        $this->licence_requeried = $licence_requeried;

        return $this;
    }

    public function getExperienceRequeried(): ?string
    {
        return $this->experience_requeried;
    }

    public function setExperienceRequeried(?string $experience_requeried): self
    {
        $this->experience_requeried = $experience_requeried;

        return $this;
    }

    public function isDriveLicense(): ?bool
    {
        return $this->drive_license;
    }

    public function setDriveLicense(bool $drive_license): self
    {
        $this->drive_license = $drive_license;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->type_contrat;
    }

    public function setTypeContrat(string $type_contrat): self
    {
        $this->type_contrat = $type_contrat;

        return $this;
    }

    public function getSalary(): ?string
    {
        return $this->salary;
    }

    public function setSalary(?string $salary): self
    {
        $this->salary = $salary;

        return $this;
    }

    public function getDeplacementInfo(): ?string
    {
        return $this->deplacement_info;
    }

    public function setDeplacementInfo(?string $deplacement_info): self
    {
        $this->deplacement_info = $deplacement_info;

        return $this;
    }

    public function getDayOff(): ?string
    {
        return $this->day_off;
    }

    public function setDayOff(?string $day_off): self
    {
        $this->day_off = $day_off;

        return $this;
    }

    public function getOpportunity(): ?string
    {
        return $this->opportunity;
    }

    public function setOpportunity(?string $opportunity): self
    {
        $this->opportunity = $opportunity;

        return $this;
    }

    public function getWorkingHour(): ?string
    {
        return $this->working_hour;
    }

    public function setWorkingHour(?string $working_hour): self
    {
        $this->working_hour = $working_hour;

        return $this;
    }
}
