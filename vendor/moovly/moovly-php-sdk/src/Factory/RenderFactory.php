<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\Render;

/**
 * Class RenderFactory
 * @package Moovly\SDK\Factory
 */
class RenderFactory
{
    /**
     * @param array  $renders
     *
     * @return Render[]
     */
    public static function createFromAPIResponse(array $renders): array
    {
        $results = [];

        foreach ($renders as $render) {
            if (is_null($render)) {
                continue;
            }

            //Todo move Render model to new structure
            $results[] = (new Render())
                ->setId($render['id'])
                ->setState($render['finished'] ? 'finished' : 'pending')
                ->setStartedAt(new \DateTimeImmutable($render['last_attempt_started_at']))
                ->setDateFinished(new \DateTimeImmutable($render['finished_at']))
                ->setUrl($render['video_url'])
                ->setError($render['error'])
                ->setQuality($render['quality'])
                ->setType($render['external_type'])
                ->setProjectId($render['external_id'])
                ->setWidth($render['width'])
                ->setHeight($render['height'])
                ->setThumbnail($render['thumbnail']);
        }

        return $results;
    }
}
