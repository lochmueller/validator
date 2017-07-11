<?php

/**
 * EvenValidator
 */

namespace TL\Validator\Validation\Validator;

use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * EvenValidator
 */
class EvenValidator extends AbstractValidator
{
    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_scalar($value)) {
            $this->addError('Input is no scalar variable', 123789234);
            return;
        }

        if (!MathUtility::canBeInterpretedAsFloat($value) && !MathUtility::canBeInterpretedAsInteger($value)) {
            $this->addError('Input is no valid number', 5436346);
            return;
        }

        if (!$this->isNumberIsEven($value)) {
            $this->addError('Input is no valid even number', 4567457);
        }
    }

    /**
     * @param $value
     *
     * @return bool
     */
    protected function isNumberIsEven($value): bool
    {
        $numberParts = explode('.', $value);
        if (sizeof($numberParts) > 1) {
            return false;
        }
        return $numberParts[0] % 2 === 0;
    }
}
