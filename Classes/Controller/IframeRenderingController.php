<?php

namespace Interfrog\GdprYoutube\Controller;

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

use TYPO3\CMS\Extbase\Utility\DebuggerUtility as Debug;
use TYPO3\CMS\Core\Resource;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Render the iframe but wrap it as text inside a data attribute, to delay load until user has given permission
 */
class IframeRenderingController extends \TYPO3\CMS\Frontend\Plugin\AbstractPlugin
{
    /**
     * Same as class name
     *
     * @var string
     */
    public $prefixId = 'IframeRenderingController';

    /**
     * Path to this script relative to the extension dir
     *
     * @var string
     */
    public $scriptRelPath = 'Classes/Controller/IframeRenderingController.php';

    /**
     * The extension key
     *
     * @var string
     */
    public $extKey = 'gdpr_youtube';

    /**
     * Configuration
     *
     * @var array
     */
    public $conf = [];

    /**
     * cObj object
     *
     * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
     */
    public $cObj;

    /**
     * Returns a wrapper div with the original iframe in attribute "data-iframe".
     *
     * @param string $content Content input
     * @param array $conf TypoScript configuration
     * @return string HTML output
     */
    public function wrapIframe($content = '', $conf) {

        DEBUG::var_dump("Wraping Iframe");

        $frames = array();
        preg_match_all("/<iframe[^<>]*?>[^<>]*?<\/iframe>/", $content, $frames);
        $res = $content;
        foreach($frames[0] as $iter => $frame) {
            if(strpos($frame, "youtube") !== FALSE){
                $res = $this->processFrame($frame, $res, $iter);
            }
        }
        return $res;
    }

    /**
     * Applies necessary changes to the total string based on the frame
     * 
     * @param string $frame The individual frame to be wrapped
     * @param string $total The complete output in which to replace the frame with its wrapped counterpart
     * @return string new output with wrapped frames
     */
    protected function processFrame($frame, $total, $frameId){

        Debug::var_dump(get_defined_vars());

        $datenschutzLink = "/datenschutz.html";

        return str_replace(
            $frame,
            '<div class="youtubeAgreement" data-flag="iframe" '. "data-replace='"
                . $frame . "'"
                . 'data-id="' . $frameId . '"'
            . '>'
                . '<div class="youtubeAgreementInner">'
                    . '<div class="youtubeAgreementIcon">'
                        . '<i class="fa fa-youtube-play" aria-hidden="true"></i>'
                    . '</div>'
                    . '<div class="youtubeAgreementText">'
                        . '<p>'
                            . 'Das Video wird erst nach dem Klick von Youtube geladen und abgespielt. '
                            . 'Dazu baut ihr Browser eine direkte Verbindung zu den Youtube-Servern auf. '
                            . 'Mehr Informationen entnehmen Sie unserer <a class="youtubeAgreementDatenschutzlink" href="'. $datenschutzLink .'">Datenschutzerklärung</a>.'
                        . '</p>'
                    . '</div>'
                . '</div>'
            . '</div>'
            ,$total
        );
    }
}