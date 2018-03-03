<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Author;
use TimoReymann\GitlabWebhookLibrary\Entity\Commit;
use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class PushEvent extends Event
{
    use BeforeAfterTrait;
    use RefTrait;
    use CheckoutShaTrait;
    use UserIdAvatarAndNameTrait;
    use ProjectIdTrait;

    /**
     * @var Commit[]
     */
    private $commits = null;

    /**
     * @return array|Commit[]
     */
    public function getCommits()
    {
        if ($this->commits == null) {
            $this->commits = [];

            $rawCommits = $this->getRootAttribute("commits");

            for ($i = 0; $i < count($rawCommits); $i++) {
                $c = $rawCommits[$i];

                $this->commits[] = new Commit(
                    $c['id'],
                    $c['message'],
                    $c['timestamp'],
                    $c['url'],
                    new Author($c['author']['name'], $c['author']['email']),
                    $c['added'],
                    $c['modified'],
                    $c['removed']
                );
            }
        }

        return $this->commits;
    }

    /**
     * @return int Number of total commits
     */
    public function getTotalCommitCount()
    {
        return $this->getRootAttribute("total_commits_count");
    }

    /**
     * @return string
     */
    public function getUserEmail()
    {
        return $this->getRootAttribute("user_email");
    }
}