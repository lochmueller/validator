<?php

/**
 * Iban Evaluator
 */

namespace TL\Validator\Evaluation;

use TL\Validator\Validation\Validator\AbstractRegexValidator;
use TL\Validator\Validation\Validator\IbanValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * IbanEvaluator
 */
class IbanEvaluator extends AbstractRegexEvaluator
{

    /**
     * Get the regex validator
     *
     * @return AbstractRegexValidator
     */
    public function getRegexValidator(): AbstractRegexValidator
    {
        return GeneralUtility::makeInstance(IbanValidator::class);
    }
}


