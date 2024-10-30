<?php

namespace Moovly\SDK\Factory;

use Moovly\SDK\Model\Template;
use Moovly\SDK\Model\Variable;

/**
 * Class TemplateFactory
 * @package Moovly\SDK\Factory
 */
class TemplateFactory
{
    public static function createFromAPIResponse(array $response): Template
    {
        $template = new Template();

        $variables = array_map(function (array $variable) {
            return (new Variable())
                ->setId($variable['id'])
                ->setName($variable['name'])
                ->setType($variable['type'])
                ->setRequirements($variable['requirements'])
                ->setWeight((int) $variable['weight']);
        }, $response['variables']);

        uasort($variables, function (Variable $current, Variable $next) {
            return $next->getWeight() <=> $current->getWeight();
        });

        $template
            ->setId($response['id'])
            ->setName($response['name'])
            ->setOriginalProjectId($response['original_moov_id'])
            ->setThumbnail($response['thumb'] ?? null)
            ->setPreview($response['preview'] ?? null)
            ->setVariables($variables)
            ->setQuality($response['quality']);

        return $template;
    }
}
