<?php declare(strict_types=1);
/**
 * TldValidator
 */
namespace TL\Validator\Validation\Validator;

use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * TldValidator
 */
class TldValidator extends AbstractValidator
{

    /**
     * Check if $value is valid. If it is not valid, needs to add an error
     * to result.
     *
     * @param mixed $value
     */
    protected function isValid($value)
    {
        if (!is_string($value)) {
            $this->addError('The input is no valid string', 12367823423);
            return;
        }

        if (!in_array(mb_strtoupper($value), $this->getTopLevelDomains())) {
            $this->addError('The given value is no valid domain name', 123782934792);
        }
    }

    /**
     * @return array
     */
    protected function getTopLevelDomains()
    {
        $topLevelDomainFile = dirname(dirname(dirname(dirname(__FILE__)))) . '/Resource/Private/TopLevelDomains.txt';
        $content = GeneralUtility::getUrl($topLevelDomainFile);
        $topLevelDomains = GeneralUtility::trimExplode("\n", $content, true);
        return array_slice($topLevelDomains, 2);
    }
}
