<?php
/**
 *
 * author Timo Reymann
 */

class CommentEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\CommentEvent
     */
    private  $commentEvent;

    public  function setUp()
    {
        $this->commentEvent = new \TimoReymann\GitlabWebhookLibrary\Event\CommentEvent(json_decode(file_get_contents("./test/json/comment_event.json"), true));
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