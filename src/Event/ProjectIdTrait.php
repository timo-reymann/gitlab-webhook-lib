<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait ProjectIdTrait
{
    /**
     * @return int
     */
    public function getProjectId()
    {
        return $this->getRootAttribute("project_id");
    }
}