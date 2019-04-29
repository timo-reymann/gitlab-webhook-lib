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
}