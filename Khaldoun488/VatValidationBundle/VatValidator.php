<?php

namespace Khaldoun488\VatValidationBundle;

/**
 * Class VatValidator
 */
class VatValidator
{
    const WSDL_URL = "http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl";

    /**
     * @var \SoapClient
     */
    protected $soapClient;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {
        $this->soapClient = new \SoapClient(self::WSDL_URL, array('trace' => true));
    }

    /**
     * @param string $countryCode
     * @param string $vatNumber
     *
     * @return string
     */
    public function checkVatNumberForEuropeanCountry($countryCode, $vatNumber)
    {
        try {
            $result = $this->soapClient->checkVat(array('countryCode' => $countryCode, 'vatNumber' => $vatNumber));
        } catch (\SoapFault $e) {
            return json_encode(array(
                "result"  => "error",
                "message" => "soap fault",
                "valid"   => false
            ));
        }

        if ($result != null) {
            $isValid = $result->valid;
        }

        return json_encode(array(
            "result"  => "success",
            "message" => "connection succeed",
            "valid"   => $isValid
        ));
    }
}
