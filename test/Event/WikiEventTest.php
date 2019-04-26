<?php
/**
 *
 * author Timo Reymann
 */

class WikiEventTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \TimoReymann\GitlabWebhookLibrary\Event\WikiEvent
     */
    private $wikiEvent;

    protected function setUp():void
    {
        $this->wikiEvent = new \TimoReymann\GitlabWebhookLibrary\Event\WikiEvent(json_decode('
        {
          "object_kind": "wiki_page",
          "user": {
            "name": "Administrator",
            "username": "root",
            "avatar_url": "http://www.gravatar.com/avatar/e64c7d89f26bd1972efa854d13d7dd61?s=80\u0026d=identicon"
          },
          "project": {
            "id": 1,
            "name": "awesome-project",
            "description": "This is awesome",
            "web_url": "http://example.com/root/awesome-project",
            "avatar_url": null,
            "git_ssh_url": "git@example.com:root/awesome-project.git",
            "git_http_url": "http://example.com/root/awesome-project.git",
            "namespace": "root",
            "visibility_level": 0,
            "path_with_namespace": "root/awesome-project",
            "default_branch": "master",
            "homepage": "http://example.com/root/awesome-project",
            "url": "git@example.com:root/awesome-project.git",
            "ssh_url": "git@example.com:root/awesome-project.git",
            "http_url": "http://example.com/root/awesome-project.git"
          },
          "wiki": {
            "web_url": "http://example.com/root/awesome-project/wikis/home",
            "git_ssh_url": "git@example.com:root/awesome-project.wiki.git",
            "git_http_url": "http://example.com/root/awesome-project.wiki.git",
            "path_with_namespace": "root/awesome-project.wiki",
            "default_branch": "master"
          },
          "object_attributes": {
            "title": "Awesome",
            "content": "awesome content goes here",
            "format": "markdown",
            "message": "adding an awesome page to the wiki",
            "slug": "awesome",
            "url": "http://example.com/root/awesome-project/wikis/awesome",
            "action": "create"
          }
        }
        ', true));
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