<?php

/**
 * BicEvaluator
 */

namespace TL\Validator\Evaluation;

use TL\Validator\Validation\Validator\AbstractRegexValidator;
use TL\Validator\Validation\Validator\BicValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * BicEvaluator
 */
class BicEvaluator extends AbstractRegexEvaluator
{

    /**
     * Get the regex validator
     *
     * @return AbstractRegexValidator
     */
    public function getRegexValidator(): AbstractRegexValidator
    {
        return GeneralUtility::makeInstance(BicValidator::class);
    }
}
