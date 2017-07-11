<?php

/**
 * EqualValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * EqualValidator
 */
class EqualValidator extends AbstractValidator
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
         * Equals Validator:
        https://github.com/Respect/Validation/blob/master/library/Rules/Equals.php (options)
        positiv: 5 = 5, Text = Text
        negativ: 7 > 3
         */
    }
}
