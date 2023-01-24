<?php

namespace App\Entity;

use App\Constant\SectionImageName;
use App\Repository\SectionRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(unique: false, nullable: false, options: ["default" => 0])]
    private int $sortOrder = 0;

    #[ORM\Column(length: 255, unique: false, nullable: false)]
    private string $title = '';

    #[ORM\Column(unique: false, nullable: false, options: ["default" => 0.0])]
    private float $latitude = 0.0;

    #[ORM\Column(unique: false, nullable: false, options: ["default" => 0.0])]
    private float $longitude = 0.0;

    #[ORM\Column(length: 7, unique: false, nullable: false)]
    private ?string $color = "#FFFFFF";

    #[ORM\Column(length: 100, unique: false, nullable: false, options: ["default" => "mountain-landscape-1"])]
    private string $imageName = SectionImageName::MOUNTAIN_LANDSCAPE1;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSortOrder(): int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): self
    {
        $this->sortOrder = $sortOrder;
        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;
        return $this;
    }

    public function getLatitude(): float
    {
        return $this->latitude;
    }

    public function setLatitude(float $latitude): self
    {
        $this->latitude = $latitude;
        return $this;
    }

    public function getLongitude(): float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;
        return $this;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;
        return $this;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }

    public function setImageName(string $imageName): self
    {
        $this->imageName = $imageName;
        return $this;
    }
}
