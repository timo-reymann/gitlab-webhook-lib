<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class BuildEvent extends Event
{
    use CommitTrait;
    use ProjectIdTrait;
    use RefTrait;
    use UserTrait;

    /**
     * @return int
     */
    public function getBuildId()
    {
        return $this->getRootAttribute("build_id");
    }

    /**
     * @return string
     */
    public function getBuildStage()
    {
        return $this->getRootAttribute("build_stage");
    }

    /**
     * @return string
     */
    public function getBuildName()
    {
        return $this->getRootAttribute("build_name");
    }

    /**
     * @return string|null
     */
    public function getBuildStatus()
    {
        return $this->getRootAttribute("build_status");
    }

    /**
     * @return string|null
     */
    public function getBuildStartedAt()
    {
        return $this->getRootAttribute("build_started_at");
    }

    /**
     * @return string|null
     */
    public function getBuildFinishedAt()
    {
        return $this->getRootAttribute("build_finished_at");
    }

    /**
     * @return string|null
     */
    public function getBuildDuration()
    {
        return $this->getRootAttribute("build_duration");
    }

    /**
     * @return bool
     */
    public function getBuildAllowFailure()
    {
        return $this->getRootAttribute("build_allow_failure");
    }

}