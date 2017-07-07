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
    function returnFieldJS()
    {
        // tbd.
        return '';
        return "
            var theVal = ''+value;
            var dec='0';
            if (!value)    return 0;
            for (var a=theVal.length; a>0; a--)    {
                if (theVal.substr(a-1,1)=='.' || theVal.substr(a-1,1)==',')    {
                    dec = theVal.substr(a);
                    theVal = theVal.substr(0,a-1);
                    break;
                }
            }
            dec = evalFunc.getNumChars(dec)+'0000';
            sign = " . ($this->getDecimalPlaces() == 0 ? 'TS.decimalSign' : '""') . ";
            theVal=evalFunc.parseInt(evalFunc.noSpace(theVal))+sign+dec.substr(0," . $this->getDecimalPlaces() . ");
            return theVal;
        ";
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
    function evaluateFieldValue($value, $isIn, &$set)
    {
        // tbd.
        return 1;
        return $this->forceDouble($value, $this->getDecimalPlaces());
    }

    // function deevaluateFieldValue
}
