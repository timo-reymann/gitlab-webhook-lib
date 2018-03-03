<?php
/**
 *
 * author Timo Reymann
 */

$hook = new \TimoReymann\GitlabWebhookLibrary\Core\Webhook(new \TimoReymann\GitlabWebhookLibrary\Token\SecretToken('mySuperSecretToken'));
$hook->parse();
print_r($hook->getResult());