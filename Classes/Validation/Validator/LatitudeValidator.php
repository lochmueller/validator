<?php

/**
 * LatitudeValidator
 */

namespace TL\Validator\Validation\Validator;

use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * LatitudeValidator
 */
class LatitudeValidator extends AbstractValidator
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
        if ($value < -90.0 || $value > 90.0) {
            $this->addError('Latitude is not beween -90.0 and 90.0', 24372839);
        }
    }
}
