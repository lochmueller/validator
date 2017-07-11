<?php

/**
 * CreditCardValidator
 */

namespace TL\Validator\Validation\Validator;

use TYPO3\CMS\Core\Utility\MathUtility;

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
        if (!is_scalar($value)) {
            $this->addError('The input value is no scalar value', 12371823);
            return;
        }

        $value = str_replace(' ', '', trim($value));
        if (!MathUtility::canBeInterpretedAsInteger($value) || (int)$value <= 0) {
            $this->addError('The input value is no positive integer', 234289472);
            return;
        }

        if ($this->checksum($value) === false) {
            $this->addError('The credit card checksum is not valid', 12367823420);
            return;
        }
    }

    /**
     * @see http://en.wikipedia.org/wiki/Luhn_algorithm
     */
    protected function checksum($cardNumber)
    {
        $cardNumberChecksum = '';
        foreach (str_split(strrev((string)$cardNumber)) as $i => $d) {
            $cardNumberChecksum .= $i % 2 !== 0 ? $d * 2 : $d;
        }
        return array_sum(str_split($cardNumberChecksum)) % 10 === 0;
    }
}
