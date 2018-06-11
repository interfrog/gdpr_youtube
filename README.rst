TYPO3 GDPR Youtube Loader
====================================

This Extension creates a wrapper around Youtube Iframes, which are loaded only once the user has clicked on it.
This intends to help comply to the GDPR Laws, which came into effect in May 2018.


Options and Customization
====================================
(Recommended) Set the PageUid of your Privacy Policy Page::

    plugin.tx_gdpryoutube.settings.privacyPageUid

To unload the Default CSS, unset this TypoScript object::

   page.includeCSS.youtubeDefault

To use your own Fluid Templates override these TypoScript Objects::

    plugin.tx_gdpryoutube.view.templateRootPaths
    plugin.tx_gdpryoutube.view.partialRootPaths
    plugin.tx_gdpryoutube.view.layoutRootPaths
    plugin.tx_gdpryoutube.view.templateName

To disable refactoring the Iframes and render them as normal, set::

    plugin.tx_gdpryoutube.settings.enableReplacement = 0


Folder structure
====================================

::

    ├── Classes         -> Controller to override Iframe rendering
    ├── Configuration   -> TypoScript Configuration
    ├── Resources
        ├── Private     
            ├── Templates   -> Contains the Default Template
        ├── Public
            ├── Icons       -> Contains the placeholder Icons
            ├── Scripts     -> JavaScript to dynamically load the Iframes
            ├── Styles      -> Contains the Default styles