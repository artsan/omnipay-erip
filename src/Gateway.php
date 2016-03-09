<?php

namespace Omnipay\Erip;

use Omnipay\Common\AbstractGateway;

/**
 * Erip Gateway
 *
 * This gateway is useful for processing check or direct erip payments.
 *
 * @link http://raschet.by/main.aspx?guid=7961
 * @link http://raschet.by/documents/1/help.chm
 * @link http://raschet.by/documents/Minsk1/Protokol_obmena_PU_RU.pdf
 * @see Omnipay\Erip\Message\AbstractRequest
 */
class Gateway extends AbstractGateway
{
    public function getName()
    {
        return 'ЕРИП';
    }

    /**
     * Get default params.
     *
     * @return array
     */
    public function getDefaultParameters()
    {
        return array(
            'ip' => '',
            'username' => '',
            'password' => '',
            'testMode' => false,
        );
    }

    /**
     * Get IP.
     *
     * @return string
     */
    public function getIp()
    {
        return $this->getParameter('ip');
    }

    /**
     * Set IP.
     *
     * @param string $value
     * @return Gateway provides a fluent interface
     */
    public function setIp($value)
    {
        return $this->setParameter('ip', $value);
    }

    /**
     * Get Username.
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->getParameter('username');
    }

    /**
     * Set Username.
     *
     * @param string $value
     * @return Gateway provides a fluent interface
     */
    public function setUsername($value)
    {
        return $this->setParameter('username', $value);
    }

    /**
     * Get Password.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->getParameter('password');
    }

    /**
     * Set Password.
     *
     * @param string $value
     * @return Gateway provides a fluent interface
     */
    public function setPassword($value)
    {
        return $this->setParameter('password', $value);
    }

    /**
     * Authorize Request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Erip\Message\AuthorizeRequest
     */
    public function authorize(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Erip\Message\AuthorizeRequest', $parameters);
    }

    /**
     * Purchase request.
     *
     * @param array $parameters
     *
     * @return \Omnipay\Erip\Message\PurchaseRequest
     */
    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\Omnipay\Erip\Message\PurchaseRequest', $parameters);
    }
}
