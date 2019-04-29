<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Specification;


use TimoReymann\GitlabWebhookLibrary\Entity\Project;
use TimoReymann\GitlabWebhookLibrary\Entity\Repository;

abstract class Event
{
    /**
     * @var array Raw data
     */
    private $data;

    /**
     * @var Repository
     */
    private $repository = null;

    /**
     * @var Project
     */
    private $project = null;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    protected function getData()
    {
        return $this->data;
    }

    /**
     * @return string Kind of object wrapped into PHP object
     */
    public function getObjectKind()
    {
        return $this->data['object_kind'];
    }

    /**
     * @param $name string Index for data in array
     * @return mixed Value
     */
    protected function getRootAttribute($name)
    {
        return (array_key_exists($name, $this->data)) ? $this->data[$name] : null;
    }

    /**
     * @return Repository
     */
    public function getRepository(): Repository
    {
        if ($this->repository == null) {
            $data = $this->data["repository"];
            $this->repository = new Repository(
                $data['name'],
                array_key_exists('url', $data) ? $data['url'] : null,
                $data['description'],
                $data['homepage'],
                array_key_exists('git_http_url', $data) ? $data['git_http_url'] : null,
                array_key_exists('git_ssh_url', $data) ? $data['git_ssh_url'] : null,
                array_key_exists('visibility_level', $data) ? $data['visibility_level'] : null
            );
        }

        return $this->repository;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        if ($this->project == null && array_key_exists('project', $this->data)) {
            $data = $this->data["project"];
            $this->project = new Project(
                $data['id'],
                $data['name'],
                $data['description'],
                $data['web_url'],
                $data['avatar_url'],
                $data['git_ssh_url'],
                $data['git_http_url'],
                $data['namespace'],
                $data['visibility_level'],
                $data['path_with_namespace'],
                $data['default_branch'],
                array_key_exists('homepage', $data) ? $data['homepage'] : null,
                array_key_exists('url', $data) ? $data['url'] : null,
                array_key_exists('ssh_url', $data) ? $data['ssh_url'] : null,
                array_key_exists('http_url', $data) ? $data['http_url'] : null
            );
        }

        return $this->project;
    }
}