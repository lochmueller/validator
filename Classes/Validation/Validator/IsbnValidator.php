<?php

declare(strict_types=1);
/**
 * IsbnValidator
 */
namespace TL\Validator\Validation\Validator;

/**
 * IsbnValidator
 *
 * @todo Finish Validator
 * @todo Check sum https://productcodevalidator.codeplex.com/SourceControl/latest#ProductCodeValidator/IsbnValidator.cs
 */
class IsbnValidator extends AbstractRegexValidator
{

    /**
     * Get the regex for the validation
     *
     * @return string
     */
    public function getRegex(): string
    {
        return 'ISBN(-1(?:(0)|3))?:?\x20+(?(1)(?(2)(?:(?=.{13}$)\d{1,5}([ -])\d{1,7}\3\d{1,6}\3(?:\d|x)$)|(?:(?=.{17}$)97(?:8|9)([ -])\d{1,5}\4\d{1,7}\4\d{1,6}\4\d$))|(?(.{13}$)(?:\d{1,5}([ -])\d{1,7}\5\d{1,6}\5(?:\d|x)$)|(?:(?=.{17}$)97(?:8|9)([ -])\d{1,5}\6\d{1,7}\6\d{1,6}\6\d$)))';

        // @todo check "x" modifier and split the regex
    }

    /**
     * Get the placeholder for the validation
     *
     * @return string
     */
    public function getPlaceholder(): string
    {
        return '';
    }

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if ($this->isInvalidRegexEvaluation($value)) {
            $this->addError('Input is no valid ISBN number', 3458938);
        }
    }
}
