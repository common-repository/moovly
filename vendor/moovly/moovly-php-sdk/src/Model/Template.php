<?php

namespace Moovly\SDK\Model;

/**
 * Class Template
 *
 * @package Moovly\SDK\Model
 */
class Template
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var string|null */
    private $originalProjectId;

    /** @var Variable[] */
    private $variables;

    /** @var string|null */
    private $thumbnail;

    /** @var string|null */
    private $preview;

    /** @var array|null */
    private $quality;

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
     * @return Template
     */
    public function setId(string $id): Template
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the Name
     *
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * Sets the Name
     *
     * @param string $name
     *
     * @return Template
     */
    public function setName(string $name): Template
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the OriginalProjectId
     *
     * @return string|null
     */
    public function getOriginalProjectId(): ?string
    {
        return $this->originalProjectId;
    }

    /**
     * Sets the OriginalProjectId
     *
     * @param string|null $originalProjectId
     *
     * @return Template
     */
    public function setOriginalProjectId(?string $originalProjectId): Template
    {
        $this->originalProjectId = $originalProjectId;

        return $this;
    }

    /**
     * Returns the Variables
     *
     * @return Variable[]
     */
    public function getVariables(): array
    {
        return $this->variables;
    }

    /**
     * Sets the Variables
     *
     * @param Variable[] $variables
     *
     * @return Template
     */
    public function setVariables(array $variables): Template
    {
        $this->variables = $variables;

        return $this;
    }

    /**
     * Returns the Thumbnail
     *
     * @return string|null
     */
    public function getThumbnail(): ?string
    {
        return $this->thumbnail;
    }

    /**
     * Sets the Thumbnail
     *
     * @param string|null $thumbnail
     *
     * @return Template
     */
    public function setThumbnail(?string $thumbnail): Template
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Returns the Preview
     *
     * @return string|null
     */
    public function getPreview(): ?string
    {
        return $this->preview;
    }

    /**
     * Sets the Preview
     *
     * @param string|null $preview
     *
     * @return Template
     */
    public function setPreview(?string $preview): Template
    {
        $this->preview = $preview;

        return $this;
    }

    /**
     * Returns the quality
     *
     * @return array|null
     */
    public function getQuality(): ?array
    {
        return $this->quality;
    }

    /**
     * Sets the Quality
     *
     * @param array|null $quality
     *
     * @return Template
     */
    public function setQuality(?array $quality): Template
    {
        $this->quality = $quality;

        return $this;
    }
}
