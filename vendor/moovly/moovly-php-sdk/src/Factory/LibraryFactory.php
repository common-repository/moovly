<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\Library;

/**
 * Class LibraryFactory
 * @package Moovly\SDK\Factory
 */
class LibraryFactory
{
    /**
     * @param array $response
     *
     * @return Library
     */
    public static function createFromAPIResponse(array $response): Library
    {
        $library = new Library();

        $library
            ->setId($response['id'])
            ->setName($response['name'])
        ;

        return $library;
    }
}
