<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\Job;
use Moovly\SDK\Model\Value;

/**
 * Class JobFactory
 * @package Moovly\SDK\Factory
 */
class JobFactory
{
    /**
     * @param Value[] $values
     *
     * @return Job
     */
    public static function create(array $values): Job
    {
        return (new Job())
            ->setValues($values)
            ->setNotifications([])
        ;
    }

    /**
     * @param array $response
     *
     * @return Job
     */
    public static function createFromAPIResponse(array $response): Job
    {
        $job = new Job();

        $values = array_map(function (array $value) {
            return ValueFactory::createFromAPIResponse($value);
        }, $response['videos']);

        $job
            ->setId($response['id'])
            ->setStatus($response['status'])
            ->setValues($values)
        ;

        return $job;
    }
}
