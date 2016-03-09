<?php

namespace Omnipay\Erip\Message;

abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    const API_VERSION = '1.0';

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

    public function sendData($data)
    {
        $url = $this->getEndpoint().'?'.http_build_query($data, '', '&');
        $httpRequest = $this->httpClient->get($url);
        $httpRequest->getCurlOptions()->set(CURLOPT_SSLVERSION, 6); // CURL_SSLVERSION_TLSv1_2 for libcurl < 7.35
        $httpResponse = $httpRequest->send();

        return $this->createResponse($httpResponse->getBody());
    }

    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->liveEndpoint;
    }

    protected function createResponse($data)
    {
        return $this->response = new Response($this, $data);
    }
}