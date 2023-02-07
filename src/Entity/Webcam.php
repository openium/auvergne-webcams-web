<?php

namespace App\Entity;

use App\Constant\WebcamType;
use App\Repository\WebcamRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Ignore;

#[ORM\Entity(repositoryClass: WebcamRepository::class)]
class Webcam
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(unique: false, nullable: false, options: ["default" => 0])]
    private int $sortOrder = 0;

    #[ORM\Column(length: 100, options: ["default" => WebcamType::IMAGE])]
    private string $type = WebcamType::IMAGE;

    #[ORM\Column(length: 255)]
    private string $link = '';

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $linkHD = null;

    #[ORM\Column(length: 255)]
    private ?string $mapImageName = null;

    #[ORM\Column]
    private ?float $latitude = null;

    #[ORM\Column]
    private ?float $longitude = null;

    #[ORM\Column(nullable: false, options: ["default" => true])]
    #[Ignore]
    private bool $isEnabled = true;

    #[ORM\Column(type: Types::ARRAY)]
    private array $tags = [];

    #[ORM\ManyToOne(inversedBy: 'webcams')]
    #[ORM\JoinColumn(nullable: false)]
    #[Ignore]
    private ?Section $section = null;

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

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;
        return $this;
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

    public function getLink(): ?string
    {
        return $this->link;
    }

    public function setLink(string $link): self
    {
        $this->link = $link;
        return $this;
    }

    public function getLinkHD(): ?string
    {
        return $this->linkHD;
    }

    public function setLinkHD(?string $linkHD): self
    {
        $this->linkHD = $linkHD;
        return $this;
    }

    public function getMapImageName(): ?string
    {
        return $this->mapImageName;
    }

    public function setMapImageName(string $mapImageName): self
    {
        $this->mapImageName = $mapImageName;
        return $this;
    }

    public function getLatitude(): ?float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function isIsHidden(): ?bool
    {
        return $this->isEnabled;
    }

    public function setIsEnabled(bool $isEnabled): self
    {
        $this->isEnabled = $isEnabled;
        return $this;
    }

    public function getTags(): array
    {
        return $this->tags;
    }

    public function setTags(array $tags): self
    {
        $this->tags = $tags;
        return $this;
    }

    public function getSection(): ?Section
    {
        return $this->section;
    }

    public function setSection(?Section $section): self
    {
        $this->section = $section;
        return $this;
    }
}
