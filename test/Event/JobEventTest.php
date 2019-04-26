<?php

class JobEventTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\JobEvent
     */
    private $jobEvent;

    public function setUp()
    {
        $this->jobEvent= new \TimoReymann\GitlabWebhookLibrary\Event\JobEvent(json_decode(file_get_contents("./test/json/job_event.json"), true));
    }

    public function testGitPropertyMapping()
    {
        $this->assertEquals('gitlab-script-trigger', $this->jobEvent->getRef());
    }

    public function testProjectPropertyMapping()
    {
        $this->assertEquals(380, $this->jobEvent->getProjectId());
        $this->assertEquals(null, $this->jobEvent->getProject());
    }

    public function testUserMapping()
    {
        $this->assertEquals('User', $this->jobEvent->getUser()->getName());
        $this->assertEquals('user@gitlab.com', $this->jobEvent->getUser()->getEmail());
    }

    public function testCommitMapping()
    {
        $commit = $this->jobEvent->getCommit();

        $this->assertNotNull($commit);
        $this->assertEquals(2366, $commit->getId());
        $this->assertEquals("test\n", $commit->getMessage());
        $this->assertNull($commit->getAuthor());
    }

    public function testRepositoryMapping()
    {
        $respository = $this->jobEvent->getRepository();

        $this->assertNotNull($respository);
        $this->assertEquals("gitlab_test", $respository->getName());
        $this->assertEquals('git@192.168.64.1:gitlab-org/gitlab-test.git', $respository->getGitSshUrl());
        $this->assertEquals('Atque in sunt eos similique dolores voluptatem.', $respository->getDescription());
        $this->assertEquals('http://192.168.64.1:3005/gitlab-org/gitlab-test', $respository->getHomepage());
        $this->assertEquals('http://192.168.64.1:3005/gitlab-org/gitlab-test.git', $respository->getGitHttpUrl());
        $this->assertEquals(20, $respository->getVisibilityLevel());
    }

    public function testJobPropertyMapping()
    {
        $this->assertEquals(1977, $this->jobEvent->getJobId());
        $this->assertEquals('test', $this->jobEvent->getJobName());
        $this->assertEquals('test', $this->jobEvent->getJobStage());
        $this->assertEquals('created', $this->jobEvent->getJobStatus());
        $this->assertEquals(null, $this->jobEvent->getJobStartedAt());
        $this->assertEquals(null, $this->jobEvent->getJobFinishedAt());
        $this->assertEquals(null, $this->jobEvent->getJobDuration());
    }
}