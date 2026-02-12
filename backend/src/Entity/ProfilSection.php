<?php

namespace App\Entity;

use App\Enum\SectionTypeEnum;
use App\Repository\ProfilSectionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfilSectionRepository::class)]
class ProfilSection
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::JSONB)]
    private mixed $content = null;

    #[ORM\Column]
    private ?int $sortOrder = null;

    #[ORM\Column(enumType: SectionTypeEnum::class)]
    private ?SectionTypeEnum $sectionType = null;

    #[ORM\ManyToOne(inversedBy: 'profilSections')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContent(): mixed
    {
        return $this->content;
    }

    public function setContent(mixed $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function getSortOrder(): ?int
    {
        return $this->sortOrder;
    }

    public function setSortOrder(int $sortOrder): static
    {
        $this->sortOrder = $sortOrder;

        return $this;
    }

    public function getSectionType(): ?SectionTypeEnum
    {
        return $this->sectionType;
    }

    public function setSectionType(SectionTypeEnum $sectionType): static
    {
        $this->sectionType = $sectionType;

        return $this;
    }

    public function getOwner(): ?User
    {
        return $this->owner;
    }

    public function setOwner(?User $owner): static
    {
        $this->owner = $owner;

        return $this;
    }
}
