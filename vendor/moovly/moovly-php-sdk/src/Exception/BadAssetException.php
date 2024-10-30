<?php

namespace Moovly\SDK\Exception;

/**
 * Thrown when an asset is trying to be uploaded that is not supported by the API.
 * This is thrown before the request is made.
 *
 * Class BadAssetException
 *
 * @package Moovly\SDK\Exception
 */
class BadAssetException extends MoovlyException
{
    const CODE = 400;
    const MESSAGE = 'The file %s has an file type that is not supported by the Moovly API yet. Please use a ' .
        'different asset or transcode it.'
    ;

    public function __construct(\SplFileInfo $file)
    {
        parent::__construct(sprintf(self::MESSAGE, $file->getFilename()), self::CODE);
    }
}
