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
    use ProcessLabelTrait;
    use ChangesTrait;
    use LabelsTrait;

}