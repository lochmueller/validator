<?php

declare(strict_types=1);
/**
 * OddValidator
 */
namespace TL\Validator\Validation\Validator\Number;

use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * OddValidator
 */
class OddValidator extends EvenValidator
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
            $this->addError('Input is no scalar variable', 324582934);
            return;
        }

        if (!MathUtility::canBeInterpretedAsFloat($value) && !MathUtility::canBeInterpretedAsInteger($value)) {
            $this->addError('Input is no vald number', 5436346);
            return;
        }

        if ($this->isNumberIsEven($value)) {
            $this->addError('Input is no valid odd number', 325345);
        }
    }
}
