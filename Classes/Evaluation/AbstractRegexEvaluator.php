<?php

/**
 * AbstractRegexEvaluator
 */

namespace TL\Validator\Evaluation;

use TL\Validator\Validation\Validator\AbstractRegexValidator;

/**
 * AbstractRegexEvaluator
 */
abstract class AbstractRegexEvaluator
{

    /**
     * Get the regex validator
     *
     * @return AbstractRegexValidator
     */
    abstract public function getRegexValidator(): AbstractRegexValidator;

    /**
     * JS validation
     *
     * @return string
     */
    public function returnFieldJS()
    {
        return "var theVal = ''+value;
            //var regex = '" . $this->getRegexValidator()->getRegex() . "';
            //   alert(theVal.match(regex));
            
            return theVal;";
    }

    /**
     * Evaluation in PHP
     *
     * @param string $value
     * @param string $isIn
     * @param bool $set
     *
     * @return string
     */
    public function evaluateFieldValue($value, $isIn, &$set)
    {
        return $value;
    }

    /**
     * Deevaluate field value
     *
     * @param array $params
     * @return mixed
     */
    public function deevaluateFieldValue(array $params)
    {
        return $params['value'];
    }
}
