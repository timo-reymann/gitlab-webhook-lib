<?php
/**
 *
 * author Timo Reymann
 */

class PipelineEventTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent
     */
    private $pipelineEvent;

    public function setUp():void
    {
        $this->pipelineEvent = new \TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent(json_decode('
            {
              "object_kind": "pipeline",
              "object_attributes":{
                "id": 31,
                "ref": "master",
                "tag": false,
                "sha": "bcbb5ec396a2c0f828686f14fac9b80b780504f2",
                "before_sha": "bcbb5ec396a2c0f828686f14fac9b80b780504f2",
                "status": "success",
                "stages":[
                  "build",
                  "test",
                  "deploy"
                ],
                "created_at": "2016-08-12 15:23:28 UTC",
                "finished_at": "2016-08-12 15:26:29 UTC",
                "duration": 63
              },
              "user":{
                "name": "Administrator",
                "username": "root",
                "avatar_url": "http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80\u0026d=identicon"
              },
              "project":{
                "id": 1,
                "name": "Gitlab Test",
                "description": "Atque in sunt eos similique dolores voluptatem.",
                "web_url": "http://192.168.64.1:3005/gitlab-org/gitlab-test",
                "avatar_url": null,
                "git_ssh_url": "git@192.168.64.1:gitlab-org/gitlab-test.git",
                "git_http_url": "http://192.168.64.1:3005/gitlab-org/gitlab-test.git",
                "namespace": "Gitlab Org",
                "visibility_level": 20,
                "path_with_namespace": "gitlab-org/gitlab-test",
                "default_branch": "master"
              },
              "commit":{
                "id": "bcbb5ec396a2c0f828686f14fac9b80b780504f2",
                "message": "test\n",
                "timestamp": "2016-08-12T17:23:21+02:00",
                "url": "http://example.com/gitlab-org/gitlab-test/commit/bcbb5ec396a2c0f828686f14fac9b80b780504f2",
                "author":{
                  "name": "User",
                  "email": "user@gitlab.com"
                }
              },
              "builds":[
                {
                  "id": 380,
                  "stage": "deploy",
                  "name": "production",
                  "status": "skipped",
                  "created_at": "2016-08-12 15:23:28 UTC",
                  "started_at": null,
                  "finished_at": null,
                  "when": "manual",
                  "manual": true,
                  "user":{
                    "name": "Administrator",
                    "username": "root",
                    "avatar_url": "http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80\u0026d=identicon"
                  },
                  "runner": null,
                  "artifacts_file":{
                    "filename": null,
                    "size": null
                  }
                },
                {
                  "id": 377,
                  "stage": "test",
                  "name": "test-image",
                  "status": "success",
                  "created_at": "2016-08-12 15:23:28 UTC",
                  "started_at": "2016-08-12 15:26:12 UTC",
                  "finished_at": null,
                  "when": "on_success",
                  "manual": false,
                  "user":{
                    "name": "Administrator",
                    "username": "root",
                    "avatar_url": "http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80\u0026d=identicon"
                  },
                  "runner": null,
                  "artifacts_file":{
                    "filename": null,
                    "size": null
                  }
                },
                {
                  "id": 378,
                  "stage": "test",
                  "name": "test-build",
                  "status": "success",
                  "created_at": "2016-08-12 15:23:28 UTC",
                  "started_at": "2016-08-12 15:26:12 UTC",
                  "finished_at": "2016-08-12 15:26:29 UTC",
                  "when": "on_success",
                  "manual": false,
                  "user":{
                    "name": "Administrator",
                    "username": "root",
                    "avatar_url": "http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80\u0026d=identicon"
                  },
                  "runner": null,
                  "artifacts_file":{
                    "filename": null,
                    "size": null
                  }
                },
                {
                  "id": 376,
                  "stage": "build",
                  "name": "build-image",
                  "status": "success",
                  "created_at": "2016-08-12 15:23:28 UTC",
                  "started_at": "2016-08-12 15:24:56 UTC",
                  "finished_at": "2016-08-12 15:25:26 UTC",
                  "when": "on_success",
                  "manual": false,
                  "user":{
                    "name": "Administrator",
                    "username": "root",
                    "avatar_url": "http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80\u0026d=identicon"
                  },
                  "runner": null,
                  "artifacts_file":{
                    "filename": null,
                    "size": null
                  }
                },
                {
                  "id": 379,
                  "stage": "deploy",
                  "name": "staging",
                  "status": "created",
                  "created_at": "2016-08-12 15:23:28 UTC",
                  "started_at": null,
                  "finished_at": null,
                  "when": "on_success",
                  "manual": false,
                  "user":{
                    "name": "Administrator",
                    "username": "root",
                    "avatar_url": "http://www.gravatar.com/avatar/e32bd13e2add097461cb96824b7a829c?s=80\u0026d=identicon"
                  },
                  "runner": null,
                  "artifacts_file":{
                    "filename": null,
                    "size": null
                  }
                }
              ]
            }
        ', true));
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