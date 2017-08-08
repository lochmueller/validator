<?php declare(strict_types=1);
/**
 * DomainValidator
 */
namespace TL\Validator\Validation\Validator;

use TL\Validator\Validation\Validator\String\ContainsValidator;
use TYPO3\CMS\Extbase\Validation\Validator\StringLengthValidator;

/**
 * DomainValidator
 */
class DomainValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_string($value)) {
            $this->addError('The input is not a valid string/domain', 1236782);
            return;
        }

        $parts = explode('.', $value);
        $validatorConfigurations = [
            [new TldValidator(), array_pop($parts)],
            [new StringLengthValidator(['minimum' => 3]), $value],
            [new NoWhitespaceValidator(), $value],
            [new ContainsValidator(['char' => '.']), $value],
        ];

        if ($this->isValidExternal($validatorConfigurations) === false) {
            $this->addError('The input is no valid Domain', 1237382834);
        }
    }

    /**
     * Check external
     *
     * @param array $validatorConfigurations 0 => Validator object, 1 => value
     * @return bool
     */
    protected function isValidExternal(array $validatorConfigurations): bool
    {
        foreach ($validatorConfigurations as $validatorConfiguration) {
            $result = $validatorConfiguration[0]->validate($validatorConfiguration[1]);
            if ((bool)count($result->getErrors())) {
                return false;
            }
        }
        return true;
    }
}
