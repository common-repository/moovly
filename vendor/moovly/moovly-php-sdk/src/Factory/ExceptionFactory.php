<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Exception\BadAuthorizationException;
use Moovly\SDK\Exception\BadRequestException;
use Moovly\SDK\Exception\MoovlyException;
use Moovly\SDK\Exception\NotFoundException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class ExceptionFactory
 *
 * @package Moovly\SDK\Factory
 */
class ExceptionFactory
{
    /**
     * @param ResponseInterface $response
     *
     * @return MoovlyException
     */
    public static function create(ResponseInterface $response, \Exception $e): MoovlyException
    {
        try {
            $APIResponse = json_decode($response->getBody()->getContents(), true);
        } catch (\Exception $e) {
            $APIResponse = [];
        }

        $message = $APIResponse['message'] ?? $APIResponse['error'] ?? null;

        switch ($response->getStatusCode()) {
            case 400:
            case 402:
                return new BadRequestException($message);
            case 401:
            case 403:
                return new BadAuthorizationException();
            case 404:
                return new NotFoundException($message);
            default:
                return new MoovlyException('The API resulted in a faulty request', 400, $e);
        }
    }
}
