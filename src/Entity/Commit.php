<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class Commit
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $message;

    /**
     * @var  string
     */
    private $timestamp;

    /**
     * @var string
     */
    private $url;

    /**
     * @var Author
     */
    private $author;

    /**
     * @var string[]
     */
    private $added;

    /**
     * @var string[]
     */
    private $modified;

    /**
     * @var string[]
     */
    private $removed;

    /**
     * Commit constructor.
     * @param string $id
     * @param string $message
     * @param string $timestamp
     * @param string $url
     * @param Author $author
     * @param string[] $added
     * @param string[] $modified
     * @param string[] $removed
     */
    public function __construct($id, $message, $timestamp, $url, $author, $added, $modified, $removed)
    {
        $this->id = $id;
        $this->message = $message;
        $this->timestamp = $timestamp;
        $this->url = $url;
        $this->author = $author;
        $this->added = $added;
        $this->modified = $modified;
        $this->removed = $removed;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @return string[]
     */
    public function getAdded()
    {
        return $this->added;
    }

    /**
     * @return string[]
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * @return string[]
     */
    public function getRemoved()
    {
        return $this->removed;
    }


}