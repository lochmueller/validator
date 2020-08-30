<?php

declare(strict_types=1);
/**
 * PastValidator
 */
namespace TL\Validator\Validation\Validator\Date;

/**
 * PastValidator
 */
class PastValidator extends AbstractDateValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        $value = $this->getDateTimeObject($value);
        $now = $this->getNow();

        if (!($value instanceof \DateTime)) {
            $this->addError('No valid date format', 42783947923);
            return;
        }

        if ($value >= $now) {
            $this->addError('Thw given date is not in the past', 2342378394);
        }
    }
}
