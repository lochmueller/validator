<?php

/**
 * AbstractDateValidator
 */

namespace TL\Validator\Validation\Validator\Date;

use DateTimeInterface;
use TL\Validator\Validation\Validator\AbstractValidator;
use TYPO3\CMS\Core\Utility\MathUtility;

/**
 * AbstractDateValidator
 */
abstract class AbstractDateValidator extends AbstractValidator
{

    /**
     * Convert to DateTime
     *
     * @param mixed $value
     * @return \DateTime|int|null
     */
    protected function getDateTimeObject($value)
    {
        try {
            if (!is_scalar($value)) {
                return null;
            } elseif (is_numeric($value) || MathUtility::canBeInterpretedAsInteger($value)) {
                $value = (int)$value;
                return new \DateTime($value . '-01-01 12:00');
            } elseif (is_string($value)) {
                return new \DateTime('@' . strtotime($value));
            } elseif ($value instanceof DateTimeInterface) {
                return $value;
            }
            return new \DateTime($value);
        } catch (\Exception $ex) {
            return null;
        }
    }

    /**
     * Get current Date Time
     *
     * @return \DateTime
     */
    public function getNow()
    {
        return new \DateTime();
    }
}
