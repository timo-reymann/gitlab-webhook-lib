<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Entity\User;

trait UserTrait
{
    /**
     * @var User
     */
    private $user = null;

    /**
     * @return User
     */
    public function getUser()
    {
        if ($this->user == null) {
            $u = $this->getRootAttribute("user");
            $this->user = new User(
                $u['name'],
                array_key_exists('username', $u) ? $u['username'] : null,
                array_key_exists('avatar_url', $u) ? $u['avatar_url'] : null,
                array_key_exists('email', $u) ? $u['email'] : null
            );
        }

        return $this->user;
    }
}