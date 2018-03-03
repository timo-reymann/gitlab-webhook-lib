<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Project
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $web_url;

    /**
     * @var string
     */
    private $avatar_url;

    /**
     * @var string
     */
    private $git_ssh_url;

    /**
     * @var string
     */
    private $git_http_url;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var int
     */
    private $visibility_level;

    /**
     * @var string
     */
    private $path_with_namespace;

    /**
     * @var string
     */
    private $default_branch;

    /**
     * @var string
     */
    private $homepage;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $ssh_url;

    /**
     * @var string
     */
    private $http_url;

    /**
     * Project constructor.
     * @param int $id
     * @param string $name
     * @param string $description
     * @param string $web_url
     * @param string $avatar_url
     * @param string $git_ssh_url
     * @param string $git_http_url
     * @param string $namespace
     * @param int $visibility_level
     * @param string $path_with_namespace
     * @param string $default_branch
     * @param string $homepage
     * @param string $url
     * @param string $ssh_url
     * @param string $http_url
     */
    public function __construct(int $id, string $name, string $description, string $web_url, string $avatar_url, string $git_ssh_url, string $git_http_url, string $namespace, int $visibility_level, string $path_with_namespace, string $default_branch, string $homepage, string $url, string $ssh_url, string $http_url)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->web_url = $web_url;
        $this->avatar_url = $avatar_url;
        $this->git_ssh_url = $git_ssh_url;
        $this->git_http_url = $git_http_url;
        $this->namespace = $namespace;
        $this->visibility_level = $visibility_level;
        $this->path_with_namespace = $path_with_namespace;
        $this->default_branch = $default_branch;
        $this->homepage = $homepage;
        $this->url = $url;
        $this->ssh_url = $ssh_url;
        $this->http_url = $http_url;
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
    public function getName(): string
    {
        return $this->name;
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
    public function getWebUrl(): string
    {
        return $this->web_url;
    }

    /**
     * @return string
     */
    public function getAvatarUrl(): string
    {
        return $this->avatar_url;
    }

    /**
     * @return string
     */
    public function getGitSshUrl(): string
    {
        return $this->git_ssh_url;
    }

    /**
     * @return string
     */
    public function getGitHttpUrl(): string
    {
        return $this->git_http_url;
    }

    /**
     * @return string
     */
    public function getNamespace(): string
    {
        return $this->namespace;
    }

    /**
     * @return int
     */
    public function getVisibilityLevel(): int
    {
        return $this->visibility_level;
    }

    /**
     * @return string
     */
    public function getPathWithNamespace(): string
    {
        return $this->path_with_namespace;
    }

    /**
     * @return string
     */
    public function getDefaultBranch(): string
    {
        return $this->default_branch;
    }

    /**
     * @return string
     */
    public function getHomepage(): string
    {
        return $this->homepage;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getSshUrl(): string
    {
        return $this->ssh_url;
    }

    /**
     * @return string
     */
    public function getHttpUrl(): string
    {
        return $this->http_url;
    }


}