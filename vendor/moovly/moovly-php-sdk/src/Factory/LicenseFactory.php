<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\License;

/**
 * Class LicenseFactory
 * @package Moovly\SDK\Factory
 */
class LicenseFactory
{
    /**
     * @param array $response
     *
     * @return License
     */
    public static function createFromAPIResponse(array $response): License
    {
        $license = new License();



        $license
            ->setCreatedAt($response['created_at']['date'])
            ->setExpired($response['expired'])
            ->setExpiresAt($response['expires_at']['date'])
            ->setName($response['name'])
            ->setFrozen($response['frozen'])
            ->setPlan($response['plan'])
            ->setPlanCode($response['plan_code']);

        return $license;
    }
}
