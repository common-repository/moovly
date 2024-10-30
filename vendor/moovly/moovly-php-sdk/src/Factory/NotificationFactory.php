<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\Notification;

/**
 * Class NotificationFactory
 * @package Moovly\SDK\Factory
 */
class NotificationFactory
{
    /**
     * @param string $type
     * @param array  $payload
     *
     * @return Notification
     */
    public static function create(
        string $type,
        array $payload = []
    ): Notification {
        return (new Notification())
            ->setType($type)
            ->setPayload($payload)
        ;
    }
}
