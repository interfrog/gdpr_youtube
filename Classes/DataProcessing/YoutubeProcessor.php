<?php

namespace Interfrog\GdprYoutube\DataProcessing;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\ CMS\ Frontend\ ContentObject\ ContentObjectRenderer;
use TYPO3\ CMS\ Frontend\ ContentObject\ DataProcessorInterface;
use TYPO3\CMS\Extbase\Utility\DebuggerUtility as Debug;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Class for data processing for the content element "My new content element"
 */
class YoutubeProcessor implements DataProcessorInterface {

    /**
     * Process data for the content element "My new content element"
     *
     * @param ContentObjectRenderer $cObj The data of the content element or page
     * @param array $contentObjectConfiguration The configuration of Content Object
     * @param array $processorConfiguration The configuration of this processor
     * @param array $processedData Key/value store of processed data (e.g. to be passed to a Fluid View)
     * @return array the processed data as key/value store
     */
    public function process(ContentObjectRenderer $cObj, array $contentObjectConfiguration, array $processorConfiguration, array $processedData) {
        //Debug::var_dump([$cObj, $contentObjectConfiguration, $processorConfiguration, $processedData, $this, time()], null, 8, false, true, false, [], []);
        $processedData['header'] = $processedData['data']['header'];
        $processedData['subheader'] = $processedData['data']['subheader'];
        $processedData['data-replace'] = $processedData['data']['iframe'];
        $processedData['overlay-gradient'] = $processedData['data']['overlay'];
        $processedData['data-origin'] = "ytcontent";
        $objectManager = GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\Object\\ObjectManager');
        $configurationManager = $objectManager->get('TYPO3\\CMS\\Extbase\\Configuration\\ConfigurationManagerInterface');
        $typoScriptSettings = $configurationManager->getConfiguration(
            \TYPO3\CMS\Extbase\Configuration\ConfigurationManagerInterface::CONFIGURATION_TYPE_FULL_TYPOSCRIPT
            )['plugin.']['tx_gdpryoutube.'];
        $enableReplacement = $typoScriptSettings['settings.']['enableReplacement'];
        if(!$enableReplacement) {
            $processedData['no-replace'] = 1;
            return $processedData;
        }

        $fileRepository = GeneralUtility::makeInstance(\TYPO3\CMS\Core\Resource\FileRepository::class);
        $fileObjects = $fileRepository->findByRelation('tt_content', 'image', $processedData['data']['uid']);
        $processedData['backgroundImageUid'] = $fileObjects[0] ? $fileObjects[0]->getUid() : null;

        $processedData['privacyPageUid'] = $typoScriptSettings['settings.']['privacyPageUid'];
        $processedData['rawMessage'] = $typoScriptSettings['settings.']['rawMessage'];
        $processedData['linkedMessage'] = $typoScriptSettings['settings.']['linkedMessage'];
        $processedData['linkedBefore'] = $typoScriptSettings['settings.']['linkedBefore'];
        $processedData['linkedAfter'] = $typoScriptSettings['settings.']['linkedAfter'];

        return $processedData;
    }
}