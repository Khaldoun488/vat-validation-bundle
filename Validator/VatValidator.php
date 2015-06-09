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
     * @param string  $wsdlUrl
     * @param boolean $trace
     */
    public function __construct($wsdlUrl, $trace)
    {
        $this->soapClient = new \SoapClient($wsdlUrl, array('trace' => $trace));
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
     */
    public function ensureVatNumberIsValidForEuropeanCountry($countryCode, $vatNumber)
    {
        $result = $this->soapClient->checkVat(array('countryCode' => $countryCode, 'vatNumber' => $vatNumber));

        $isValid = (null !== $result) ? $result->valid : false;

        if (false === $isValid) {
            throw new VATNumberNotValidException();
        }
    }
}
