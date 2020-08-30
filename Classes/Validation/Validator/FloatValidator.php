<?php

declare(strict_types=1);
/**
 * FloatValidator
 */
namespace TL\Validator\Validation\Validator;

/**
 * FloatValidator
 */
class FloatValidator extends AbstractValidator
{
    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        // @todo
        // Genauigkeit um verschiedene Evaluatoren zu bauen
    }
}
