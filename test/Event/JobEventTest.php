<?php

class JobEventTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\JobEvent
     */
    private $jobEvent;

    public function setUp(): void
    {
        $this->jobEvent = new \TimoReymann\GitlabWebhookLibrary\Event\JobEvent(json_decode('
        {
          "object_kind": "job",
          "ref": "gitlab-script-trigger",
          "tag": false,
          "before_sha": "2293ada6b400935a1378653304eaf6221e0fdb8f",
          "sha": "2293ada6b400935a1378653304eaf6221e0fdb8f",
          "job_id": 1977,
          "job_name": "test",
          "job_stage": "test",
          "job_status": "created",
          "job_started_at": null,
          "job_finished_at": null,
          "job_duration": null,
          "job_allow_failure": false,
          "project_id": 380,
          "project_name": "gitlab-org/gitlab-test",
          "user": {
            "id": 3,
            "name": "User",
            "email": "user@gitlab.com"
          },
          "commit": {
            "id": 2366,
            "sha": "2293ada6b400935a1378653304eaf6221e0fdb8f",
            "message": "test\n",
            "author_name": "User",
            "author_email": "user@gitlab.com",
            "status": "created",
            "duration": null,
            "started_at": null,
            "finished_at": null
          },
          "repository": {
            "name": "gitlab_test",
            "git_ssh_url": "git@192.168.64.1:gitlab-org/gitlab-test.git",
            "description": "Atque in sunt eos similique dolores voluptatem.",
            "homepage": "http://192.168.64.1:3005/gitlab-org/gitlab-test",
            "git_http_url": "http://192.168.64.1:3005/gitlab-org/gitlab-test.git",
            "visibility_level": 20
          }
        }
        ', true));
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