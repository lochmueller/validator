<?php

declare(strict_types=1);
/**
 * IpAddressValidator
 */
namespace TL\Validator\Validation\Validator;

/**
 * IpAddressValidator
 */
class IpAddressValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        // TODO: Implement isValid() method.
        // https://github.com/Respect/Validation/blob/master/library/Rules/Ip.php -> v4
        // https://de.wikipedia.org/wiki/IPv6 v6?
    }
}
