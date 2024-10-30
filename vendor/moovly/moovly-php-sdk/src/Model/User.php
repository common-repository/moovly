<?php

namespace Moovly\SDK\Model;

/**
 * Class User
 * @package Moovly\SDK\Model
 */
class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $uuid;

    /** @var bool */
    private $locked;

    /**
     * Returns the Id
     *
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * Sets the Id
     *
     * @param int $id
     *
     * @return User
     */
    public function setId(int $id): User
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the Uuid
     *
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * Sets the Uuid
     *
     * @param string $uuid
     *
     * @return User
     */
    public function setUuid(string $uuid): User
    {
        $this->uuid = $uuid;

        return $this;
    }

    /**
     * Returns the Locked
     *
     * @return bool
     */
    public function isLocked(): bool
    {
        return $this->locked;
    }

    /**
     * Sets the Locked
     *
     * @param bool $locked
     *
     * @return User
     */
    public function setLocked(bool $locked): User
    {
        $this->locked = $locked;

        return $this;
    }
}
