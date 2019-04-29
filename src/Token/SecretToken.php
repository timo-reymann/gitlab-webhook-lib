<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Token;

use TimoReymann\GitlabWebhookLibrary\Specification\HeaderProcessor;

/**
 * Representation for secret token
 * @package TimoReymann\GitlabWebhookLibrary\Core
 */
class SecretToken implements HeaderProcessor
{
    /**
     * Header name that contains our secret token
     */
    const HEADER_NAME = "HTTP_X_GITLAB_TOKEN";

    /**
     * @var string Secret token
     */
    private $token;

    /**
     * SecretToken constructor.
     * @param $token string Secret token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * @return bool Header is present (true) or not (false)
     */
    public function isHeaderPresent()
    {
        return array_key_exists(self::HEADER_NAME, $_SERVER);
    }

    /**
     * @return string Secret token sent with header
     */
    public function getHeaderValue()
    {
        return $_SERVER[self::HEADER_NAME];
    }

    /**
     * Verify token
     *
     * @param bool $failSilent Verify via boolean (true) or via exception (false)
     * @return bool|void Based on failSilent method returns void or an boolean of the result
     * @throws SecretTokenInvalidException
     * @throws SecretTokenMissingException Token header not set
     */
    public function verify($failSilent = false)
    {
        if (!$this->isHeaderPresent()) {
            if (!$failSilent) {
                throw new SecretTokenMissingException("No secret token provided");
            }
            return false;
        }

        if ($this->getHeaderValue() != $this->token) {
            if (!$failSilent) {
                throw new SecretTokenInvalidException("Secret token not matching expected token");
            }
            return false;
        }

        return true;
    }
}