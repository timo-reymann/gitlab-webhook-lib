<?php
/**
 *
 * author Timo Reymann
 */

class CommentEventTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\CommentEvent
     */
    private $commentEvent;

    public function setUp(): void
    {
        $this->commentEvent = new \TimoReymann\GitlabWebhookLibrary\Event\CommentEvent(json_decode('
        {
          "object_kind": "note",
          "user": {
            "name": "Administrator",
            "username": "root",
            "avatar_url": "http://www.gravatar.com/avatar/e64c7d89f26bd1972efa854d13d7dd61?s=40\u0026d=identicon"
          },
          "project_id": 5,
          "project":{
            "id": 5,
            "name":"Gitlab Test",
            "description":"Aut reprehenderit ut est.",
            "web_url":"http://example.com/gitlabhq/gitlab-test",
            "avatar_url":null,
            "git_ssh_url":"git@example.com:gitlabhq/gitlab-test.git",
            "git_http_url":"http://example.com/gitlabhq/gitlab-test.git",
            "namespace":"GitlabHQ",
            "visibility_level":20,
            "path_with_namespace":"gitlabhq/gitlab-test",
            "default_branch":"master",
            "homepage":"http://example.com/gitlabhq/gitlab-test",
            "url":"http://example.com/gitlabhq/gitlab-test.git",
            "ssh_url":"git@example.com:gitlabhq/gitlab-test.git",
            "http_url":"http://example.com/gitlabhq/gitlab-test.git"
          },
          "repository":{
            "name": "Gitlab Test",
            "url": "http://example.com/gitlab-org/gitlab-test.git",
            "description": "Aut reprehenderit ut est.",
            "homepage": "http://example.com/gitlab-org/gitlab-test"
          },
          "object_attributes": {
            "id": 1243,
            "note": "This is a commit comment. How does this work?",
            "noteable_type": "Commit",
            "author_id": 1,
            "created_at": "2015-05-17 18:08:09 UTC",
            "updated_at": "2015-05-17 18:08:09 UTC",
            "project_id": 5,
            "attachment":null,
            "line_code": "bec9703f7a456cd2b4ab5fb3220ae016e3e394e3_0_1",
            "commit_id": "cfe32cf61b73a0d5e9f13e774abde7ff789b1660",
            "noteable_id": null,
            "system": false,
            "st_diff": {
              "diff": "--- /dev/null\n+++ b/six\n@@ -0,0 +1 @@\n+Subproject commit 409f37c4f05865e4fb208c771485f211a22c4c2d\n",
              "new_path": "six",
              "old_path": "six",
              "a_mode": "0",
              "b_mode": "160000",
              "new_file": true,
              "renamed_file": false,
              "deleted_file": false
            },
            "url": "http://example.com/gitlab-org/gitlab-test/commit/cfe32cf61b73a0d5e9f13e774abde7ff789b1660#note_1243"
          },
          "commit": {
            "id": "cfe32cf61b73a0d5e9f13e774abde7ff789b1660",
            "message": "Add submodule\n\nSigned-off-by: Dmitriy Zaporozhets \u003cdmitriy.zaporozhets@gmail.com\u003e\n",
            "timestamp": "2014-02-27T10:06:20+02:00",
            "url": "http://example.com/gitlab-org/gitlab-test/commit/cfe32cf61b73a0d5e9f13e774abde7ff789b1660",
            "author": {
              "name": "Dmitriy Zaporozhets",
              "email": "dmitriy.zaporozhets@gmail.com"
            }
          }
        }
        ', true));
    }

    public function testProjectIdMapping()
    {
        $this->assertEquals(5, $this->commentEvent->getProjectId());
    }

    public function testProjectMapping()
    {
        $project = $this->commentEvent->getProject();

        $this->assertNotNull($project);
        $this->assertEquals(5, $project->getId());
        $this->assertEquals('Aut reprehenderit ut est.', $project->getDescription());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test', $project->getWebUrl());
        $this->assertNull($project->getAvatarUrl());
        $this->assertEquals('git@example.com:gitlabhq/gitlab-test.git', $project->getGitSshUrl());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $project->getGitHttpUrl());
        $this->assertEquals('GitlabHQ', $project->getNamespace());
        $this->assertEquals(20, $project->getVisibilityLevel());
        $this->assertEquals('gitlabhq/gitlab-test', $project->getPathWithNamespace());
        $this->assertEquals('master', $project->getDefaultBranch());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test', $project->getHomepage());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $project->getUrl());
        $this->assertEquals('git@example.com:gitlabhq/gitlab-test.git', $project->getSshUrl());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $project->getHttpUrl());
    }

    public function testRepositoryMapping()
    {
        $repo = $this->commentEvent->getRepository();

        self::assertNotNull($repo);
        $this->assertEquals('Gitlab Test', $repo->getName());
        $this->assertEquals('http://example.com/gitlab-org/gitlab-test.git', $repo->getUrl());
        $this->assertEquals('Aut reprehenderit ut est.', $repo->getDescription());
        $this->assertEquals('http://example.com/gitlab-org/gitlab-test', $repo->getHomepage());
    }

    public function testObjectAttributesMapping()
    {
        $metaData = $this->commentEvent->getObjectAttributes();

        $this->assertNotNull($metaData);
        $this->assertEquals(1243, $metaData['id']);
    }

    public function testCommitMapping()
    {
        $commit = $this->commentEvent->getCommit();

        $this->assertNotNull($commit);
        $this->assertEquals('cfe32cf61b73a0d5e9f13e774abde7ff789b1660', $commit->getId());
        $this->assertNotNull($commit->getMessage());
        $this->assertEquals('http://example.com/gitlab-org/gitlab-test/commit/cfe32cf61b73a0d5e9f13e774abde7ff789b1660', $commit->getUrl());

        $author = $commit->getAuthor();

        $this->assertNotNull($author);
        $this->assertEquals('Dmitriy Zaporozhets', $author->getName());
        $this->assertEquals('dmitriy.zaporozhets@gmail.com', $author->getEmail());
    }

    public function testOptionalMergeRequest()
    {
        $this->assertNull($this->commentEvent->getMergeRequest());
    }

    public function testOptionalIssue()
    {
        $this->assertNull($this->commentEvent->getIssue());
    }

    public function testOptionalSnippet()
    {
        $this->assertNull($this->commentEvent->getSnippet());
    }
}