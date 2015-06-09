<?php

namespace Khaldoun\VatValidationBundle\Exception;

/**
 * Class VATNumberNotValidException, generate an exception if the VAT is not valid
 */
class VATNumberNotValidException extends \RuntimeException
{
    const MESSAGE        = "VAT Number not valid";
    const EXCEPTION_CODE = 400;

    /**
     * {@inheritdoc}
     */
    public function __construct($message = self::MESSAGE, $code = self::EXCEPTION_CODE, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
