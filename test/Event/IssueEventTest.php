<?php
/**
 *
 * author Timo Reymann
 */

class IssueEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\IssueEvent
     */
    private $issueEvent;

    protected function setUp()
    {
        $this->issueEvent = new \TimoReymann\GitlabWebhookLibrary\Event\IssueEvent(json_decode(file_get_contents("./test/json/issue_event.json"), true));
    }

    public function testUserMapping()
    {
        $this->assertEquals('Administrator', $this->issueEvent->getUser()->getName());
        $this->assertNull($this->issueEvent->getUser()->getEmail());
        $this->assertEquals('http://www.gravatar.com/avatar/e64c7d89f26bd1972efa854d13d7dd61?s=40&d=identicon', $this->issueEvent->getUser()->getAvatarUrl());
    }

    public function testProjectMapping()
    {
        $project = $this->issueEvent->getProject();

        $this->assertNotNull($project);

        $this->assertEquals('Gitlab Test', $project->getName());
        $this->assertEquals('Aut reprehenderit ut est.', $project->getDescription());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test', $project->getWebUrl());
        $this->assertNull($project->getAvatarUrl());
        $this->assertEquals('git@example.com:gitlabhq/gitlab-test.git', $project->getGitSshUrl());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $project->getHttpUrl());
        $this->assertEquals('GitlabHQ', $project->getNamespace());
        $this->assertEquals(20, $project->getVisibilityLevel());
        $this->assertEquals('GitlabHQ', $project->getNamespace());
        $this->assertEquals('master', $project->getDefaultBranch());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test', $project->getHomepage());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $project->getUrl());
        $this->assertEquals('git@example.com:gitlabhq/gitlab-test.git', $project->getSshUrl());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $project->getHttpUrl());
    }

    public function testRepositoryMapping()
    {
        $repo = $this->issueEvent->getRepository();

        $this->assertEquals('Gitlab Test', $repo->getName());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test.git', $repo->getUrl());
        $this->assertEquals('Aut reprehenderit ut est.', $repo->getDescription());
        $this->assertEquals('http://example.com/gitlabhq/gitlab-test', $repo->getHomepage());
    }

    public function testObjectAttributeMapping()
    {
        $meta = $this->issueEvent->getObjectAttributes();

        $this->assertNotNull($meta);
        $this->assertEquals(99, $meta['id']);
    }

    public function testLabelsMapping()
    {
        $labels = $this->issueEvent->getLabels();

        $this->assertNotNull($labels);
        $this->assertEquals(1, count($labels));

        $label = $labels[0];

        $this->assertEquals(206, $label->getId());
        $this->assertEquals('API', $label->getTitle());
        $this->assertEquals('#ffffff', $label->getColor());
        $this->assertEquals(14, $label->getProjectId());
        $this->assertEquals('2013-12-03T17:15:43Z', $label->getCreatedAt());
        $this->assertEquals('2013-12-03T17:15:43Z', $label->getUpdatedAt());
        $this->assertEquals(false, $label->isTemplate());
        $this->assertEquals('API related issues', $label->getDescription());
        $this->assertEquals('ProjectLabel', $label->getType());
        $this->assertEquals(41, $label->getGroupId());
    }

    public function testChangesMapping()
    {
        $changes = $this->issueEvent->getChanges();

        $this->assertNotNull($changes);
        $this->assertEquals(2, count($changes->getUpdatedById()));
        $this->assertNull($changes->getUpdatedById()[0]);

        $this->assertEquals(2, count($changes->getUpdatedAt()));
        $this->assertNotNull($changes->getUpdatedAt()[0]);

        $this->assertEquals(1, count($changes->getCurrentLabels()));

        $this->assertEquals(1, count($changes->getPreviousLabels()));

    }

}