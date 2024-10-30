<?php

namespace Moovly\SDK\Model;

/**
 * Class Variable
 *
 * @package Moovly\SDK\Model
 */
class Variable
{
    const TYPE_TEXT = 'text';
    const TYPE_IMAGE = 'image';
    const TYPE_VIDEO = 'video';

    /** @var string */
    private $id;

    /** @var string */
    private $name;

    /** @var int */
    private $weight;

    /** @var string */
    private $type;

    /** @var array[] */
    private $requirements;

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
     * @return Variable
     */
    public function setId(string $id): Variable
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
     * @return Variable
     */
    public function setName(string $name): Variable
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Returns the Weight
     *
     * @return int
     */
    public function getWeight(): int
    {
        return $this->weight;
    }

    /**
     * Sets the Weight
     *
     * @param int $weight
     *
     * @return Variable
     */
    public function setWeight(int $weight): Variable
    {
        $this->weight = $weight;

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
     * @return Variable
     */
    public function setType(string $type): Variable
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Returns the Requirements
     *
     * @return array[]
     */
    public function getRequirements(): array
    {
        return $this->requirements;
    }

    /**
     * Sets the Requirements
     *
     * @param array[] $requirements
     *
     * @return Variable
     */
    public function setRequirements(array $requirements): Variable
    {
        $this->requirements = $requirements;

        return $this;
    }
}
