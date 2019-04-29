<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Specification;


/**
 * Specification for header processing classes
 * @package TimoReymann\GitlabWebhookLibrary\Specification
 */
interface HeaderProcessor
{
    /**
     * Verify header
     *
     * @param bool $failSilent Verify via boolean (true) or via exception (false)
     * @return bool|void Based on failSilent method returns void or an boolean of the result
     */
    public function verify($failSilent = false);

    /**
     * @return string Get value sent with header
     */
    public function getHeaderValue();

    /**
     * @return bool Header is present (true) or not (false)
     */
    public function isHeaderPresent();

}