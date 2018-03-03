<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Build;
use TimoReymann\GitlabWebhookLibrary\Entity\File;
use TimoReymann\GitlabWebhookLibrary\Entity\User;
use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class PipelineEvent extends Event
{
    use ObjectAttributesTrait;
    use UserTrait;
    use CommitTrait;

    /**
     * @var Build[]
     */
    private $builds;

    /**
     * @return Build[]
     */
    public function getBuilds(): array
    {
        if ($this->builds == null) {
            $this->builds = [];
            $builds = $this->getRootAttribute("builds");

            for ($i = 0; $i < count($builds); $i++) {
                $b = $builds[$i];
                $this->builds[] = new Build(
                    $b['id'],
                    $b['stage'],
                    $b['name'],
                    $b['status'],
                    $b['created_at'],
                    $b['started_at'],
                    $b['finished_at'],
                    $b['when'],
                    $b['manual'],
                    new User($b['user']['name'], $b['user']['username'], (array_key_exists('avatar_url', $b['user'])) ? $b['user']['avatar_url'] : null,null),
                    $b['runner'],
                    new File($b['artifacts_file']['filename'], $b['artifacts_file']['size'])
                );
            }
        }
        return $this->builds;
    }


}