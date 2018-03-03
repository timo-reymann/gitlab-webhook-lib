<?php
/**
 *
 * author Timo Reymann
 */

class MergeRequestEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\MergeRequestEvent
     */
    private $mergeRequestEvent;

    protected function setUp()
    {
        $this->mergeRequestEvent = new \TimoReymann\GitlabWebhookLibrary\Event\MergeRequestEvent(json_decode(file_get_contents("./test/json/merge_request_event.json"), true));
    }

    public function testObjectAttributesMapping()
    {
        $this->assertNotNull($this->mergeRequestEvent->getObjectAttributes());
    }

    public function testProjectMapping()
    {
        $project = $this->mergeRequestEvent->getProject();

        $this->assertNotNull($project);
        $this->assertEquals(1, $project->getId());
    }

    public function testChangesMapping()
    {
        $changes = $this->mergeRequestEvent->getChanges();

        $this->assertNotNull($changes);
        $this->assertEquals(2, count($changes->getUpdatedById()));
        $this->assertNull($changes->getUpdatedById()[0]);

        $this->assertEquals(2, count($changes->getUpdatedAt()));
        $this->assertNotNull($changes->getUpdatedAt()[0]);

        $this->assertEquals(1, count($changes->getCurrentLabels()));

        $this->assertEquals(1, count($changes->getPreviousLabels()));
    }
}