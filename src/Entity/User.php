<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Entity;


class User
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $avatar_url;

    /**
     * @var string
     */
    private $email;

    /**
     * User constructor.
     * @param string $name
     * @param string $username
     * @param string $avatar_url
     * @param string $email
     */
    public function __construct($name, $username, $avatar_url, $email)
    {
        $this->name = $name;
        $this->username = $username;
        $this->avatar_url = $avatar_url;
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getAvatarUrl()
    {
        return $this->avatar_url;
    }


}