<?php

# Load VisualEditor and its dependencies for enhanced editing capabilities.
wfLoadExtension( 'VisualEditor' );

# Configure how the edit tabs are displayed in the MediaWiki interface.
$wgVisualEditorEnableWikitext = true;         // Enable wikitext mode in VisualEditor.
$wgVisualEditorShowBetaWelcome = false;       // Disable beta welcome popup for a cleaner user experience.

wfLoadExtension( 'Parsoid', "$IP/vendor/wikimedia/parsoid/extension.json" );

if(getenv('WIKI_ENV') == "Dev") {
    $wgVirtualRestConfig['modules']['parsoid'] = [
        'url' => 'http://localhost/rest.php'
    ];
} else {
    $wgVirtualRestConfig['modules']['parsoid'] = [];
}
