<?php

namespace Khaldoun\VatValidationBundle\Exception;

/**
 * Class VATNumberNotValidException, generate an exception if the VAT is not valid
 */
class VATNumberNotValidException extends \RuntimeException
{
    const MESSAGE = "VAT Number not valid";

    /**
     * Construct
     */
    public function __construct()
    {
        parent::__construct(self::MESSAGE, 400);
    }
}
