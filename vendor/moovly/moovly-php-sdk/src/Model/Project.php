<?php

namespace Moovly\SDK\Model;

/**
 * Class Project
 * @package Moovly\SDK\Model
 */
class Project
{
    /** @var string */
    private $id;

    /** @var string */
    private $label;

    /** @var string|null */
    private $description;

    /** @var string|null */
    private $thumbnailPath;

    /** @var Render[] */
    private $renders;

    /** @var float */
    private $duration;

    /** @var bool */
    private $archived;

    /** @var bool */
    private $pending;

    /** @var \DateTimeImmutable */
    private $createdAt;

    /** @var ?\DateTimeImmutable */
    private $updatedAt;

    /** @var string */
    private $createdBy;

    /** @var array|null */
    private $stage = null;

    /**
     * Returns the Id
     *
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * Sets the Id
     *
     * @param string $id
     *
     * @return Project
     */
    public function setId(string $id): Project
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the Label
     *
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Sets the Label
     *
     * @param string $label
     *
     * @return Project
     */
    public function setLabel(string $label): Project
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Returns the Description
     *
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * Sets the Description
     *
     * @param string|null $description
     *
     * @return Project
     */
    public function setDescription(?string $description): Project
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the ThumbnailPath
     *
     * @return string|null
     */
    public function getThumbnailPath(): ?string
    {
        return $this->thumbnailPath;
    }

    /**
     * Sets the ThumbnailPath
     *
     * @param string|null $thumbnailPath
     *
     * @return Project
     */
    public function setThumbnailPath(?string $thumbnailPath): Project
    {
        $this->thumbnailPath = $thumbnailPath;

        return $this;
    }

    /**
     * Returns the Renders
     *
     * @return Render[]
     */
    public function getRenders(): array
    {
        return $this->renders;
    }

    /**
     * Sets the Renders
     *
     * @param Render[] $renders
     *
     * @return Project
     */
    public function setRenders(array $renders): Project
    {
        $this->renders = $renders;

        return $this;
    }

    /**
     * Returns the Duration
     *
     * @return float
     */
    public function getDuration(): float
    {
        return $this->duration;
    }

    /**
     * Sets the Duration
     *
     * @param float $duration
     *
     * @return Project
     */
    public function setDuration(float $duration): Project
    {
        $this->duration = (float) $duration;

        return $this;
    }

    /**
     * Returns the Archived
     *
     * @return bool
     */
    public function isArchived(): bool
    {
        return $this->archived;
    }

    /**
     * Sets the Archived
     *
     * @param bool $archived
     *
     * @return Project
     */
    public function setArchived(bool $archived): Project
    {
        $this->archived = $archived;

        return $this;
    }

    /**
     * Returns the Pending.
     *
     * When a project is flagged as pending, you cannot do any operations towards it.
     *
     * @return bool
     */
    public function isPending(): bool
    {
        return $this->pending;
    }

    /**
     * Sets the Pending
     *
     * @param bool $pending
     *
     * @return Project
     */
    public function setPending(bool $pending): Project
    {
        $this->pending = $pending;

        return $this;
    }

    /**
     * Returns the CreatedAt
     *
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * Sets the CreatedAt
     *
     * @param \DateTimeImmutable $createdAt
     *
     * @return Project
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): Project
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Returns the UpdatedAt
     *
     * @return \DateTimeImmutable|null
     */
    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    /**
     * Sets the UpdatedAt
     *
     * @param \DateTimeImmutable|null $updatedAt
     *
     * @return Project
     */
    public function setUpdatedAt(?\DateTimeImmutable $updatedAt): Project
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Returns the CreatedBy
     *
     * @return string
     */
    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    /**
     * Sets the CreatedBy
     *
     * @param string $createdBy
     *
     * @return Project
     */
    public function setCreatedBy(string $createdBy): Project
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Returns the stage
     *
     * @return array
     */
    public function getStage(): ?array
    {
        return $this->stage;
    }

    /**
     * Sets the CreatedBy
     *
     * @param string $createdBy
     *
     * @return Project
     */
    public function setStage(array $stage): Project
    {
        $this->stage = $stage;

        return $this;
    }
}
