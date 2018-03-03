GitLab Webhook Library
===

# What is this?
Simple library for PHP to work with Gitlab webhooks in a easy and natural way

# Usage
First create a webhook object and pass your secret token

```php
$hook = new \TimoReymann\GitlabWebhookLibrary\Core\Webhook(new \TimoReymann\GitlabWebhookLibrary\Token\SecretToken('mySuperSecretToken'));

```

To evaluate the header for your secret token and the event. Be aware that this method may throw 
an exception if the request is not valid!

```php
$hook->parse();
```

Finally you can work with the result, if you would like to, the "expensive" members are internally
cached after you first call them. So you don't have hidden performance bottlenecks. The resulting object
is based on the gitlab event type passed via header.

```php 
$hook->getResult()
```

# CAUTION
This package is currently under heavy development and may change at any time! 
I will release this package to packagist in the future.