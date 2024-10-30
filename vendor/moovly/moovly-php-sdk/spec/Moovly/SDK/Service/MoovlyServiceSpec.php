<?php

namespace spec\Moovly\SDK\Service;

use Moovly\SDK\Client\APIClient;
use Moovly\SDK\Model\Job;
use Moovly\SDK\Model\Library;
use Moovly\SDK\Model\MoovlyObject;
use Moovly\SDK\Model\Project;
use Moovly\SDK\Model\Template;
use Moovly\SDK\Model\User;
use Moovly\SDK\Model\Value;
use Moovly\SDK\Service\MoovlyService;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class MoovlyServiceSpec extends ObjectBehavior
{
    public function it_is_initializable(APIClient $client)
    {
        $this->beConstructedWith($client, '');

        $this->shouldHaveType(MoovlyService::class);
    }

    public function it_should_get_a_video_object(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getObject(Argument::type('string'))->willReturn([
            'id' => 'ABC',
            'type' => 'video',
            'assets' => [
                'video' => [
                    'render' => [
                        'type' => 'render',
                        'scale' => 1,
                        'source' => 'https://abc.com/g'
                    ],
                    'web' => [
                        'type' => 'web',
                        'scale' => 0.5,
                        'source' => 'https://abc.com/g'
                    ]
                ],
                'audio' => [
                    'lossless' => 'https://abc.com/g'
                ]
            ],
            'metadata' => [
                'id' => 'ABC',
                'version' => '1.0.0',
                'label' => 'ABC',
                'description' => 'video 1',
                'thumb' => 'https://abc.com/g',
                'tags' => [],
                'alpha' => false,
            ],
            'status' => true,
        ]);

        $this->beConstructedWith($client, '');

        $object = $this->getObject('ABC');

        $object->getId()->shouldReturn('ABC');
        $object->getType()->shouldReturn('video');
        $object->getLabel()->shouldReturn('ABC');
        $object->getDescription()->shouldReturn('video 1');
        $object->getThumbnailPath()->shouldReturn('https://abc.com/g');
        $object->getTags()->shouldReturn([]);
        $object->isAlpha()->shouldReturn(false);
        $object->getStatus()->shouldReturn(true);
        $object->getAssets()->shouldHaveCount(3);
    }

    public function it_should_get_a_image_object(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getObject(Argument::type('string'))->willReturn([
            'id' => 'ABC',
            'type' => 'sprite',
            'assets' => [[
                'path' => 'https://abc.com/g'
            ]],
            'metadata' => [
                'id' => 'ABC',
                'version' => '1.0.0',
                'label' => 'ABC',
                'description' => 'image 1',
                'thumb' => 'https://abc.com/g',
                'tags' => [],
                'alpha' => false,
            ],
            'status' => true,
        ]);

        $this->beConstructedWith($client, '');

        $object = $this->getObject('ABC');

        $object->getId()->shouldReturn('ABC');
        $object->getType()->shouldReturn('sprite');
        $object->getLabel()->shouldReturn('ABC');
        $object->getDescription()->shouldReturn('image 1');
        $object->getThumbnailPath()->shouldReturn('https://abc.com/g');
        $object->getTags()->shouldReturn([]);
        $object->isAlpha()->shouldReturn(false);
        $object->getStatus()->shouldReturn(true);
        $object->getAssets()->shouldHaveCount(3);
    }

    public function it_should_get_a_sound_object(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getObject(Argument::type('string'))->willReturn([
            'id' => 'ABC',
            'type' => 'sound',
            'assets' => [
                'origin' => 'https://abc.com/g',
                'flac' => 'https://abc.com/g',
                'mp3' => 'https://abc.com/g',
            ],
            'metadata' => [
                'id' => 'ABC',
                'version' => '1.0.0',
                'label' => 'ABC',
                'description' => 'sound 1',
                'thumb' => 'https://abc.com/g',
                'tags' => [],
                'alpha' => false,
            ],
            'status' => true,
        ]);


        $this->beConstructedWith($client, '');

        $object = $this->getObject('ABC');

        $object->getId()->shouldReturn('ABC');
        $object->getType()->shouldReturn('sound');
        $object->getLabel()->shouldReturn('ABC');
        $object->getDescription()->shouldReturn('sound 1');
        $object->getThumbnailPath()->shouldReturn('https://abc.com/g');
        $object->getTags()->shouldReturn([]);
        $object->isAlpha()->shouldReturn(false);
        $object->getStatus()->shouldReturn(true);
        $object->getAssets()->shouldHaveCount(3);
    }

    public function it_can_upload_an_image(APIClient $client, \SplFileInfo $file)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();
        $client->uploadAsset(Argument::type(\SplFileInfo::class), null)->willReturn([
            'id' => 'ABC',
            'type' => 'sprite',
            'assets' => [[
                'path' => 'https://abc.com/g'
            ]],
            'metadata' => [
                'id' => 'ABC',
                'version' => '1.0.0',
                'label' => 'ABC',
                'description' => 'image 1',
                'thumb' => 'https://abc.com/g',
                'tags' => [],
                'alpha' => false,
            ],
            'status' => true,
        ]);

        $this->beConstructedWith($client, '');

        $file->getFilename()->willReturn('image.jpeg');
        $file->getExtension()->willReturn('jpeg');

        $object = $this->uploadAsset($file);

        $object->shouldReturnAnInstanceOf(MoovlyObject::class);
        $object->getType()->shouldReturn('sprite');
    }

    public function it_can_upload_a_video(APIClient $client, \SplFileInfo $file)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();
        $client->uploadAsset(Argument::type(\SplFileInfo::class), null)->willReturn(
            [
                'id' => 'ABC',
                'type' => 'video',
                'assets' => [
                    'video' => [
                        'render' => [
                            'type' => 'render',
                            'scale' => 1,
                            'source' => 'https://abc.com/g'
                        ],
                        'web' => [
                            'type' => 'web',
                            'scale' => 0.5,
                            'source' => 'https://abc.com/g'
                        ]
                    ],
                    'audio' => [
                        'lossless' => 'https://abc.com/g'
                    ]
                ],
                'metadata' => [
                    'id' => 'ABC',
                    'version' => '1.0.0',
                    'label' => 'ABC',
                    'description' => 'video 1',
                    'thumb' => 'https://abc.com/g',
                    'tags' => [],
                    'alpha' => false,
                ],
                'status' => true,
            ]
        );

        $this->beConstructedWith($client, '');

        $file->getFilename()->willReturn('image.mp4');
        $file->getExtension()->willReturn('mp4');

        $this->uploadAsset($file)->shouldReturnAnInstanceOf(MoovlyObject::class);
    }

    public function it_can_get_a_project(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getProject(Argument::type('string'), Argument::type('array'))->willReturn([
            'id' => 'ABC',
            'label' => 'Project #2',
            'description' => 'A description',
            'thumb' => 'https://abc.com/g',
            'archived' => false,
            'pending' => false,
            'created_at' => "2017-07-28T08:14:12+00:00",
            'updated_at' => "2017-07-28T08:37:22+00:00",
            'created_by' => 50,
            'state' => [],
        ]);

        $this->beConstructedWith($client, '');

        $project = $this->getProject('ABC');

        $project->shouldReturnAnInstanceOf(Project::class);
        $project->getId()->shouldReturn('ABC');
        $project->getLabel()->shouldReturn('Project #2');
        $project->getDescription()->shouldReturn('A description');
        $project->getThumbnailPath()->shouldReturn('https://abc.com/g');
        $project->isArchived()->shouldReturn(false);
        $project->isPending()->shouldReturn(false);
        $project->getCreatedBy()->shouldReturn('50');
        $project->getCreatedAt()->shouldReturnAnInstanceOf(\DateTimeImmutable::class);
        $project->getUpdatedAt()->shouldReturnAnInstanceOf(\DateTimeImmutable::class);
    }

    public function it_can_get_projects(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client
            ->getProjects(
                Argument::type('string'),
                Argument::type('array'),
                Argument::type('int'),
                Argument::type('int')
            )
            ->willReturn([
                'results' => [
                    [
                        'id' => 'ABC',
                        'label' => 'Project #2',
                        'description' => 'A description',
                        'thumb' => 'https://abc.com/g',
                        'archived' => true,
                        'pending' => false,
                        'created_at' => "2017-07-28T08:14:12+00:00",
                        'updated_at' => "2017-07-28T08:37:22+00:00",
                        'created_by' => 50,
                        'state' => [],
                    ],
                    [
                        'id' => 'ABD',
                        'label' => 'Project #3',
                        'description' => 'A description',
                        'thumb' => 'https://abc.com/g',
                        'archived' => true,
                        'pending' => false,
                        'created_at' => "2017-07-28T08:14:12+00:00",
                        'updated_at' => "2017-07-28T08:37:22+00:00",
                        'created_by' => 50,
                        'state' => [],
                    ]
                ]
            ]);

        $this->beConstructedWith($client, '');

        $this->getProjects(null, [])->shouldHaveCount(2);
    }

    public function it_can_create_a_template(APIClient $client, Project $project)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->createTemplate(Argument::type('string'))->willReturn([
            'id' => 'ABC',
            'name' => 'Template',
            'original_moov_id' => 'project_id',
            'public' => false,
            'quality' => [],
            'variables' => [
                [
                    'id' => 'variable-ABC',
                    'name' => 'variable-name-1',
                    'weight' => 1,
                    'type' => 'text',
                    'requirements' => [
                        'minimum_length' => 3,
                        'maximum_length' => 100,
                        'multiline' => false,
                    ]
                ],
                [
                    'id' => 'variable-ABD',
                    'name' => 'variable-name-2',
                    'weight' => 2,
                    'type' => 'text',
                    'requirements' => [
                        'minimum_length' => 3,
                        'maximum_length' => 100,
                        'multiline' => false,
                    ]
                ]
            ]
        ]);

        $this->beConstructedWith($client, '');

        $project->getId()->willReturn('ABC');

        $template = $this->createTemplate($project);

        $template->shouldBeAnInstanceOf(Template::class);
        $template->getVariables()->shouldHaveCount(2);

        $firstVariable = $template->getVariables()[1];

        $firstVariable->getWeight()->shouldReturn(2);
        $firstVariable->getId()->shouldReturn('variable-ABD');
    }

    public function it_can_get_a_template(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getTemplate(Argument::type('string'))->willReturn([
            'id' => 'ABC',
            'name' => 'Template',
            'original_moov_id' => 'project_id',
            'public' => false,
            'quality' => [],
            'variables' => [
                [
                    'id' => 'variable-ABC',
                    'name' => 'variable-name-1',
                    'weight' => 1,
                    'type' => 'text',
                    'requirements' => [
                        'minimum_length' => 3,
                        'maximum_length' => 100,
                        'multiline' => false,
                    ]
                ],
                [
                    'id' => 'variable-ABD',
                    'name' => 'variable-name-2',
                    'weight' => 2,
                    'type' => 'text',
                    'requirements' => [
                        'minimum_length' => 3,
                        'maximum_length' => 100,
                        'multiline' => false,
                    ]
                ]
            ]
        ]);

        $this->beConstructedWith($client, '');

        $template = $this->getTemplate('ABC');

        $template->shouldBeAnInstanceOf(Template::class);
        $template->getVariables()->shouldHaveCount(2);

        $firstVariable = $template->getVariables()[1];

        $firstVariable->getWeight()->shouldReturn(2);
        $firstVariable->getId()->shouldReturn('variable-ABD');
    }

    public function it_can_get_templates(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getTemplates([])->willReturn([
            [
                'id' => 'ABC',
                'name' => 'Template 1',
                'original_moov_id' => 'project_id_1',
                'public' => false,
                'quality' => [],
                'variables' => [
                    [
                        'id' => 'variable-ABC',
                        'name' => 'variable-name-1',
                        'weight' => 1,
                        'type' => 'text',
                        'requirements' => [
                            'minimum_length' => 3,
                            'maximum_length' => 100,
                            'multiline' => false,
                        ]
                    ],
                    [
                        'id' => 'variable-ABD',
                        'name' => 'variable-name-2',
                        'weight' => 2,
                        'type' => 'text',
                        'requirements' => [
                            'minimum_length' => 3,
                            'maximum_length' => 100,
                            'multiline' => false,
                        ]
                    ]
                ]
            ],
            [
                'id' => 'ABD',
                'name' => 'Template 2',
                'original_moov_id' => 'project_id_2',
                'public' => false,
                'quality' => [],
                'variables' => [
                    [
                        'id' => 'variable-ABC',
                        'name' => 'variable-name-1',
                        'weight' => 1,
                        'type' => 'text',
                        'requirements' => [
                            'minimum_length' => 3,
                            'maximum_length' => 100,
                            'multiline' => false,
                        ]
                    ],
                    [
                        'id' => 'variable-ABD',
                        'name' => 'variable-name-2',
                        'weight' => 2,
                        'type' => 'text',
                        'requirements' => [
                            'minimum_length' => 3,
                            'maximum_length' => 100,
                            'multiline' => false,
                        ]
                    ]
                ]
            ]
        ]);

        $this->beConstructedWith($client, '');

        $template = $this->getTemplates()[1];

        $template->shouldBeAnInstanceOf(Template::class);
        $template->getVariables()->shouldHaveCount(2);

        $firstVariable = $template->getVariables()[1];

        $firstVariable->getWeight()->shouldReturn(2);
        $firstVariable->getId()->shouldReturn('variable-ABD');
    }

    public function it_can_create_a_job(APIClient $client, Job $job, Template $template, Value $value)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $value->getExternalId()->willReturn('external_id_1');
        $value->getTitle()->willReturn('Title 1');
        $value->getTemplateVariables()->willReturn([
            "template-variable-1_id" => "Text value here",
        ]);
        $value->getMetadata()->willReturn([]);
        $template->getId()->willReturn('VALUE');
        $job->getOptions()->willReturn([]);
        $job->getNotifications()->willReturn([]);

        $job->getValues()->willReturn([
            $value
        ]);

        $job->getId()->willReturn(null);
        $job->getTemplate()->willReturn($template);

        $client->createJob(
            Argument::type('string'),
            Argument::type('array'),
            Argument::type('array'),
            Argument::type('array')
        )->willReturn([
            'id' => 'abc',
            'status' => 'started',
            'videos' => [
                [
                    'external_id' => 'external_id_1',
                    'status' => 'pending',
                    'url' => 'https://abc.com/g',
                    'error' => null,
                    'metadata' => [],
                ]
            ]
        ]);

        $this->beConstructedWith($client, '');

        $this->createJob($job)->shouldBeAnInstanceOf(Job::class);
    }

    public function it_can_get_jobs_by_user(APIClient $client, User $user)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $user->getId()->willReturn(50);

        $client->getJobsByUser(Argument::type('string'))->willReturn([
            [
                'id' => 'abc',
                'status' => 'started',
                'videos' => [
                    [
                        'external_id' => 'external_id_1',
                        'status' => 'pending',
                        'url' => 'https://abc.com/g',
                        'error' => null,
                    ]
                ]
            ],
            [
                'id' => 'abc',
                'status' => 'started',
                'videos' => [
                    [
                        'external_id' => 'external_id_1',
                        'status' => 'pending',
                        'url' => 'https://abc.com/g',
                        'error' => null,
                    ]
                ]
            ]
        ]);

        $this->beConstructedWith($client, '');

        $jobs = $this->getJobsByUser($user);

        $jobs[0]->shouldBeAnInstanceOf(Job::class);
        $jobs->shouldHaveCount(2);
    }

    public function it_can_get_jobs_by_template(APIClient $client, Template $template)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $template->getId()->willReturn('ABC');

        $client->getJobsByTemplate(Argument::type('string'))->willReturn([
            [
                'id' => 'abc',
                'status' => 'started',
                'videos' => [
                    [
                        'external_id' => 'external_id_1',
                        'status' => 'pending',
                        'url' => 'https://abc.com/g',
                        'error' => null,
                    ]
                ]
            ],
            [
                'id' => 'abc',
                'status' => 'started',
                'videos' => [
                    [
                        'external_id' => 'external_id_1',
                        'status' => 'pending',
                        'url' => 'https://abc.com/g',
                        'error' => null,
                    ]
                ]
            ]
        ]);

        $this->beConstructedWith($client, '');

        $jobs = $this->getJobsByTemplate($template);

        $jobs[0]->shouldBeAnInstanceOf(Job::class);
        $jobs->shouldHaveCount(2);
    }

    public function it_can_get_an_user(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getUser()->willReturn([
            'id' => 50,
            'locked' => false,
            'uuid' => 'ABC'
        ]);

        $this->beConstructedWith($client, '');

        $user = $this->getCurrentUser();

        $user->shouldReturnAnInstanceOf(User::class);
        $user->getId()->shouldReturn(50);
        $user->isLocked()->shouldReturn(false);
        $user->getUuid()->shouldReturn('ABC');
    }

    public function it_can_get_a_personal_library(APIClient $client)
    {
        $client->setToken(Argument::type('string'))->shouldBeCalled();

        $client->getUserPersonalLibrary()->willReturn([
            'id' => 'ABC',
            'name' => 'Name ABC'
        ]);

        $this->beConstructedWith($client, '');

        $library = $this->getPersonalLibraryForUser();

        $library->shouldReturnAnInstanceOf(Library::class);
        $library->getId()->shouldReturn('ABC');
        $library->getName()->shouldReturn('Name ABC');
    }
}
