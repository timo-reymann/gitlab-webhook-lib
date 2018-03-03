<?php
/**
 *
 * author Timo Reymann
 */

class PipelineEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent
     */
    private $pipelineEvent;

    public function setUp()
    {
        $this->pipelineEvent = new \TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent(json_decode(file_get_contents("./test/json/pipeline_event.json"), true));
    }

    public function testObjectAttributesMapping()
    {
        $meta = $this->pipelineEvent->getObjectAttributes();

        $this->assertNotNull($meta);
        $this->assertEquals(31, $meta['id']);
    }

    public function testUserMapping()
    {
        $user = $this->pipelineEvent->getUser();
        $this->assertEquals('Administrator', $user->getName());
        $this->assertNull($this->pipelineEvent->getUser()->getEmail());
        $this->assertEquals('root', $user->getUsername());
        $this->assertEquals('http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80&d=identicon', $user->getAvatarUrl());
    }

    public function testProjectMapping()
    {
        $project = $this->pipelineEvent->getProject();

        $this->assertNotNull($project);
        $this->assertEquals(1, $project->getId());
    }

    public function testCommitMapping()
    {
        $commit = $this->pipelineEvent->getCommit();

        $this->assertNotNull($commit);
        $this->assertEquals('bcbb5ec396a2c0f828686f14fac9b80b780504f2', $commit->getId());

        $author = $commit->getAuthor();
        $this->assertNotNull($author);
        $this->assertEquals('User', $author->getName());
        $this->assertEquals('user@gitlab.com', $author->getEmail());
    }

    public function testBuildsMapping()
    {
        $builds = $this->pipelineEvent->getBuilds();

        $this->assertNotNull($builds);
        $this->assertEquals(5, count($builds));

        $firstBuild = $builds[0];

        $this->assertNotNull($firstBuild);
        $this->assertEquals(380, $firstBuild->getId());
        $this->assertEquals('deploy', $firstBuild->getStage());
        $this->assertEquals('production', $firstBuild->getName());
        $this->assertEquals('2016-08-12 15:23:28 UTC', $firstBuild->getCreatedAt());
        $this->assertNull($firstBuild->getStartedAt());
        $this->assertNull($firstBuild->getFinishedAt());
        $this->assertEquals('manual', $firstBuild->getWhen());

        $user = $firstBuild->getUser();
        $this->assertNotNull($user);
        $this->assertEquals('Administrator', $user->getName());
        $this->assertEquals('root', $user->getUsername());
        $this->assertEquals('http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80&d=identicon', $user->getAvatarUrl());

        $this->assertNull($firstBuild->getRunner());

        $file = $firstBuild->getArtifactsfile();
        $this->assertNotNull($file);
        $this->assertNull($file->getFilename());
        $this->assertNull($file->getSize());
    }
}