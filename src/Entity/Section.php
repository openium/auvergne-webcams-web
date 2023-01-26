<?php

namespace App\Entity;

use App\Constant\SectionImageName;
use App\Repository\SectionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\IdGenerator\UuidGenerator;

#[ORM\Entity(repositoryClass: SectionRepository::class)]
class Section
{
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'CUSTOM')]
    #[ORM\CustomIdGenerator(class: UuidGenerator::class)]
    #[ORM\Column(type: 'guid', length: 36)]
    protected ?string $id = null;

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

    #[ORM\OneToMany(mappedBy: 'section', targetEntity: Webcam::class)]
    private Collection $webcams;

    public function __construct()
    {
        $this->webcams = new ArrayCollection();
    }

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
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

    /**
     * @return Collection<int, Webcam>
     */
    public function getWebcams(): Collection
    {
        return $this->webcams;
    }

    public function addWebcam(Webcam $webcam): self
    {
        if (!$this->webcams->contains($webcam)) {
            $this->webcams->add($webcam);
            $webcam->setSection($this);
        }

        return $this;
    }

    public function removeWebcam(Webcam $webcam): self
    {
        if ($this->webcams->removeElement($webcam)) {
            // set the owning side to null (unless already changed)
            if ($webcam->getSection() === $this) {
                $webcam->setSection(null);
            }
        }

        return $this;
    }
}
