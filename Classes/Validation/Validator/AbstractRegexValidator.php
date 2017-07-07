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

}
