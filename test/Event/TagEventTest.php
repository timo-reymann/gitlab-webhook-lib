<?php
/**
 *
 * author Timo Reymann
 */

class TagEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\TagEvent
     */
    private $tagEvent;

    public function setUp()
    {
        $this->tagEvent = new \TimoReymann\GitlabWebhookLibrary\Event\TagEvent(json_decode(file_get_contents("./test/json/tag_event.json"), true));
    }

    public function testProjectMapping()
    {
        $project = $this->tagEvent->getProject();

        $this->assertNotNull($project);
        $this->assertEquals(1, $project->getId());
    }

    public function testRepositoryMapping()
    {
        $repo = $this->tagEvent->getRepository();

        $this->assertEquals('Example', $repo->getName());
        $this->assertEquals('ssh://git@example.com/jsmith/example.git', $repo->getUrl());
        $this->assertEquals('', $repo->getDescription());
        $this->assertEquals('http://example.com/jsmith/example', $repo->getHomepage());
    }
}