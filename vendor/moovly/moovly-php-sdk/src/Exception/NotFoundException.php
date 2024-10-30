<?php

namespace Moovly\SDK\Exception;

/**
 * Thrown when the API couldn't find a route or couldn't find a resource.
 * Thrown after an API call.
 *
 * Class BadRequestException
 *
 * @package Moovly\SDK\Exception
 */
class NotFoundException extends MoovlyException
{
    const CODE = 400;
    const MESSAGE = 'The API call you made was against a non-existant endpoint or couldn\'t find the resource. Additional message given: %s';

    public function __construct(?string $reason)
    {
        parent::__construct(sprintf(self::MESSAGE, $reason ?? 'none'), self::CODE);
    }
}
