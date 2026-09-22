<?php

$wgMetaNamespace = "RepairWiki";

# Block robots
$wgNamespaceRobotPolicies = [
    NS_TALK => 'noindex,follow',
    NS_USER => 'noindex,follow',
    NS_USER_TALK => 'noindex,follow',
    NS_PROJECT_TALK => 'noindex,follow',
    NS_FILE_TALK => 'noindex,follow',
    NS_MEDIAWIKI => 'noindex,follow',
    NS_MEDIAWIKI_TALK => 'noindex,follow',
    NS_TEMPLATE => 'noindex,follow',
    NS_TEMPLATE_TALK => 'noindex,follow',
    NS_HELP_TALK => 'noindex,follow',
    NS_CATEGORY_TALK => 'noindex,follow',
];
