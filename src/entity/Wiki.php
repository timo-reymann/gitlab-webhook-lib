<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Wiki
{
    /**
     * @var string
     */
    private $web_url;

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
    private $path_with_namespace;

    /**
     * @var string
     */
    private $default_branch;

    /**
     * Wiki constructor.
     * @param string $web_url
     * @param string $git_ssh_url
     * @param string $git_http_url
     * @param string $path_with_namespace
     * @param string $default_branch
     */
    public function __construct(string $web_url, string $git_ssh_url, string $git_http_url, string $path_with_namespace, string $default_branch)
    {
        $this->web_url = $web_url;
        $this->git_ssh_url = $git_ssh_url;
        $this->git_http_url = $git_http_url;
        $this->path_with_namespace = $path_with_namespace;
        $this->default_branch = $default_branch;
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


}