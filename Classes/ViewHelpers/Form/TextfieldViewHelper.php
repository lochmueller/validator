<?php

/**
 * TextfieldViewHelper
 */

namespace TL\Validator\ViewHelpers\Form;

use TL\Validator\Validation\Validator\AbstractRegexValidator;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Extbase\Reflection\ReflectionService;
use TYPO3\CMS\Extbase\Validation\Validator\NotEmptyValidator;
use TYPO3\CMS\Extbase\Validation\ValidatorResolver;
use TYPO3\CMS\Fluid\ViewHelpers\FormViewHelper;

/**
 * TextfieldViewHelper
 */
class TextfieldViewHelper extends \TYPO3\CMS\Fluid\ViewHelpers\Form\TextfieldViewHelper
{

    /**
     * Renders the textfield.
     *
     * @return string
     * @api
     */
    public function render()
    {
        parent::render();

        if ($this->isObjectAccessorMode()) {
            if ($this->viewHelperVariableContainer->exists(FormViewHelper::class, 'formObject')) {
                $formObject = $this->viewHelperVariableContainer->get(FormViewHelper::class, 'formObject');

                $validateAnnotations = $this->getValidateAnnotations(get_class($formObject), $this->arguments['property']);
                $validators = $this->buildValidators($validateAnnotations);

                $notEmpty = false;
                foreach ($validators as $key => $item) {
                    if ($item instanceof NotEmptyValidator) {
                        $notEmpty = true;
                        unset($validators[$key]);
                        break;
                    }
                }
                $validators = array_values($validators);

                if ($notEmpty && sizeof($validators) === 1) {
                    $validtor = $validators[0];
                    if ($validtor instanceof AbstractRegexValidator) {
                        $this->tag->addAttribute('pattern', $validtor->getRegex());
                        $this->tag->addAttribute('placeholder', $validtor->getPlaceholder());
                    }
                }
            }
        }


        return $this->tag->render() . 'Huhu';
    }

    protected function buildValidators($validateAnnotations)
    {
        /** @var ValidatorResolver $validatorResolver */
        $validatorResolver = GeneralUtility::makeInstance(ValidatorResolver::class);
        $validators = [];
        foreach ($validateAnnotations as $validateAnnotation) {
            $newValidator = $validatorResolver->createValidator($validateAnnotation['validatorName'], $validateAnnotation['validatorOptions']);
            if ($newValidator !== null) {
                $validators[] = $newValidator;
            }
        }
        return $validators;
    }

    /**
     * @param string $className
     * @param string $property
     * @return array
     */
    protected function getValidateAnnotations($className, $property)
    {

        /** @var ReflectionService $reflectionService */
        $reflectionService = GeneralUtility::makeInstance(ReflectionService::class);
        $classPropertyTagsValues = $reflectionService->getPropertyTagsValues($className, $property);

        $validateAnnotations = [];
        if (isset($classPropertyTagsValues['validate']) && is_array($classPropertyTagsValues['validate'])) {
            foreach ($classPropertyTagsValues['validate'] as $validateValue) {
                $parsedAnnotations = $this->parseValidatorAnnotation($validateValue);

                foreach ($parsedAnnotations['validators'] as $validator) {
                    array_push($validateAnnotations, [
                        'argumentName' => $parsedAnnotations['argumentName'],
                        'validatorName' => $validator['validatorName'],
                        'validatorOptions' => $validator['validatorOptions']
                    ]);
                }
            }
        }
        return $validateAnnotations;
    }

    /**
     * Parses the validator options given in @validate annotations.
     *
     * @param string $validateValue
     * @return array
     */
    protected function parseValidatorAnnotation($validateValue)
    {
        $matches = [];
        if ($validateValue[0] === '$') {
            $parts = explode(' ', $validateValue, 2);
            $validatorConfiguration = ['argumentName' => ltrim($parts[0], '$'), 'validators' => []];
            preg_match_all(ValidatorResolver::PATTERN_MATCH_VALIDATORS, $parts[1], $matches, PREG_SET_ORDER);
        } else {
            $validatorConfiguration = ['validators' => []];
            preg_match_all(ValidatorResolver::PATTERN_MATCH_VALIDATORS, $validateValue, $matches, PREG_SET_ORDER);
        }
        foreach ($matches as $match) {
            $validatorOptions = [];
            if (isset($match['validatorOptions'])) {
                $validatorOptions = $this->parseValidatorOptions($match['validatorOptions']);
            }
            $validatorConfiguration['validators'][] = ['validatorName' => $match['validatorName'], 'validatorOptions' => $validatorOptions];
        }
        return $validatorConfiguration;
    }

    /**
     * Parses $rawValidatorOptions not containing quoted option values.
     * $rawValidatorOptions will be an empty string afterwards (pass by ref!).
     *
     * @param string $rawValidatorOptions
     * @return array An array of optionName/optionValue pairs
     */
    protected function parseValidatorOptions($rawValidatorOptions)
    {
        $validatorOptions = [];
        $parsedValidatorOptions = [];
        preg_match_all(ValidatorResolver::PATTERN_MATCH_VALIDATOROPTIONS, $rawValidatorOptions, $validatorOptions, PREG_SET_ORDER);
        foreach ($validatorOptions as $validatorOption) {
            $parsedValidatorOptions[trim($validatorOption['optionName'])] = trim($validatorOption['optionValue']);
        }
        array_walk($parsedValidatorOptions, [$this, 'unquoteString']);
        return $parsedValidatorOptions;
    }

    /**
     * Removes escapings from a given argument string and trims the outermost
     * quotes.
     *
     * This method is meant as a helper for regular expression results.
     *
     * @param string &$quotedValue Value to unquote
     */
    protected function unquoteString(&$quotedValue)
    {
        switch ($quotedValue[0]) {
            case '"':
                $quotedValue = str_replace('\\"', '"', trim($quotedValue, '"'));
                break;
            case '\'':
                $quotedValue = str_replace('\\\'', '\'', trim($quotedValue, '\''));
                break;
        }
        $quotedValue = str_replace('\\\\', '\\', $quotedValue);
    }
}
