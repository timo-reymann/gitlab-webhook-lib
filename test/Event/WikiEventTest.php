<?php
/**
 *
 * author Timo Reymann
 */

class WikiEventTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\WikiEvent
     */
    private $wikiEvent;

    protected function setUp()
    {
        $this->wikiEvent = new \TimoReymann\GitlabWebhookLibrary\Event\WikiEvent(json_decode(file_get_contents("./test/json/wiki_event.json"), true));
    }

    public function testProjectMapping()
    {
        $project = $this->wikiEvent->getProject();

        $this->assertNotNull($project);
        $this->assertEquals(1, $project->getId());
    }

    public function testObjectAttributesMapping()
    {
        $meta = $this->wikiEvent->getObjectAttributes();

        $this->assertNotNull($meta);
        $this->assertEquals("Awesome", $meta['title']);
    }

    public function testWikiMapping()
    {
        $wiki = $this->wikiEvent->getWiki();

        $this->assertNotNull($wiki);
        $this->assertEquals('http://example.com/root/awesome-project/wikis/home', $wiki->getWebUrl());
        $this->assertEquals('git@example.com:root/awesome-project.wiki.git', $wiki->getGitSshUrl());
        $this->assertEquals('http://example.com/root/awesome-project.wiki.git', $wiki->getGitHttpUrl());
        $this->assertEquals('root/awesome-project.wiki', $wiki->getPathWithNamespace());
        $this->assertEquals('master', $wiki->getDefaultBranch());
    }
}