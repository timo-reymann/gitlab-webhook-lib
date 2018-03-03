<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait ObjectAttributesTrait
{
    /**
     * @return array[string] Object attributes as associative array, for more information see:
     *                       https://docs.gitlab.com/ce/user/project/integrations/webhooks.html#push-events
     */
    public function getObjectAttributes()
    {
        return $this->getRootAttribute("object_attributes");
    }
}