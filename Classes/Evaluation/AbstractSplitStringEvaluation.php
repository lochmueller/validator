<?php

/**
 * AbstractSplitStringEvaluation
 */

namespace TL\Validator\Evaluation;

/**
 * AbstractSplitStringEvaluation
 */
class AbstractSplitStringEvaluation extends AbstractEvaluation
{
    /**
     * Seperator
     *
     * @var string
     */
    protected $seperator = ' ';

    /**
     * Chars per block
     *
     * @var int
     */
    protected $chars = 4;

    /**
     * JS validation
     *
     * @return string
     */
    public function returnFieldJS()
    {
        return "
            var theVal = ''+value.replace(/ /g,'');
            
            var chars = " . $this->chars . ";
            var seperator = '" . $this->seperator . "';
            
            var output = '';
            while (theVal.length > chars)    {
                if(output != '') {
                    output = output+seperator;
                }
                
                output = output + theVal.substr(0,chars);
                theVal = theVal.substr(chars);
            }
            
            if(theVal.length) {
                output = output+seperator+theVal;
            }
            
            return output;
        ";
    }

    /**
     * @param $string
     * @param $seperator
     * @param $chars
     * @return mixed
     */
    protected function splitString($string, $seperator, $chars)
    {
        $string = str_replace(" ", '', trim($string));

        $output = '';
        while (strlen($string) > $this->chars) {
            if ($output != '') {
                $output .= $this->seperator;
            }

            $output .= substr($string, 0, $this->chars);
            $string = substr($string, $this->chars);
        }

        if (strlen($string)) {
            $output .= $this->seperator . $string;
        }

        return $output;
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
        return $this->splitString($value, $this->seperator, $this->chars);
    }

    /**
     * Deevaluate field value
     *
     * @param array $params
     * @return mixed
     */
    public function deevaluateFieldValue(array $params)
    {
        return $this->splitString($params['value'], $this->seperator, $this->chars);
    }
}
