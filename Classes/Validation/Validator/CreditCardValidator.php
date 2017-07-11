<?php

/**
 * CreditCardValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * CreditCardValidator
 */
class CreditCardValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        // TODO: Implement isValid() method.
        /**
         * CreditCard Validator:
         * https://docs.phalconphp.com/en/3.2/api/Phalcon_Validation_Validator_CreditCard
         * positiv: 5400 4300 1234 5678
         * negativ: 123456789 oder asdasfgdfhd
         */
    }
}


