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
    public function __construct($id, $name, $description, $web_url, $avatar_url, $git_ssh_url, $git_http_url, $namespace, $visibility_level, $path_with_namespace, $default_branch, $homepage, $url, $ssh_url, $http_url)
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
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getWebUrl()
    {
        return $this->web_url;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatar_url;
    }

    /**
     * @return string
     */
    public function getGitSshUrl()
    {
        return $this->git_ssh_url;
    }

    /**
     * @return string
     */
    public function getGitHttpUrl()
    {
        return $this->git_http_url;
    }

    /**
     * @return string
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * @return int
     */
    public function getVisibilityLevel()
    {
        return $this->visibility_level;
    }

    /**
     * @return string
     */
    public function getPathWithNamespace()
    {
        return $this->path_with_namespace;
    }

    /**
     * @return string
     */
    public function getDefaultBranch()
    {
        return $this->default_branch;
    }

    /**
     * @return string
     */
    public function getHomepage()
    {
        return $this->homepage;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getSshUrl()
    {
        return $this->ssh_url;
    }

    /**
     * @return string
     */
    public function getHttpUrl()
    {
        return $this->http_url;
    }


}