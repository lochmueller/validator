<?php declare(strict_types=1);
/** @var $_EXTKEY string */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Validator',
    'description' => 'Validation Framework for TYPO3',
    'version' => '0.1.0',
    'state' => 'stable',
    'author' => 'Tim Lochmüller',
    'author_email' => 'webmaster@fruit-lab.de',
    'author_company' => 'hdnet.de',
    'constraints' => [
        'depends' => [
            'php' => '7.1.0-7.4.99',
            'typo3' => '8.7.0-9.5.99',
        ],
    ],
];
