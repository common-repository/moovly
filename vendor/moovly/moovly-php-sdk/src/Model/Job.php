<?php

namespace Moovly\SDK\Model;

/**
 * Class Job
 * @package Moovly\SDK\Model
 */
class Job
{
    /** @var string */
    private $id;

    /** @var array */
    private $options = [];

    /** @var Template */
    private $template;

    /** @var Value[] */
    private $values;

    /** @var Notification[] */
    private $notifications = [];

    /** @var string */
    private $status = 'unsent';

    /**
     * Returns the Id
     *
     * @return string
     */
    public function getId(): ?string
    {
        return $this->id;
    }

    /**
     * Sets the Id
     *
     * @param string $id
     *
     * @return Job
     */
    public function setId(string $id): Job
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Returns the Options
     *
     * @return array
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * Sets the Options
     *
     * @param array $options
     *
     * @return Job
     */
    public function setOptions(array $options): Job
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Returns the Template. The template will only return a value when set by the end-user. This is only
     * used for creating jobs.
     *
     * @return Template
     */
    public function getTemplate(): ?Template
    {
        return $this->template;
    }

    /**
     * Sets the Template
     *
     * @param Template $template
     *
     * @return Job
     */
    public function setTemplate(Template $template): Job
    {
        $this->template = $template;

        return $this;
    }

    /**
     * Returns the Values
     *
     * @return Value[]
     */
    public function getValues(): array
    {
        return $this->values;
    }

    /**
     * Sets the Values
     *
     * @param Value[] $values
     *
     * @return Job
     */
    public function setValues(array $values): Job
    {
        $this->values = $values;

        return $this;
    }

    /**
     * @return string
     */
    public function getQuality(): string
    {
        return $this->options['quality'];
    }

    /**
     * @return bool
     */
    public function createsMoov(): bool
    {
        return $this->options['create_moov'];
    }

    /**
     * @return bool
     */
    public function autoRenders(): bool
    {
        return $this->options['auto_render'];
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
     * @return Job
     */
    public function setStatus(string $status): Job
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Notification[]
     */
    public function getNotifications(): array
    {
        return $this->notifications;
    }

    /**
     * @param Notification[] $notifications
     *
     * @return Job
     */
    public function setNotifications(array $notifications): Job
    {
        $this->notifications = $notifications;

        return $this;
    }
}
