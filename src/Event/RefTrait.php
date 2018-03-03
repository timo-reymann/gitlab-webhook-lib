<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait RefTrait
{
    /**
     * @return string Get git ref for event
     */
    public function getRef()
    {
        return $this->getRootAttribute("ref");
    }
}