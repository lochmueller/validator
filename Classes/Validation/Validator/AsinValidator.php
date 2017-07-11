<?php

/**
 * AsinValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * AsinValidator
 */
class AsinValidator extends AbstractValidator
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
         * ASIN Validator:
        https://productcodevalidator.codeplex.com/SourceControl/latest#ProductCodeValidator/AsinValidator.cs
        positiv: B0185E3D2O
        negativ: 4565CXYZ67
         */
    }
}
