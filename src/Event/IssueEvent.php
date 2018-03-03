<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;

use TimoReymann\GitlabWebhookLibrary\Entity\User;
use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class IssueEvent extends Event
{
    use UserTrait;
    use ObjectAttributesTrait;
    use AssigneeTrait;
    use ProcessLabelTrait;
    use ChangesTrait;
    use LabelsTrait;


    /**
     * @var User[]
     */
    private $assignees;

    /**
     * @return User[]
     */
    public function getAssignees()
    {
        if ($this->assignees == null) {
            $assignees = $this->getRootAttribute("assignees");
            $this->assignees = [];

            for ($i = 0; $i < count($assignees); $i++) {
                $a = $assignees[$i];

                $this->assignees[] = new User(
                    $a['name'],
                    $a['username'],
                    $a['avatar_url']
                );
            }

        }
        return $this->assignees;
    }
}