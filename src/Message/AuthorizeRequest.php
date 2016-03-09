<?php

namespace Omnipay\Erip\Message;

/**
 * Erip Authorize Request
 */
class AuthorizeRequest extends AbstractRequest
{
    public function getData()
    {
        $this->validate('ip', 'username', 'password');

        $data = array();
        $data['version'] = static::API_VERSION;
        $data['ip'] = $this->getIp();
        $data['username'] = $this->getUsername();
        $data['password'] = $this->getPassword();
        $data['amount'] = $this->getAmount();
        $data['clint_ip'] = $this->getClientIp();

        return $data;
    }

    protected function createResponse($data)
    {
        return $this->response = new AuthorizeResponse($this, $data);
    }

}
