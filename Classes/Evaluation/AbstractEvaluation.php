<?php declare(strict_types=1);
/**
 * AbstractEvaluator
 */
namespace TL\Validator\Evaluation;

/**
 * AbstractEvaluator
 */
abstract class AbstractEvaluation
{

    /**
     * JS validation
     *
     * @return string
     */
    abstract public function returnFieldJS();

    /**
     * Evaluation in PHP
     *
     * @param string $value
     * @param string $isIn
     * @param bool $set
     *
     * @return string
     */
    abstract public function evaluateFieldValue($value, $isIn, &$set);

    /**
     * Deevaluate field value
     *
     * @param array $params
     * @return mixed
     */
    abstract public function deevaluateFieldValue(array $params);
}
