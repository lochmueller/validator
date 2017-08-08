<?php declare(strict_types=1);
/**
 * UrlValidator
 */
namespace TL\Validator\Validation\Validator;

/**
 * UrlValidator
 */
class UrlValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!filter_var($value, FILTER_VALIDATE_URL)) {
            $this->addError('Input is no valid URK', 742839426);
        }
    }
}
