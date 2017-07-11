<?php

/**
 * FutureValidator
 */

namespace TL\Validator\Validation\Validator\Date;

/**
 * FutureValidator
 */
class FutureValidator extends AbstractDateValidator
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
            $this->addError('No valid date format', 234523452);
            return;
        }

        if ($value <= $now) {
            $this->addError('Thw given date is not in the future', 43563456);
        }
    }
}
