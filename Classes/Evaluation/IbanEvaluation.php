<?php declare(strict_types=1);
/**
 * IbanEvaluation
 */
namespace TL\Validator\Evaluation;

/**
 * IbanEvaluation
 */
class IbanEvaluation extends AbstractSplitStringEvaluation
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
}
