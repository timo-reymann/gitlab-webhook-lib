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
    public function __construct(array $updatedById, array $updatedAt, array $previousLabels, array $currentLabels)
    {
        $this->updatedById = $updatedById;
        $this->updatedAt = $updatedAt;
        $this->previousLabels = $previousLabels;
        $this->currentLabels = $currentLabels;
    }

    /**
     * @return int[]
     */
    public function getUpdatedById(): array
    {
        return $this->updatedById;
    }

    /**
     * @param int[] $updatedById
     */
    public function setUpdatedById(array $updatedById): void
    {
        $this->updatedById = $updatedById;
    }

    /**
     * @return string[]
     */
    public function getUpdatedAt(): array
    {
        return $this->updatedAt;
    }

    /**
     * @param string[] $updatedAt
     */
    public function setUpdatedAt(array $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return Label[]
     */
    public function getPreviousLabels(): array
    {
        return $this->previousLabels;
    }

    /**
     * @param Label[] $previousLabels
     */
    public function setPreviousLabels(array $previousLabels): void
    {
        $this->previousLabels = $previousLabels;
    }

    /**
     * @return Label[]
     */
    public function getCurrentLabels(): array
    {
        return $this->currentLabels;
    }

    /**
     * @param Label[] $currentLabels
     */
    public function setCurrentLabels(array $currentLabels): void
    {
        $this->currentLabels = $currentLabels;
    }


}