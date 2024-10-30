<?php

namespace Moovly\SDK\Model;

/**
 * Class Value
 * @package Moovly\SDK\Model
 */
class Value
{
    /** @var string */
    private $externalId;

    /** @var string */
    private $title;

    /** @var array */
    private $templateVariables;

    /** @var string */
    private $status = 'unsent';

    /** @var null|string */
    private $url = null;

    /** @var null|string */
    private $error = null;

    /** @var array */
    private $metadata = [];

    /** @var array */
    private $notifications = [];

    /**
     * Returns the ExternalId. The external id is an user-given id so they can track the value (read video render)
     * throughout their system.
     *
     * @return string
     */
    public function getExternalId(): string
    {
        return $this->externalId;
    }

    /**
     * Sets the ExternalId
     *
     * @param string $externalId
     *
     * @return Value
     */
    public function setExternalId(string $externalId): Value
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * Returns the Title
     *
     * @return string
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * Sets the Title
     *
     * @param string $title
     *
     * @return Value
     */
    public function setTitle(string $title): Value
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Returns the TemplateVariables
     *
     * @return array
     */
    public function getTemplateVariables(): ?array
    {
        return $this->templateVariables;
    }

    /**
     * Sets the TemplateVariables
     *
     * @param array $templateVariables
     *
     * @return Value
     */
    public function setTemplateVariables(array $templateVariables): Value
    {
        $this->templateVariables = $templateVariables;

        return $this;
    }

    /**
     * Can return an object id or text, depending on the type.
     *
     * @param Variable $variable
     *
     * @return string
     */
    public function getValueForVariable(Variable $variable)
    {
        return $this->templateVariables[$variable->getId()];
    }

    /**
     * Returns the Status
     *
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * Sets the Status
     *
     * @param string $status
     *
     * @return Value
     */
    public function setStatus(string $status): Value
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Returns the Url
     *
     * @return null|string
     */
    public function getUrl(): ?string
    {
        return $this->url;
    }

    /**
     * Sets the Url
     *
     * @param null|string $url
     *
     * @return Value
     */
    public function setUrl(?string $url): Value
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Returns the Error
     *
     * @return null|string
     */
    public function getError(): ?string
    {
        return $this->error;
    }

    /**
     * Sets the Error
     *
     * @param null|string $error
     *
     * @return Value
     */
    public function setError(?string $error): Value
    {
        $this->error = $error;

        return $this;
    }

    /**
     * @return array
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * @param array $notifications
     *
     * @return Value
     */
    public function setNotifications(array $notifications): Value
    {
        $this->notifications = $notifications;

        return $this;
    }

    /**
     * @return array
     */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    /**
     * @param array $notifications
     *
     * @return Value
     */
    public function setMetadata(array $metadata): Value
    {
        $this->metadata = $metadata;

        return $this;
    }
}
