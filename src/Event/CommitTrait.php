<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Author;
use TimoReymann\GitlabWebhookLibrary\Entity\Commit;

trait CommitTrait
{
    /**
     * @var Commit|null
     */
    private $commit = null;

    /**
     * Information about commit or null if not for commit
     * For more information please visit:
     * https://docs.gitlab.com/ce/user/project/integrations/webhooks.html#comment-on-commit
     * @return null|Commit
     */
    public function getCommit()
    {
        if ($this->commit == null && array_key_exists('commit', $this->getData())) {
            $c = $this->getRootAttribute("commit");
            $this->commit = new Commit(
                $c['id'],
                $c['message'],
                array_key_exists('timestamp', $c) ? $c['timestamp'] : null,
                array_key_exists('url', $c) ? $c['url'] : null,
                array_key_exists('author', $c)  ? new Author($c['author']['name'], $c['author']['email']) : null,
                [],
                [],
                []
            );
        }
        return $this->commit;
    }
}