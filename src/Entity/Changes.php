<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Changes
{
    /**
     * @var int[]
     */
    private $updatedById;

    /**
     * @var string[]
     */
    private $updatedAt;

    /**
     * @var Label[]
     */
    private $previousLabels;

    /**
     * @var Label[]
     */
    private $currentLabels;

    /**
     * Changes constructor.
     * @param int[] $updatedById
     * @param string[] $updatedAt
     * @param Label[] $previousLabels
     * @param Label[] $currentLabels
     */
    public function __construct($updatedById, $updatedAt, $previousLabels, $currentLabels)
    {
        $this->updatedById = $updatedById;
        $this->updatedAt = $updatedAt;
        $this->previousLabels = $previousLabels;
        $this->currentLabels = $currentLabels;
    }

    /**
     * @return int[]
     */
    public function getUpdatedById()
    {
        return $this->updatedById;
    }

    /**
     * @param int[] $updatedById
     */
    public function setUpdatedById($updatedById)
    {
        $this->updatedById = $updatedById;
    }

    /**
     * @return string[]
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string[] $updatedAt
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Label[]
     */
    public function getPreviousLabels()
    {
        return $this->previousLabels;
    }

    /**
     * @param Label[] $previousLabels
     */
    public function setPreviousLabels($previousLabels)
    {
        $this->previousLabels = $previousLabels;
    }

    /**
     * @return Label[]
     */
    public function getCurrentLabels()
    {
        return $this->currentLabels;
    }

    /**
     * @param Label[] $currentLabels
     */
    public function setCurrentLabels($currentLabels)
    {
        $this->currentLabels = $currentLabels;
    }


}