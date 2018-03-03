<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class File
{
    /**
     * @var string|null
     */
    private $filename;

    /**
     * @var string|null
     */
    private $size;

    /**
     * File constructor.
     * @param null|string $filename
     * @param null|string $size
     */
    public function __construct(?string $filename, ?string $size)
    {
        $this->filename = $filename;
        $this->size = $size;
    }

    /**
     * @return null|string
     */
    public function getFilename(): ?string
    {
        return $this->filename;
    }

    /**
     * @return null|string
     */
    public function getSize(): ?string
    {
        return $this->size;
    }


}