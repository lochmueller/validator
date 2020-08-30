<?php

declare(strict_types=1);
/**
 * LeapYearValidator
 */
namespace TL\Validator\Validation\Validator\Date;

/**
 * LeapYearValidator
 */
class LeapYearValidator extends AbstractDateValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        $dateTime = $this->getDateTimeObject($value);

        if (!($dateTime instanceof \DateTimeInterface)) {
            $this->addError('The given input is no valid date', 46273428);
            return;
        }

        $date = strtotime(sprintf('%d-02-29', $dateTime->format('Y')));
        if ((bool)date('L', $date) === false) {
            $this->addError('The given input is no valid leap year', 27423412);
        }
    }
}
