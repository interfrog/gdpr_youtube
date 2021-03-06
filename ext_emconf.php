<?php

$EM_CONF[$_EXTKEY] = array(
	'title' => 'GDPR Youtube Loader',
	'description' => 'Hides Youtube Iframes to load after user click.',
	'category' => 'plugin',
	'author' => 'Alexander Büchner, Christian Händel',
	'author_email' => 'info@interfrog.de',
	'author_company' => 'Interfrog Produktion GmbH',
	'shy' => '',
	'priority' => '',
	'module' => '',
	'state' => 'stable',
	'internal' => '',
	'uploadfolder' => '0',
	'createDirs' => '',
	'modify_tables' => '',
	'clearCacheOnLoad' => 0,
	'lockType' => '',
	'version' => '2.1.0',
	'constraints' => array(
		'depends' => array(
			'typo3' => '9.0.0-10.99.99',
		),
		'conflicts' => array(
		),
		'suggests' => array(
		),
	),
	'autoload' => array(
		'psr-4' => array(
				'Interfrog\\GdprYoutube\\' => 'Classes'
		)
	),
);
