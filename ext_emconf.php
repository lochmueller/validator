<?php

/** @var $_EXTKEY string */
$EM_CONF[$_EXTKEY] = array(
    'title' => 'Validator',
    'description' => 'Validation Framework for TYPO3',
    'version' => '0.1.0',
    'state' => 'stable',
    'author' => 'Tim Lochmüller',
    'author_email' => 'webmaster@fruit-lab.de',
    'author_company' => 'hdnet.de',
    'constraints' => array(
        'depends' => array(
            'php' => '7.0.0-0.0.0',
            'typo3' => '7.6.0-8.7.99',
        ),
    ),
);
