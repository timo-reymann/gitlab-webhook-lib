<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait UserIdAvatarAndNameTrait
{
    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->getRootAttribute("user_id");
    }

    /**
     * @return string
     */
    public function getUserName()
    {
        return $this->getRootAttribute("user_username");
    }

    /**
     * @return string
     */
    public function getUserAvatar()
    {
        return $this->getRootAttribute("user_avatar");
    }
}