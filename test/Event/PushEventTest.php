<?php
/**
 *
 * author Timo Reymann
 */

class PushEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\PushEvent
     */
    private $pushEvent;

    public function setUp()
    {
        $this->pushEvent = new \TimoReymann\GitlabWebhookLibrary\Event\PushEvent(json_decode(file_get_contents("./test/json/push_event.json"), true));
    }

    public function testUserMapping()
    {
        $this->assertEquals('John Smith', $this->pushEvent->getUserRealName());
        $this->assertEquals('jsmith', $this->pushEvent->getUserName());
        $this->assertEquals('john@example.com', $this->pushEvent->getUserEmail());
        $this->assertEquals(4, $this->pushEvent->getUserId());
        $this->assertEquals('https://s.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=8://s.gravatar.com/avatar/d4c74594d841139328695756648b6bd6?s=80', $this->pushEvent->getUserAvatar());
    }

    public function testProjectMapping()
    {
        $project = $this->pushEvent->getProject();

        $this->assertNotNull($project);
        $this->assertEquals(15, $project->getId());
    }

    public function testRepositoryMapping()
    {
        $repo = $this->pushEvent->getRepository();

        $this->assertEquals('Diaspora', $repo->getName());
        $this->assertEquals('git@example.com:mike/diaspora.git', $repo->getUrl());
        $this->assertEquals('', $repo->getDescription());
        $this->assertEquals('http://example.com/mike/diaspora', $repo->getHomepage());
    }

    public function testCommitsMapping() {
        $commits = $this->pushEvent->getCommits();

        $this->assertNotNull($commits);
        $this->assertEquals(2,count($commits));

        $firstCommit = $commits[0];

        $this->assertNotNull($firstCommit);
        $this->assertEquals('b6568db1bc1dcd7f8b4d5a946b0b91f9dacd7327',$firstCommit->getId());
    }
}