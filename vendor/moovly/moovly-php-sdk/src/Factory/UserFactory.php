<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\User;

/**
 * Class UserFactory
 * @package Moovly\SDK\Factory
 */
class UserFactory
{
    /**
     * @param array $response
     *
     * @return User
     */
    public static function createFromAPIResponse(array $response): User
    {
        return (new User())
            ->setId($response['id'])
            ->setLocked((bool) $response['locked'])
            ->setUuid($response['uuid'])
        ;
    }
}
