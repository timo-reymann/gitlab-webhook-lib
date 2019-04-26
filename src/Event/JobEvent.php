<?php

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class JobEvent extends Event
{
    use CommitTrait;
    use ProjectIdTrait;
    use RefTrait;
    use UserTrait;

    /**
     * @return int
     */
    public function getJobId()
    {
        return $this->getRootAttribute("job_id");
    }

    /**
     * @return string
     */
    public function getJobStage()
    {
        return $this->getRootAttribute("job_stage");
    }

    /**
     * @return string
     */
    public function getJobName()
    {
        return $this->getRootAttribute("job_name");
    }

    /**
     * @return string|null
     */
    public function getJobStatus()
    {
        return $this->getRootAttribute("job_status");
    }

    /**
     * @return string|null
     */
    public function getJobStartedAt()
    {
        return $this->getRootAttribute("job_started_at");
    }

    /**
     * @return string|null
     */
    public function getJobFinishedAt()
    {
        return $this->getRootAttribute("job_finished_at");
    }

    /**
     * @return string|null
     */
    public function getJobDuration()
    {
        return $this->getRootAttribute("job_duration");
    }

    /**
     * @return bool
     */
    public function getJobAllowFailure()
    {
        return $this->getRootAttribute("job_allow_failure");
    }

}