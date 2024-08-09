<?php

namespace App\Clients;

class WSSoapClient extends \SoapClient
{
    private $user;
    private $password;

    public function __construct($wsdl, $options, $user, $password)
    {
        parent::__construct($wsdl, $options);
        $this->user = $user;
        $this->password = $password;
    }

    public function addSecurityHeader()
    {
        $wsHeader = '
            <wsse:Security SOAP-ENV:mustUnderstand="1" xmlns:wsse="http://docs.oasis-open.org/wss/2004/01/oasis-200401-wss-wssecurity-secext-1.0.xsd">
                <wsse:UsernameToken>
                    <wsse:Username>' . $this->username . '</wsse:Username>
                    <wsse:Password>' . $this->password . '</wsse:Password>
                </wsse:UsernameToken>
            </wsse:Security>';

        $wsHeaderSoapVar = new \SoapVar($wsHeader, XSD_ANYXML);
        $wsSoapHeader - new \SoapHeader('http://schemas.xmlsoap.org/ws/2002/12/secext', 'Security',  $wsHeaderSoapVar);
        $this->__setSoapHeaders($wsSoapHeader);
    }


    public function __call($function, $params)
    {
        $this->addSecurityHeader();
        return parent::__call($function, $params);
    }

}