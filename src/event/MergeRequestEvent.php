<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Author;
use TimoReymann\GitlabWebhookLibrary\Entity\Commit;
use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class MergeRequestEvent extends Event
{
    use ObjectAttributesTrait;
    use UserTrait;
    use ProcessLabelTrait;
    use ChangesTrait;
    use LabelsTrait;

    /**
     * @var Commit
     */
    private $lastCommit = null;

    /**
     * Get target for merge request
     * @return string[] associate array
     */
    public function getTarget()
    {
        return $this->getRootAttribute("target");
    }

    public function getLastCommit()
    {
        if ($this->lastCommit == null) {
            $commit = $this->getRootAttribute("commit");

            $this->lastCommit = new Commit(
                $commit['id'],
                $commit['message'],
                $commit['timestamp'],
                $commit['url'],
                new Author($commit['author']['name'], $commit['author']['email']),
                [],
                [],
                []
            );
        }

        return $this->lastCommit;
    }
}