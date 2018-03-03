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

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    protected function getData(): array
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
                $data['url'],
                $data['description'],
                $data['homepage'],
                $data['git_http_url'],
                $data['git_ssh_url'],
                $data['visibility_level']
            );
        }

        return $this->repository;
    }

    /**
     * @return Project
     */
    public function getProject()
    {
        if ($this->project == null) {
            $data = $this->data["project"];
            $this->project = new Project(
                $data['id'],
                $data['name'],
                $data['description'],
                $data['web_url'],
                strval($data['avatar_url']),
                $data['git_ssh_url'],
                $data['git_http_url'],
                $data['namespace'],
                $data['visibility_level'],
                $data['path_with_namespace'],
                $data['default_branch'],
                $data['homepage'],
                $data['url'],
                $data['ssh_url'],
                $data['http_url']
            );
        }

        return $this->project;
    }
}