<?php

/**
 * LongitudeValidator
 */

namespace TL\Validator\Validation\Validator;

use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * LongitudeValidator
 */
class LongitudeValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!MathUtility::canBeInterpretedAsFloat($value) && !MathUtility::canBeInterpretedAsInteger($value)) {
            $this->addError('Longitude have to be a floating number', 136712314);
        }
        $value = (float)$value;
        if ($value < -180.0 || $value > 180.0) {
            $this->addError('Longitude is not beween -180.0 and 180.0', 328492034);
        }
    }
}
