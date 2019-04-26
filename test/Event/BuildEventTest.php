<?php
/**
 * @deprecated See https://gitlab.com/gitlab-org/gitlab-ce/merge_requests/26676/diffs
 *
 * author Timo Reymann
 */
class BuildEventTest extends PHPUnit\Framework\TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\BuildEvent
     */
    private $buildEvent;

    protected function setUp(): void
    {
        $this->buildEvent = new \TimoReymann\GitlabWebhookLibrary\Event\BuildEvent(json_decode('
        {
          "object_kind": "build",
          "ref": "gitlab-script-trigger",
          "tag": false,
          "before_sha": "2293ada6b400935a1378653304eaf6221e0fdb8f",
          "sha": "2293ada6b400935a1378653304eaf6221e0fdb8f",
          "build_id": 1977,
          "build_name": "test",
          "build_stage": "test",
          "build_status": "created",
          "build_started_at": null,
          "build_finished_at": null,
          "build_duration": null,
          "build_allow_failure": false,
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
            "git_ssh_url": "git@192.168.64.1:gitlab-org/gitlab-test.git",
            "git_http_url": "http://192.168.64.1:3005/gitlab-org/gitlab-test.git",
            "visibility_level": 20
          }
        }
        ', true));
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