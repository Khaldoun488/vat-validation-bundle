<?php

namespace Khaldoun488\VatValidationBundle\Tests;

use Khaldoun488\VatValidationBundle\VatValidator;

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

        $this->vatValidator = new VatValidator();
    }

    /**
     * Test if this class exists
     */
    public function testInstanceOfValidator()
    {
        $this->assertInstanceOf(VatValidator::class, $this->vatValidator);
    }

    /**
     * Test if soapClient is initialized in the constructor
     */
    public function testInitOfSoapClientInConstructor()
    {
        $this->assertInstanceOf(\SoapClient::class, \PHPUnit_Framework_Assert::readAttribute($this->vatValidator, 'soapClient'));
    }

    /**
     * test response if soap fault catched
     */
    public function testResponseifSoapFaultCatched()
    {
        $response = $this->vatValidator->checkVatNumberForEuropeanCountry("NOT A VALID COUNTRY", "NOT A VALID NUMBER");

        $this->assertEquals(json_encode(array(
            "result"  => "error",
            "message" => "soap fault",
            "valid"   => false
        )), $response);
    }

    /**
     * test response if vat number is correct but not valid
     */
    public function testResponseIfVatNumberIsCorrectButNotValid()
    {
        $response = $this->vatValidator->checkVatNumberForEuropeanCountry("FR", "FR087505226");

        $this->assertEquals(json_encode(array(
            "result" => "success",
            "message" => "connection succeed",
            "valid"  => false
        )), $response);
    }

    /**
     * test response if vat number is correct and valid
     */
    public function testResponseIfVatNumberIsCorrectAndValid()
    {
        $response = $this->vatValidator->checkVatNumberForEuropeanCountry("FR", "08750522690");

        $this->assertEquals(json_encode(array(
            "result" => "success",
            "message" => "connection succeed",
            "valid"  => true
        )), $response);
    }
}
