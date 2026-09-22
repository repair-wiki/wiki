<?php

# Exported entity URIs
$smwgNamespace = getenv('FULL_URL') . "/id/";

# Setup state directory
$smwgConfigFileDir = "$IP/semantics_config";

# Semantic MediaWiki
wfLoadExtension( 'SemanticMediaWiki' );
