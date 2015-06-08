<?php

namespace Khaldoun\VatValidationBundle\Validator;
use Khaldoun\VatValidationBundle\Exception\VATNumberNotValidException;

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
     * @throws VATNumberNotValidException
     *
     * @return boolean
     */
    public function checkVatNumberForEuropeanCountry($countryCode, $vatNumber)
    {
        $result = $this->soapClient->checkVat(array('countryCode' => $countryCode, 'vatNumber' => $vatNumber));

        $isValid = $result->valid;

        if ($result === null || ($isValid === false)) {
            throw new VATNumberNotValidException();
        }

        return true;
    }
}
