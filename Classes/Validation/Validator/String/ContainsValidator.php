<?php declare(strict_types=1);
/**
 * ContainsValidator
 */
namespace TL\Validator\Validation\Validator\String;

/**
 * ContainsValidator
 */
class ContainsValidator extends AbstractStringValidator
{

    /**
     * Options
     *
     * @var array
     */
    protected $supportedOptions = [
        'char' => ['', 'The char that should be part of the string value', 'string'],
    ];

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (strpos($value, $this->options['char']) === false) {
            $this->addError('The given char is not part of the string', 1237123);
        }
    }
}
