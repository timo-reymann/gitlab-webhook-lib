<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Core;


use TimoReymann\GitlabWebhookLibrary\Event\EventType;
use TimoReymann\GitlabWebhookLibrary\Token\SecretToken;

class Webhook
{
    /**
     * @var null|SecretToken
     */
    private $secretToken = null;

    /**
     * @var null|EventType
     */
    private $eventType = null;

    /**
     * @var null|\TimoReymann\GitlabWebhookLibrary\Event\JobEvent|\TimoReymann\GitlabWebhookLibrary\Event\BuildEvent|\TimoReymann\GitlabWebhookLibrary\Event\CommentEvent|\TimoReymann\GitlabWebhookLibrary\Event\IssueEvent|\TimoReymann\GitlabWebhookLibrary\Event\MergeRequestEvent|\TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent|\TimoReymann\GitlabWebhookLibrary\Event\PushEvent|\TimoReymann\GitlabWebhookLibrary\Event\TagEvent|\TimoReymann\GitlabWebhookLibrary\Event\WikiEvent
     */
    private $result = null;

    /**
     * Webhook constructor.
     * @param $secretToken SecretToken
     */
    public function __construct($secretToken)
    {
        $this->secretToken = $secretToken;
        $this->eventType = new EventType();
    }

    /**
     * @param null $inputContent JSON input to read
     * @return \TimoReymann\GitlabWebhookLibrary\Event\JobEvent|\TimoReymann\GitlabWebhookLibrary\Event\BuildEvent|\TimoReymann\GitlabWebhookLibrary\Event\CommentEvent|\TimoReymann\GitlabWebhookLibrary\Event\IssueEvent|\TimoReymann\GitlabWebhookLibrary\Event\MergeRequestEvent|\TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent|\TimoReymann\GitlabWebhookLibrary\Event\PushEvent|\TimoReymann\GitlabWebhookLibrary\Event\TagEvent|\TimoReymann\GitlabWebhookLibrary\Event\WikiEvent
     * @throws \TimoReymann\GitlabWebhookLibrary\Event\EventTypeInvalidException
     * @throws \TimoReymann\GitlabWebhookLibrary\Event\EventTypeMissingException
     * @throws \TimoReymann\GitlabWebhookLibrary\Token\SecretTokenInvalidException
     * @throws \TimoReymann\GitlabWebhookLibrary\Token\SecretTokenMissingException
     */
    public function parse($inputContent = null)
    {
        $this->secretToken->verify();
        $this->eventType->verify();
        $this->result = $this->eventType->getEventDataFromBody(($inputContent == null) ? file_get_contents('php://input') : $inputContent);
        return $this->result;
    }

    /**
     * @return null|\TimoReymann\GitlabWebhookLibrary\Event\JobEvent|\TimoReymann\GitlabWebhookLibrary\Event\BuildEvent|\TimoReymann\GitlabWebhookLibrary\Event\CommentEvent|\TimoReymann\GitlabWebhookLibrary\Event\IssueEvent|\TimoReymann\GitlabWebhookLibrary\Event\MergeRequestEvent|\TimoReymann\GitlabWebhookLibrary\Event\PipelineEvent|\TimoReymann\GitlabWebhookLibrary\Event\PushEvent|\TimoReymann\GitlabWebhookLibrary\Event\TagEvent|\TimoReymann\GitlabWebhookLibrary\Event\WikiEvent
     */
    public function getResult()
    {
        return $this->result;
    }
}