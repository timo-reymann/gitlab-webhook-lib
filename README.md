GitLab Webhook Library
===
[![Version](https://poser.pugx.org/timo-reymann/gitlab-webhook-lib/v/stable)](https://packagist.org/packages/timo-reymann/gitlab-webhook-lib)
[![Build Status](https://api.travis-ci.org/timo-reymann/gitlab-webhook-lib.svg?branch=master)](https://travis-ci.org/timo-reymann/gitlab-webhook-lib)

## What is this?
Simple library for PHP to work with Gitlab webhooks in a easy and natural way

## Usage
### Installation

Install using composer: ``composer require timo-reymann/gitlab-webhook-lib``

### Documentation
For PHP class documentation please visit [timo-reymann.github.io/gitlab-webhook-lib](https://timo-reymann.github.io/gitlab-webhook-lib/TimoReymann/GitlabWebhookLibrary.html)

### Use in your scripts

First create a webhook object and pass your secret token

```php
$hook = new \TimoReymann\GitlabWebhookLibrary\Core\Webhook(
  new \TimoReymann\GitlabWebhookLibrary\Token\SecretToken('mySuperSecretToken')
);

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
