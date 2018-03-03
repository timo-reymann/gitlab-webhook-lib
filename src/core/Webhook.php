<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Core;


use TimoReymann\GitlabWebhookLibrary\Token\SecretToken;

class Webhook
{
    /**
     * @var null|SecretToken
     */
    private $secretToken = null;

    /**
     * Webhook constructor.
     * @param $secretToken SecretToken
     */
    public function __construct($secretToken)
    {
        $this->secretToken = $secretToken;
    }

    public function execute()
    {
        $this->secretToken->verify();
    }
}