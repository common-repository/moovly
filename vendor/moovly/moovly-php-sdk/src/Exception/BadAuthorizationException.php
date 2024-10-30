<?php

namespace Moovly\SDK\Exception;

/**
 * Thrown when the bearer token is invalid.
 * Thrown after an API call.
 *
 * To get a new token, go to https://developer.moovly.com/docs/authentication
 *
 * Class BadAuthorizationException
 *
 * @package Moovly\SDK\Exception
 */
class BadAuthorizationException extends MoovlyException
{
    const CODE = 403;
    const MESSAGE = 'The token supplied was invalid. Please change your token and try again.'
    ;

    public function __construct()
    {
        parent::__construct(self::MESSAGE, self::CODE);
    }
}
