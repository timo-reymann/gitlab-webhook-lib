<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class TagEvent extends Event
{
    use BeforeAfterTrait;
    use RefTrait;
    use CheckoutShaTrait;
    use UserIdAvatarAndNameTrait;
}