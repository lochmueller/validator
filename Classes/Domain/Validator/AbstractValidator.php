<?php
/**
 * Abstract Domain Validator
 *
 * @author     Tim Lochmüller
 */

namespace TL\Validator\Domain\Validator;

use TL\Validator\Exception;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Object\ObjectManager;
use TYPO3\CMS\Extbase\Validation\Error;

/**
 * Abstract Domain Validator
 *
 * @author     Tim Lochmüller
 */
abstract class AbstractValidator extends \TL\Validator\Validation\Validator\AbstractValidator
{

    /**
     * Add a Property errors
     *
     * @param string $propertyName
     * @param string $msg
     * @param integer $code
     */
    protected function addPropertyError($propertyName, $msg, $code)
    {
        $objectManager = new ObjectManager();
        $validationError = $objectManager->get(Error::class, $msg, $code);
        $this->result->forProperty($propertyName)
            ->addError($validationError);
    }

    /**
     * Check if the field exists in the model and add a error if the field is missing
     *
     * @param $model
     * @param $field
     *
     * @throws Exception
     */
    protected function requiredField($model, $field)
    {
        $method = 'get' . ucfirst($field);
        if (!is_object($model) || !method_exists($model, $method)) {
            throw new Exception(
                'Invalid required field for the model ' . get_class($model) . ' and field' . $field,
                12367128368123
            );
        }
        $value = $model->$method();
        if (!is_scalar($value) && $value !== null) {
            return;
        }
        if ((is_string($value) && trim($value) === '') || empty($value)) {
            $this->addPropertyError($field, $field . ' is required', $this->getNumberIdentifier($field));
        }
    }

    /**
     * Get the identifier for a string
     *
     * @param string $string
     *
     * @return int
     */
    private function getNumberIdentifier($string)
    {
        return (int)hexdec(GeneralUtility::shortMD5($string));
    }
}
