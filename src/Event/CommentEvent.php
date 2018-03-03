<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


use TimoReymann\GitlabWebhookLibrary\Specification\Event;

class CommentEvent extends Event
{
    use UserTrait;
    use ProjectIdTrait;
    use ObjectAttributesTrait;
    use CommitTrait;

    /**
     * @return string[] Associative arrays with information about merge request or null
     *                  For more information please visit:
     *                  https://docs.gitlab.com/ce/user/project/integrations/webhooks.html#push-events
     */
    public function getMergeRequest()
    {
        return $this->getRootAttribute("merge_request");
    }

    /**
     * @return string[] Associative arrays with information about issue or null
     *                  For more information please visit:
     *                  https://docs.gitlab.com/ce/user/project/integrations/webhooks.html#comment-on-issue
     */
    public function getIssue()
    {
        return $this->getRootAttribute("issue");
    }

    /**
     * @return string[] Associative arrays with information about snippet or null
     *                  For more information please visit:
     *                  https://docs.gitlab.com/ce/user/project/integrations/webhooks.html#comment-on-code-snippet
     */
    public function getSnippet()
    {
        return $this->getRootAttribute("issue");
    }

    /**
     * @return string[] Associative arrays with information about target or null if not merge request.
     *                  For more information please visit:
     *                  https://docs.gitlab.com/ce/user/project/integrations/webhooks.html#push-events
     */
    public function getTarget()
    {
        return $this->getRootAttribute("target");
    }

    /**
     * @return bool Is work in progress (true) or not (false)
     */
    public function isWorkInProgress()
    {
        return $this->getRootAttribute("work_in_progress");
    }
}