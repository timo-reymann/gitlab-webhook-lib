<?php
/**
 *
 * author Timo Reymann
 */

namespace TimoReymann\GitlabWebhookLibrary\Event;


trait CheckoutShaTrait
{
    /**
     * @return string Checkout sha checksum
     */
    public function getCheckoutSha()
    {
        return $this->getRootAttribute("checkout_sha");
    }
}