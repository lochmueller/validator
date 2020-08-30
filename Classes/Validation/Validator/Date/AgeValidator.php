<?php

declare(strict_types=1);
/**
 * AgeValidator
 */
namespace TL\Validator\Validation\Validator\Date;

/**
 * AgeValidator
 */
class AgeValidator extends AbstractDateValidator
{

    /**
     * Options
     *
     * @var array
     */
    protected $supportedOptions = [
        'age' => [18, 'The min age of the validator', 'integer'],
    ];

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

        $interval = $now->diff($value);
        if ($interval->y < $this->options['age']) {
            $this->addError('The given date is not old enough', 2352352);
        }
    }
}
