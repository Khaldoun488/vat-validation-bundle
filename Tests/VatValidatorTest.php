<?php

namespace Khaldoun\VatValidationBundle\Tests;

use Khaldoun\VatValidationBundle\Exception\VATNumberNotValidException;
use Khaldoun\VatValidationBundle\Validator\VatValidator;

/**
 * Class VatValidatorTest : test the vat validator
 */
class VatValidatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var VatValidator
     */
    private $vatValidator;

    /**
     * Set Up
     */
    public function setUp()
    {
        parent::setUp();

        $this->vatValidator = new VatValidator('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl', true);
    }

    /**
     * Test if soapClient is initialized in the constructor
     */
    public function testInitOfSoapClientInConstructor()
    {
        $this->assertInstanceOf(\SoapClient::class, \PHPUnit_Framework_Assert::readAttribute($this->vatValidator, 'soapClient'));
    }

    /**
     * @param string       $codeCountry
     * @param string       $vatNumber
     * @param string|null  $exceptedException
     *
     * @dataProvider inputProvider
     */
    public function testResponseDependsOfInputs($codeCountry, $vatNumber, $exceptedException)
    {
        if (null !== $exceptedException) {
            $this->setExpectedException($exceptedException);
        }

        $this->vatValidator->ensureVatNumberIsValidForEuropeanCountry($codeCountry, $vatNumber);
    }

    /**
     * provide (country code, vat number) couples and return excepted responses for each one
     *
     * @return array
     */
    public function inputProvider()
    {
        $caseSoapFault = array("NOT A VALID COUNTRY", "NOT A VALID VAT NUMBER", \SoapFault::class);

        $caseValidInputButVatNumberNotValid = array("FR", "FR087505226", VATNumberNotValidException::class);

        $caseValidInputAndVatNumberValid = array("FR", "08750522690", null);

        return array(
            $caseSoapFault,
            $caseValidInputButVatNumberNotValid,
            $caseValidInputAndVatNumberValid
        );
    }
}
