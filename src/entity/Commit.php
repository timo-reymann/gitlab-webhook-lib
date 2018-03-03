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
    public function __construct(string $id, string $message, string $timestamp, string $url, Author $author, array $added, array $modified, array $removed)
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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @return string
     */
    public function getTimestamp(): string
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return Author
     */
    public function getAuthor(): Author
    {
        return $this->author;
    }

    /**
     * @return string[]
     */
    public function getAdded(): array
    {
        return $this->added;
    }

    /**
     * @return string[]
     */
    public function getModified(): array
    {
        return $this->modified;
    }

    /**
     * @return string[]
     */
    public function getRemoved(): array
    {
        return $this->removed;
    }


}