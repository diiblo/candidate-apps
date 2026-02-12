<?php

namespace App\Entity;

use App\Enum\EventTypeEnum;
use App\Repository\ApplicationEventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicationEventRepository::class)]
class ApplicationEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::JSONB)]
    private mixed $payload = null;

    #[ORM\Column(enumType: EventTypeEnum::class)]
    private ?EventTypeEnum $eventType = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPayload(): mixed
    {
        return $this->payload;
    }

    public function setPayload(mixed $payload): static
    {
        $this->payload = $payload;

        return $this;
    }

    public function getEventType(): ?EventTypeEnum
    {
        return $this->eventType;
    }

    public function setEventType(EventTypeEnum $eventType): static
    {
        $this->eventType = $eventType;

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
}
