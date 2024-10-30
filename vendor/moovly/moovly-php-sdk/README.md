![Tests](https://github.com/Moovly/moovly-php-sdk/workflows/Tests/badge.svg)

# Moovly PHP SDK

This PHP SDK implements the API calls documented in the [Moovly API Hub](https://developer.moovly.com)

Versioning of this SDK is matched to the API Hub documentation versioning.

## Usage 

```php
<?php

# Use composer
require __DIR__ . '/vendor/autoload.php';

use Moovly\SDK\Client\APIClient;
use Moovly\SDK\Service\MoovlyService;
use Moovly\SDK\Model\Project;
use Moovly\SDK\Model\User;
use Moovly\SDK\Model\Template;
use Moovly\SDK\Model\Variable;
use Moovly\SDK\Model\Value;
use Moovly\SDK\Model\Job;
use Moovly\SDK\Factory\ValueFactory;
use Moovly\SDK\Factory\JobFactory;
use Moovly\SDK\Model\MoovlyObject;
use Moovly\SDK\Model\Library;

# Visit https://developer.moovly.com/docs/authentication for a token
$token = 'YOUR MOOVLY TOKEN';
$client = new APIClient();
$service = new MoovlyService($client, $token);

/** @var Project $project */
$project = $service->getProject('project-id');

/** @var Project[] $projects */
$projects = $service->getProjects();

/** @var Template[] $template */
$filters = [];
$templates = $service->getTemplates($filters);

/** @var Template $template */
$template = $service->createTemplate($project);

/** @var Template $template */
$template = $service->getTemplate('template-id');

/** @var Library $library */
$library = $service->getPersonalLibraryForUser();

$image = new \SplFileInfo('image.jpeg');

/** @var MoovlyObject $imageObject */
$imageObject = $service->uploadAsset($image, $library);

$video = new \SplFileInfo('video.mp4');

/** @var MoovlyObject $videoObject */
$videoObject = $service->uploadAsset($video, $library);

do {
    $object = $service->getObject($videoObject->getId());
} while (!$object->getStatus());

echo $videoObject->getId();

$templateVariables = [];

foreach ($template->getVariables() as $key => $variable) {
    if ($variable->getType() === Variable::TYPE_TEXT) {
        $templateVariables[$variable->getId()] = 'Value ' . $key;
    }
    
    if ($variable->getType() === Variable::TYPE_IMAGE) {
        $templateVariables[$variable->getId()] = $imageObject->getId();
    }
    
    if ($variable->getType() === Variable::TYPE_IMAGE) {
        $templateVariables[$variable->getId()] = $videoObject->getId();
    }
}

/** @var Value $value */
$value = ValueFactory::create('my-video-id-1', 'My Video Title 1', $templateVariables);

/** @var Job $job */
$job = JobFactory::create([$value]);

/** @var Job $job */
$job = $service->createJob($job);

do {
    echo 'Polling job until finished';
    
    $job = $service->getJob($job->getId());
    
    sleep(60);
} while ($job->getStatus() === 'finished' || $job->getStatus() === 'error');

echo 'Polling job until finished';

$urls = array_map(function (Value $value) {
    return $value->getUrl();
}, $job->getValues());

foreach ($urls as $url) {
  echo 'Video url: ' . $url;
}

/** @var User $user */
$user = $service->getCurrentUser();

/** @var Job[] $jobs */
$jobs = $service->getJobsByUser($user);

/** @var Job[] $jobs */
$jobs = $service->getJobsByTemplate($template);
```

## Running tests

```php
$ vendor/bin/phpspec run
```
