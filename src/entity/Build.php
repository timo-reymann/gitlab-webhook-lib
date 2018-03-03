<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Build
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $stage;

    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $status;

    /**
     * @var string
     */
    private $created_at;

    /**
     * @var string
     */
    private $started_at;

    /**
     * @var string|null
     */
    private $finished_at;

    /**
     * @var string
     */
    private $when;

    /**
     * @var bool
     */
    private $manual;

    /**
     * @var User
     */
    private $user;

    /**
     * @var string|null
     */
    private $runner;
    /**
     * @var File
     */
    private $artifacts_file;

    /**
     * Build constructor.
     * @param int $id
     * @param string $stage
     * @param string $name
     * @param string $status
     * @param string $created_at
     * @param string $started_at
     * @param null|string $finished_at
     * @param string $when
     * @param bool $manual
     * @param User $user
     * @param null|string $runner
     * @param $artifacts_file
     */
    public function __construct(int $id, string $stage, string $name, string $status, string $created_at, string $started_at, ?string $finished_at, string $when, bool $manual, User $user, $runner, $artifacts_file)
    {
        $this->id = $id;
        $this->stage = $stage;
        $this->name = $name;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->started_at = $started_at;
        $this->finished_at = $finished_at;
        $this->when = $when;
        $this->manual = $manual;
        $this->user = $user;
        $this->runner = $runner;
        $this->artifacts_file = $artifacts_file;
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
    public function getStage(): string
    {
        return $this->stage;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @return string
     */
    public function getStartedAt(): string
    {
        return $this->started_at;
    }

    /**
     * @return null|string
     */
    public function getFinishedAt(): ?string
    {
        return $this->finished_at;
    }

    /**
     * @return string
     */
    public function getWhen(): string
    {
        return $this->when;
    }

    /**
     * @return bool
     */
    public function isManual(): bool
    {
        return $this->manual;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @return null|string
     */
    public function getRunner(): ?string
    {
        return $this->runner;
    }

    /**
     * @return mixed
     */
    public function getArtifactsfile()
    {
        return $this->artifacts_file;
    }


}