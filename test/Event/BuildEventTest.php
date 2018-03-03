<?php
/**
 *
 * author Timo Reymann
 */

class BuildEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\BuildEvent
     */
    private $buildEvent;

    public function setUp()
    {
        $this->buildEvent= new \TimoReymann\GitlabWebhookLibrary\Event\BuildEvent(json_decode(file_get_contents("./test/json/build_event.json"), true));
    }

    public function testGitPropertyMapping()
    {
        $this->assertEquals('gitlab-script-trigger', $this->buildEvent->getRef());
    }

    public function testProjectPropertyMapping()
    {
        $this->assertEquals(380, $this->buildEvent->getProjectId());
        $this->assertEquals(null, $this->buildEvent->getProject());
    }

    public function testUserMapping()
    {
        $this->assertEquals('User', $this->buildEvent->getUser()->getName());
        $this->assertEquals('user@gitlab.com', $this->buildEvent->getUser()->getEmail());
    }

    public function testCommitMapping()
    {
        $commit = $this->buildEvent->getCommit();

        $this->assertNotNull($commit);
        $this->assertEquals(2366, $commit->getId());
        $this->assertEquals("test\n", $commit->getMessage());
        $this->assertNull($commit->getAuthor());
    }

    public function testRepositoryMapping()
    {
        $respository = $this->buildEvent->getRepository();

        $this->assertNotNull($respository);
        $this->assertEquals("gitlab_test", $respository->getName());
        $this->assertEquals('git@192.168.64.1:gitlab-org/gitlab-test.git', $respository->getGitSshUrl());
        $this->assertEquals('Atque in sunt eos similique dolores voluptatem.', $respository->getDescription());
        $this->assertEquals('http://192.168.64.1:3005/gitlab-org/gitlab-test', $respository->getHomepage());
        $this->assertEquals('http://192.168.64.1:3005/gitlab-org/gitlab-test.git', $respository->getGitHttpUrl());
        $this->assertEquals(20, $respository->getVisibilityLevel());
    }

    public function testBuildPropertyMapping()
    {
        $this->assertEquals(1977, $this->buildEvent->getBuildId());
        $this->assertEquals('test', $this->buildEvent->getBuildName());
        $this->assertEquals('test', $this->buildEvent->getBuildStage());
        $this->assertEquals('created', $this->buildEvent->getBuildStatus());
        $this->assertEquals(null, $this->buildEvent->getBuildStartedAt());
        $this->assertEquals(null, $this->buildEvent->getBuildFinishedAt());
        $this->assertEquals(null, $this->buildEvent->getBuildDuration());
    }
}