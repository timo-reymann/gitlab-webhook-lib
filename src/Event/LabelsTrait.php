<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\Label;

trait LabelsTrait
{
    /**
     * @var Label[]
     */
    private $labels = null;

    /**
     * @return Label[]
     */
    public function getLabels(): array
    {
        if ($this->labels == null) {
            $this->labels = $this->processLabels($this->getRootAttribute("labels"));
        }

        return $this->labels;
    }

}