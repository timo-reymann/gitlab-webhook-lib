<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Label
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $color;

    /**
     * @var string
     */
    private $projectId;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * @var string
     */
    private $updatedAt;

    /**
     * @var bool
     */
    private $template;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $type;

    /**
     * @var int
     */
    private $groupId;

    /**
     * Label constructor.
     * @param int $id
     * @param string $title
     * @param string $color
     * @param string $projectId
     * @param string $createdAt
     * @param string $updatedAt
     * @param bool $template
     * @param string $description
     * @param string $type
     * @param int $groupId
     */
    public function __construct(int $id, string $title, string $color, string $projectId, string $createdAt, string $updatedAt, bool $template, string $description, string $type, int $groupId)
    {
        $this->id = $id;
        $this->title = $title;
        $this->color = $color;
        $this->projectId = $projectId;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->template = $template;
        $this->description = $description;
        $this->type = $type;
        $this->groupId = $groupId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getColor(): string
    {
        return $this->color;
    }

    /**
     * @return string
     */
    public function getProjectId(): string
    {
        return $this->projectId;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updatedAt;
    }

    /**
     * @return bool
     */
    public function isTemplate(): bool
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getGroupId(): int
    {
        return $this->groupId;
    }


}