<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Specification\HeaderProcessor;

class EventType implements HeaderProcessor
{
    const HEADER_NAME = "HTTP_X_GITLAB_EVENT";
    const PUSH_VALUE = "Push Hook";
    const TAG_VALUE = "Tag Push Hook";
    const ISSUE_VALUE = "Issue Hook";
    const COMMENT_VALUE = "Note Hook";
    const MERGE_REQUEST_VALUE = "Merge Request Hook";
    const WIKI_VALUE = "Wiki Page Hook";
    const PIPELINE_VALUE = "Pipeline Hook";
    const BUILD_VALUE = "Build Hook";

    /**
     * Verify header
     *
     * @param bool $failSilent Verify via boolean (true) or via exception (false)
     * @return bool|void Based on failSilent method returns void or an boolean of the result
     * @throws EventTypeMissingException
     */
    public function verify($failSilent = false)
    {
        if (!$this->isHeaderPresent()) {
            if (!$failSilent) {
                throw new EventTypeMissingException("Event type header is missing");
            }
            return false;
        }

    }

    /**
     * @param $headerValue
     * @return BuildEvent|CommentEvent|IssueEvent|MergeRequestEvent|PipelineEvent|PushEvent|TagEvent|WikiEvent
     * @throws EventTypeInvalidException
     */
    public function getEventDataFromBody()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $headerValue = $this->getHeaderValue();

        switch ($headerValue) {
            case self::PUSH_VALUE:
                return new PushEvent($data);
                break;

            case self::TAG_VALUE:
                return new TagEvent($data);
                break;

            case self::ISSUE_VALUE:
                return new IssueEvent($data);
                break;

            case self::COMMENT_VALUE:
                return new CommentEvent($data);
                break;

            case self::MERGE_REQUEST_VALUE:
                return new MergeRequestEvent($data);
                break;

            case self::WIKI_VALUE:
                return new WikiEvent($data);
                break;

            case self::PIPELINE_VALUE:
                return new PipelineEvent($data);
                break;

            case self::BUILD_VALUE:
                return new BuildEvent($data);
                break;

            default:
                throw new EventTypeInvalidException("Event type " . $headerValue . " is not a valid event type!");
                break;
        }
    }

    /**
     * @return string Get value sent with header
     */
    public function getHeaderValue()
    {
        return $_SERVER[self::HEADER_NAME];
    }

    /**
     * @return bool Header is present (true) or not (false)
     */
    public function isHeaderPresent()
    {
        return array_key_exists(self::HEADER_NAME, $_SERVER);
    }
}