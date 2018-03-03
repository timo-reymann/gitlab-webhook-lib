<?php

include "../vendor/autoload.php";

$webhook = new \TimoReymann\GitlabWebhookLibrary\Core\Webhook(new \TimoReymann\GitlabWebhookLibrary\Token\SecretToken("Test"));
var_dump($webhook->parse()->getRepository());