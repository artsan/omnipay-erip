<?php

namespace Omnipay\Erip\Message;

use Omnipay\Common\Message\AbstractResponse;
use Omnipay\Common\Message\RedirectResponseInterface;

/**
 * Erip Purchase Response
 */
class PurchaseResponse extends AbstractResponse implements RedirectResponseInterface
{
    public function isSuccessful()
    {
        return isset($this->data['success']) && $this->data['success'];
    }

    public function isRedirect()
    {
        return true;
    }

    public function getRedirectUrl()
    {
        return $this->getRequest()->getEndpoint().'?'.http_build_query($this->data);
    }

    public function getRedirectMethod()
    {
        return 'GET';
    }

    public function getRedirectData()
    {
        return null;
    }

    public function getTransactionReference()
    {
        return isset($this->data['reference']) ? $this->data['reference'] : null;
    }

    public function getMessage()
    {
        return isset($this->data['message']) ? $this->data['message'] : null;
    }
}
