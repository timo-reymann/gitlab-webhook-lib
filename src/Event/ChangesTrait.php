<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Changes;

trait ChangesTrait
{
    /**
     * @var Changes
     */
    private $changes = null;

    /**
     * @return Changes
     */
    public function getChanges(): Changes
    {
        if ($this->changes == null) {
            $change = $this->getRootAttribute("changes");
            $this->changes = new Changes(
                $change['updated_by_id'], $change['updated_at'], $this->processLabels($change['labels']['previous']), $this->processLabels($change['labels']['current'])
            );
        }

        return $this->changes;
    }
}