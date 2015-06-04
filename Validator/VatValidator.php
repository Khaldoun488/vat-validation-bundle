<?php

namespace Khaldoun488\VatValidationBundle\Validator;

/**
 * Class VatValidator, check the validity of a vat number for a country
 */
class VatValidator
{
    /**
     * @var \SoapClient
     */
    protected $soapClient;

    /**
     * @param string $wsdlUrl
     */
    public function __construct($wsdlUrl)
    {
        $this->soapClient = new \SoapClient($wsdlUrl, array('trace' => true));
    }

    /**
     * Check the validity vat number.
     * Parameters :
     *              - $countryCode, the european country code (ex : FR ....)
     *              - $vatNumber, the VAT number
     *
     * @param string $countryCode
     * @param string $vatNumber
     *
     * @return array
     */
    public function checkVatNumberForEuropeanCountry($countryCode, $vatNumber)
    {
        try {
            $result = $this->soapClient->checkVat(array('countryCode' => $countryCode, 'vatNumber' => $vatNumber));
        } catch (\SoapFault $e) {
            return array(
                "result"  => "error",
                "message" => "soap fault",
                "valid"   => false
            );
        }

        if ($result !== null) {
            $isValid = $result->valid;
        }

        return array(
            "result"  => "success",
            "message" => "connection succeed",
            "valid"   => $isValid
        );
    }
}
