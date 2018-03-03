<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Repository
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var  string
     */
    private $url;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $homepage;

    /**
     * @var string
     */
    private $git_http_url;

    /**
     * @var string
     */
    private $git_ssh_url;

    /**
     * @var string
     */
    private $visibility_level;

    /**
     * Repository constructor.
     * @param string $name
     * @param string $url
     * @param string $description
     * @param string $homepage
     * @param string $git_http_url
     * @param string $git_ssh_url
     * @param string $visibility_level
     */
    public function __construct(string $name, string $url, string $description, string $homepage, string $git_http_url, string $git_ssh_url, string $visibility_level)
    {
        $this->name = $name;
        $this->url = $url;
        $this->description = $description;
        $this->homepage = $homepage;
        $this->git_http_url = $git_http_url;
        $this->git_ssh_url = $git_ssh_url;
        $this->visibility_level = $visibility_level;
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
    public function getUrl(): string
    {
        return $this->url;
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
    public function getHomepage(): string
    {
        return $this->homepage;
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
    public function getGitSshUrl(): string
    {
        return $this->git_ssh_url;
    }

    /**
     * @return string
     */
    public function getVisibilityLevel(): string
    {
        return $this->visibility_level;
    }


}