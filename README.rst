TYPO3 GDPR Youtube Loader
====================================

This Extension creates a wrapper around Youtube Iframes, which are loaded only once the user has clicked on it.
This intends to help comply to the GDPR Laws, which came into effect in May 2018.
Since Version 2, this Extension adds a new Content Element, to make using youtube Iframes in your website easier.

Options and Customization
====================================
(Recommended) Set the PageUid of your Privacy Policy Page::

    plugin.tx_gdpryoutube.settings.privacyPageUid

To unload the Default CSS, unset this TypoScript object::

   page.includeCSS.youtubeDefault

To use your own Fluid Templates override these TypoScript Objects (CObject only) ::

    tt_content.gdpryoutube_youtube.templateRootPaths
    tt_content.gdpryoutube_youtube.partialRootPaths
    tt_content.gdpryoutube_youtube.layoutRootPaths
    tt_content.gdpryoutube_youtube.templateName

Or these if using the HTML variant::
    plugin.tx_gdpryoutube.view.templateRootPaths
    plugin.tx_gdpryoutube.view.partialRootPaths
    plugin.tx_gdpryoutube.view.layoutRootPaths
    plugin.tx_gdpryoutube.view.templateName

To disable refactoring the Iframes and render them as normal, set::

    plugin.tx_gdpryoutube.settings.enableReplacement = 0

To customize the Message, that is shown you may either set a blank text::

    plugin.tx_gdpryoutube.settings.rawMessage

Or split your message up into up to three parts, one of them being wrapped with the link tag to your Privacy Policy Page and a before and after plaintext part.
You may leave any of these empty. Note, that the rawMessage will allways take precedence.::

    plugin.tx_gdpryoutube.settings.linkedBefore
    plugin.tx_gdpryoutube.settings.linkedMessage
    plugin.tx_gdpryoutube.settings.linkedAfter

To set a background image for the placeholder, add this attribute to your iframe (Pure HTML-Iframes only)::

    data-placeholder-bg="URL OF YOUR BACKGROUND IMAGE";


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