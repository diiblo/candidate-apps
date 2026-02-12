<?php

namespace App\Entity;

use App\Enum\ApplicationStatusEnum;
use App\Repository\ApplicationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationRepository::class)]
class Application
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $companyName = null;

    #[ORM\Column(length: 255)]
    private ?string $positionTitle = null;

    #[ORM\Column(length: 255)]
    private ?string $jobUrl = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $notes = null;

    #[ORM\Column(type: Types::SIMPLE_ARRAY, enumType: ApplicationStatusEnum::class)]
    private array $status = [];

    #[ORM\ManyToOne(inversedBy: 'applications')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $owner = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    /**
     * @var Collection<int, NextAction>
     */
    #[ORM\OneToMany(targetEntity: NextAction::class, mappedBy: 'application')]
    private Collection $nextActions;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class, mappedBy: 'applications')]
    private Collection $tags;

    /**
     * @var Collection<int, Document>
     */
    #[ORM\ManyToMany(targetEntity: Document::class, mappedBy: 'applications')]
    private Collection $documents;

    public function __construct()
    {
        $this->nextActions = new ArrayCollection();
        $this->tags = new ArrayCollection();
        $this->documents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $companyName): static
    {
        $this->companyName = $companyName;

        return $this;
    }

    public function getPositionTitle(): ?string
    {
        return $this->positionTitle;
    }

    public function setPositionTitle(string $positionTitle): static
    {
        $this->positionTitle = $positionTitle;

        return $this;
    }

    public function getJobUrl(): ?string
    {
        return $this->jobUrl;
    }

    public function setJobUrl(string $jobUrl): static
    {
        $this->jobUrl = $jobUrl;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getNotes(): ?string
    {
        return $this->notes;
    }

    public function setNotes(?string $notes): static
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * @return ApplicationStatusEnum[]
     */
    public function getStatus(): array
    {
        return $this->status;
    }

    public function setStatus(array $status): static
    {
        $this->status = $status;

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

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, NextAction>
     */
    public function getNextActions(): Collection
    {
        return $this->nextActions;
    }

    public function addNextAction(NextAction $nextAction): static
    {
        if (!$this->nextActions->contains($nextAction)) {
            $this->nextActions->add($nextAction);
            $nextAction->setApplication($this);
        }

        return $this;
    }

    public function removeNextAction(NextAction $nextAction): static
    {
        if ($this->nextActions->removeElement($nextAction)) {
            // set the owning side to null (unless already changed)
            if ($nextAction->getApplication() === $this) {
                $nextAction->setApplication(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTags(): Collection
    {
        return $this->tags;
    }

    public function addTag(Tag $tag): static
    {
        if (!$this->tags->contains($tag)) {
            $this->tags->add($tag);
            $tag->addApplication($this);
        }

        return $this;
    }

    public function removeTag(Tag $tag): static
    {
        if ($this->tags->removeElement($tag)) {
            $tag->removeApplication($this);
        }

        return $this;
    }

    /**
     * @return Collection<int, Document>
     */
    public function getDocuments(): Collection
    {
        return $this->documents;
    }

    public function addDocument(Document $document): static
    {
        if (!$this->documents->contains($document)) {
            $this->documents->add($document);
            $document->addApplication($this);
        }

        return $this;
    }

    public function removeDocument(Document $document): static
    {
        if ($this->documents->removeElement($document)) {
            $document->removeApplication($this);
        }

        return $this;
    }
}
