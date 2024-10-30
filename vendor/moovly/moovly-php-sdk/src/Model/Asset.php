<?php

namespace Moovly\SDK\Model;

/**
 * Intermediate class to achieve an unified API towards the assets of an object.
 *
 * Class Asset
 *
 * @package Moovly\SDK\Model
 */
class Asset
{
    const TYPE_VIDEO = 'video';
    const TYPE_AUDIO = 'audio';
    const TYPE_SPRITE = 'sprite';

    /** @var string */
    private $type;

    /** @var string */
    private $version;

    /** @var float|null */
    private $scale;

    /** @var string */
    private $source;

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
     * @return Asset
     */
    public function setType(string $type): Asset
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the Version
     *
     * @return string
     */
    public function getVersion(): string
    {
        return $this->version;
    }

    /**
     * Sets the Version
     *
     * @param string $version
     *
     * @return Asset
     */
    public function setVersion(string $version): Asset
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Returns the Scale
     *
     * @return float|null
     */
    public function getScale(): ?float
    {
        return $this->scale;
    }

    /**
     * Sets the Scale
     *
     * @param float|null $scale
     *
     * @return Asset
     */
    public function setScale(?float $scale): Asset
    {
        $this->scale = $scale;

        return $this;
    }

    /**
     * Returns the Source
     *
     * @return string
     */
    public function getSource(): string
    {
        return $this->source;
    }

    /**
     * Sets the Source
     *
     * @param string $source
     *
     * @return Asset
     */
    public function setSource(string $source): Asset
    {
        $this->source = $source;

        return $this;
    }
}
