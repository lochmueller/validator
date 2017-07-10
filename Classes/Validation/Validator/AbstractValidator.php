<?php
/**
 * Abstract  Validator
 *
 * @author     Tim Lochmüller
 */

namespace TL\Validator\Validation\Validator;

/**
 * Abstract Validator
 *
 * @author     Tim Lochmüller
 */
abstract class AbstractValidator extends \TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator
{

    /**
     * Check the deprecated error property and also the nre result structure,
     * if there are any errors in the current context.
     *
     * @return bool
     */
    public function hasErrors()
    {
        if (!is_object($this->result)) {
            return false;
        }
        return (bool)sizeof($this->result->getErrors());
    }
}
