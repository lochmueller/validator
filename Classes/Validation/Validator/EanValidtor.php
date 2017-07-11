<?php

/**
 * EanValidtor
 */

namespace TL\Validator\Validation\Validator;

/**
 * EanValidtor
 */
class EanValidtor extends AbstractValidator
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
        /*
         * EAN Validator:
        https://productcodevalidator.codeplex.com/SourceControl/latest#ProductCodeValidator/EanValidator.cs
         */
    }
}
