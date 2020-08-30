<?php

declare(strict_types=1);
/**
 * EvenValidator
 */
namespace TL\Validator\Validation\Validator\Number;

use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * EvenValidator
 */
class EvenValidator extends AbstractNumberValidator
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
     * Check if the number is even
     *
     * @param $value
     *
     * @return bool
     */
    protected function isNumberIsEven($value): bool
    {
        $numberParts = explode('.', (string)$value);
        if (count($numberParts) > 1) {
            return false;
        }
        return $numberParts[0] % 2 === 0;
    }
}
