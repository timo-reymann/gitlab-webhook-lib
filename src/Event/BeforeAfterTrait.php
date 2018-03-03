<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait BeforeAfterTrait
{
    /**
     * @return string Previous hash
     */
    public function getBefore()
    {
        return $this->getRootAttribute("before");
    }

    /**
     * @return mixed Next hash
     */
    public function getAfter()
    {
        return $this->getRootAttribute("after");
    }
}