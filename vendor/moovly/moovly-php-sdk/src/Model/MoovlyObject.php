<?php

namespace Moovly\SDK\Model;

/**
 * https://api-docs.services.moovly.com/docs/api/assets
 *
 * Class MoovlyObject
 *
 * @package Moovly\SDK\Model
 */
class MoovlyObject
{
    const TYPE_VIDEO = 'video';
    const TYPE_SOUND = 'sound';
    const TYPE_IMAGE = 'sprite';

    /** @var string */
    private $id;

    /** @var array */
    private $assets;

    /** @var string */
    private $type;

    /** @var string */
    private $label;

    /** @var string */
    private $description;

    /** @var string */
    private $thumbnailPath;

    /** @var array */
    private $tags;

    /** @var bool */
    private $alpha;

    /** @var bool */
    private $status;

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
     * @return MoovlyObject
     */
    public function setId(string $id): MoovlyObject
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the Assets
     *
     * @return array
     */
    public function getAssets(): array
    {
        return $this->assets;
    }

    /**
     * Sets the Assets
     *
     * @param array $assets
     *
     * @return MoovlyObject
     */
    public function setAssets(array $assets): MoovlyObject
    {
        $this->assets = $assets;

        return $this;
    }

    /**
     * Returns the Type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Sets the Type
     *
     * @param string $type
     *
     * @return MoovlyObject
     */
    public function setType(string $type): MoovlyObject
    {
        $this->type = $type;

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
     * @return MoovlyObject
     */
    public function setLabel(string $label): MoovlyObject
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Returns the Description
     *
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * Sets the Description
     *
     * @param string $description
     *
     * @return MoovlyObject
     */
    public function setDescription(string $description): MoovlyObject
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Returns the ThumbnailPath
     *
     * @return string
     */
    public function getThumbnailPath(): string
    {
        return $this->thumbnailPath;
    }

    /**
     * Sets the ThumbnailPath
     *
     * @param string $thumbnailPath
     *
     * @return MoovlyObject
     */
    public function setThumbnailPath(string $thumbnailPath): MoovlyObject
    {
        $this->thumbnailPath = $thumbnailPath;

        return $this;
    }

    /**
     * Returns the Tags
     *
     * @return array
     */
    public function getTags(): array
    {
        return $this->tags;
    }

    /**
     * Sets the Tags
     *
     * @param array $tags
     *
     * @return MoovlyObject
     */
    public function setTags(array $tags): MoovlyObject
    {
        $this->tags = $tags;

        return $this;
    }

    /**
     * Returns the isAlpha
     *
     * This field is very specific to video. This marks a video asset as requiring a browser to support video
     * with transparency.
     *
     * @return bool
     */
    public function isAlpha(): bool
    {
        return $this->alpha;
    }

    /**
     * Sets the IsAlpha
     *
     * @param bool $isAlpha
     *
     * @return MoovlyObject
     */
    public function setAlpha(bool $isAlpha): MoovlyObject
    {
        $this->alpha = $isAlpha;

        return $this;
    }

    /**
     * Returns the Status
     *
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * Sets the Status
     *
     * @param bool $status
     *
     * @return MoovlyObject
     */
    public function setStatus(bool $status): MoovlyObject
    {
        $this->status = $status;

        return $this;
    }
}
