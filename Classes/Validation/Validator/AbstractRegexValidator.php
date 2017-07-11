<?php

/**
 * AbstractRegexValidator
 */

namespace TL\Validator\Validation\Validator;

/**
 * AbstractRegexValidator
 */
abstract class AbstractRegexValidator extends AbstractValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    abstract public function getRegex(): string;

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    abstract public function getPlaceholder(): string;


    /**
     * @param $value
     * @return bool
     */
    protected function isInvalidRegexEvaluation($value)
    {
        if (!is_scalar($value) || !preg_match('/' . $this->getRegex() . '/', $value)) {
            return true;
        }
        return false;
    }
}
