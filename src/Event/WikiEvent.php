<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Wiki;
use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class WikiEvent extends Event
{
    use UserTrait;
    use ObjectAttributesTrait;

    /**
     * @var Wiki
     */
    private $wiki = null;

    /**
     * @return Wiki
     */
    public function getWiki(): Wiki
    {
        if ($this->wiki == null) {
            $w = $this->getRootAttribute("wiki");
            $this->wiki = new Wiki(
                $w['web_url'],
                $w['git_ssh_url'],
                $w['git_http_url'],
                $w['path_with_namespace'],
                $w['default_branch']
            );
        }

        return $this->wiki;
    }
}