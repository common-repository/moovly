<?php

namespace Moovly\SDK\Model;

/**
 * Class License
 * @package Moovly\SDK\Model
 */
class License
{
    /** @var string|null */
    private $createdAt;

    /** @var bool */
    private $expired;

    /** @var string|null */
    private $expiresAt;

    /** @var string */
    private $name;

    /** @var string */
    private $plan;

    /** @var string */
    private $planCode;

    /** @var bool */
    private $frozen;

    public function setCreatedAt(?string $createdAt): License
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getCreatedAt(): ?string
    {
        return $this->createdAt;
    }

    public function setExpired(bool $expired): License
    {
        $this->expired = $expired;

        return $this;
    }

    public function getExpired(): bool
    {
        return $this->expired;
    }

    public function setExpiresAt(?string $expiresAt): License
    {
        $this->expiresAt = $expiresAt;

        return $this;
    }

    public function getExpiresAt(): ?string
    {
        return $this->expiresAt;
    }

    public function setName(string $name): License
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setPlan(string $plan): License
    {
        $this->plan = $plan;

        return $this;
    }

    public function getPlan(): string
    {
        return $this->plan;
    }

    public function setPlanCode(string $planCode): License
    {
        $this->planCode = $planCode;

        return $this;
    }

    public function getPlanCode(): string
    {
        return $this->planCode;
    }

    public function setFrozen(bool $frozen): License
    {
        $this->frozen = $frozen;

        return $this;
    }

    public function getFrozen(): bool
    {
        return $this->frozen;
    }
}
