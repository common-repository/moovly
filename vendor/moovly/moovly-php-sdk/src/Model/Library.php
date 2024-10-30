<?php

namespace Moovly\SDK\Model;

/**
 * Class Library
 * @package Moovly\SDK\Model
 */
class Library
{
    /** @var string */
    private $id;

    /** @var string */
    private $name;

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
     * @return Library
     */
    public function setId(string $id): Library
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
     * @return Library
     */
    public function setName(string $name): Library
    {
        $this->name = $name;

        return $this;
    }
}
