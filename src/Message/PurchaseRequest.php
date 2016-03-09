<?php

namespace Omnipay\Erip\Message;

use Omnipay\Common\Message\AbstractRequest;

/**
 * Erip Purchase Request
 */
class PurchaseRequest extends AbstractRequest
{
    protected $liveEndpoint = 'ftp://10.54.1.132';
    protected $testEndpoint = 'ftp://10.55.54.2';

    public function getIp()
    {
        return $this->getParameter('ip');
    }

    public function setIp($value)
    {
        return $this->setParameter('ip', $value);
    }

    public function getUsername()
    {
        return $this->getParameter('username');
    }

    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    public function getPassword()
    {
        return $this->getParameter('password');
    }

    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

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

    public function sendData($data)
    {
        return $this->response = new PurchaseResponse($this, $data);
    }

    public function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }
}
