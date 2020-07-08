<?php

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
   array(
      'GDPR Youtube IFrame',
      'gdpryoutube_youtube',
      ''
   ),
   'CType',
   'gdpr_youtube'
);

$GLOBALS['TCA']['tt_content']['types']['gdpryoutube_youtube'] = array(
   'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,header,subheader,tx_gdpr_youtube_iframe,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.images,image,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,tx_gdpr_youtube_overlay,layout,
        --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
');

$temporaryColumns = array (
    'tx_gdpr_youtube_iframe' => array (
        'exclude' => 1,
        'label' => 'LLL:EXT:gdpr_youtube/Resources/Private/Language/locallang_db.xlf:tt_content.iframe',
        'config' => array (
            'type' => 'text',
            'size' => '80',
            'max'  => '1000'
        )
    ),
    'tx_gdpr_youtube_overlay' => array(
        'exclude' => 1,
        'label' => 'LLL:EXT:gdpr_youtube/Resources/Private/Language/locallang_db.xlf:tt_content.overlay',
        'config' => array(
            'type' => 'select',
            'items' => array(
                array('LLL:EXT:gdpr_youtube/Resources/Private/Language/locallang_db.xlf:tt_content.overlay.none', 'none'),
                array('LLL:EXT:gdpr_youtube/Resources/Private/Language/locallang_db.xlf:tt_content.overlay.grey', 'grey'),
                array('LLL:EXT:gdpr_youtube/Resources/Private/Language/locallang_db.xlf:tt_content.overlay.white', 'white')
            )
        )
    )
);

TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns(
    'tt_content',
    $temporaryColumns
);
