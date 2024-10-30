<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\Asset;
use Moovly\SDK\Model\MoovlyObject;

/**
 * Class AssetFactory
 * @package Moovly\SDK\Factory
 */
class AssetFactory
{
    /**
     * @param string $objectType
     * @param array  $assets
     *
     * @return Asset[]
     */
    public static function createFromAPIResponse(string $objectType, array $assets): array
    {
        switch ($objectType) {
            case MoovlyObject::TYPE_VIDEO:
                return self::createAssetsForVideo($assets);
            case MoovlyObject::TYPE_SOUND:
                return self::createAssetsForSound($assets);
            case MoovlyObject::TYPE_IMAGE:
                return self::createAssetsForImage($assets);
            default:
                return [];
        }
    }

    /**
     * @param array $assets
     *
     * @return Asset[]
     */
    private static function createAssetsForVideo(array $assets): array
    {
        $result = [];

        if (empty($assets)) {
            return $result;
        }

        $videos = array_values(array_map(function (array $video) {
            return (new Asset())
                ->setType(Asset::TYPE_VIDEO)
                ->setScale($video['scale'])
                ->setSource($video['source'])
                ->setVersion($video['type']);
        }, $assets['video']));

        $result = array_merge($videos, $result);

        foreach ($assets['audio'] as $key => $path) {
            $result[] = (new Asset())
                ->setType(Asset::TYPE_AUDIO)
                ->setScale(null)
                ->setVersion($key)
                ->setSource($path);
        }

        return $result;
    }

    /**
     * @param array $assets
     *
     * @return Asset[]
     */
    private static function createAssetsForSound(array $assets): array
    {
        $result = [];

        foreach ($assets as $key => $path) {
            $result[] = (new Asset())
                ->setType(Asset::TYPE_AUDIO)
                ->setScale(null)
                ->setVersion($key)
                ->setSource($path);
        }

        return $result;
    }

    /**
     * @param array $assets
     *
     * @return Asset[]
     */
    private static function createAssetsForImage(array $assets): array
    {
        $result = [];

        $fileName = pathinfo($assets[0]['path'], PATHINFO_FILENAME);
        $extension = pathinfo($assets[0]['path'], PATHINFO_EXTENSION);

        $result[] = (new Asset())
            ->setType(Asset::TYPE_AUDIO)
            ->setScale(null)
            ->setVersion('480p')
            ->setSource($assets[0]['path']);

        $result[] = (new Asset())
            ->setType(Asset::TYPE_AUDIO)
            ->setScale(null)
            ->setVersion('720p')
            ->setSource(sprintf('%s@2x%s', $fileName, $extension));

        $result[] = (new Asset())
            ->setType(Asset::TYPE_AUDIO)
            ->setScale(null)
            ->setVersion('1080p')
            ->setSource(sprintf('%s@4x%s', $fileName, $extension));

        return $result;
    }
}
