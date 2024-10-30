<?php

namespace Moovly\SDK\Exception;

/**
 * Thrown when the API rejects the sent request.
 * Thrown after an API call.
 *
 * Class BadRequestException
 *
 * @package Moovly\SDK\Exception
 */
class BadRequestException extends MoovlyException
{
    const CODE = 400;
    const MESSAGE = 'The API call you made resulted in a Bad Request response (HTTP 400). The reason given by the ' .
        'server: %s'
    ;

    public function __construct(?string $reason)
    {
        parent::__construct(sprintf(self::MESSAGE, $reason), self::CODE);
    }
}
