<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\MoovlyObject;

/**
 * Class ObjectFactory
 * @package Moovly\SDK\Factory
 */
class ObjectFactory
{
    /**
     * Creates a model from the API response from /objects/{id}. Don't use this method as an end-user.
     *
     * @param array $response
     *
     * @return MoovlyObject
     */
    public static function createFromAPIResponse(array $response): MoovlyObject
    {
        $object = new MoovlyObject();

        $assets = AssetFactory::createFromAPIResponse($response['type'], $response['assets']);

        $object
            ->setId($response['id'] ?? $response['metadata']['id'])
            ->setAssets($assets)
            ->setType($response['type'])
            ->setLabel($response['metadata']['label'])
            ->setDescription($response['metadata']['description'])
            ->setThumbnailPath($response['metadata']['thumb'] ?? '')
            ->setTags($response['metadata']['tags'] ?? [])
            ->setAlpha($response['metadata']['alpha'] ?? false)
            ->setStatus($response['status'])
        ;

        return $object;
    }
}
