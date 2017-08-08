<?php declare(strict_types=1);
/**
 * AbstractDoubleEvaluation
 */
namespace TL\Validator\Evaluation;

use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * AbstractDoubleEvaluation
 */
abstract class AbstractDoubleEvaluation extends AbstractEvaluation
{

    /**
     * The number of decimal places
     *
     * @var int
     */
    protected $decimalPlaces = 2;

    /**
     * JS validation
     *
     * @return string
     */
    public function returnFieldJS()
    {
        return "
            var theVal = ''+value;
            var dec='0';
            
            for (var a=theVal.length; a>0; a--)    {
                if (theVal.substr(a-1,1)=='.' || theVal.substr(a-1,1)==',')    {
                    dec = theVal.substr(a);
                    theVal = theVal.substr(0,a-1);
                    break;
                }
            }
            dec = dec+'" . str_pad('', $this->getDecimalPlaces(), '0') . "'; 
            sign = '.';
            theVal=theVal+sign+dec.substr(0," . $this->getDecimalPlaces() . ');
            return theVal;
        ';
    }

    /**
     * Get the decimal positions
     *
     * @return int
     */
    public function getDecimalPlaces()
    {
        return MathUtility::convertToPositiveInteger($this->decimalPlaces);
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
        return $this->forceDouble($value, $this->getDecimalPlaces());
    }

    /**
     * Force double
     *
     * @see \TYPO3\CMS\Core\DataHandling\DataHandler:2766
     *
     * @param     $value
     * @param int $precision
     *
     * @return float
     */
    protected function forceDouble($value, $precision = 2)
    {
        $value = preg_replace('/[^0-9,\\.-]/', '', $value);
        $negative = $value[0] === '-';
        $value = strtr($value, [',' => '.', '-' => '']);
        if (strpos($value, '.') === false) {
            $value .= '.0';
        }
        $valueArray = explode('.', $value);
        $dec = array_pop($valueArray);
        $value = implode('', $valueArray) . '.' . $dec;
        if ($negative) {
            $value *= -1;
        }
        $value = number_format($value, $precision, '.', '');
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
        return $this->forceDouble($params['value'], $this->getDecimalPlaces());
    }
}
