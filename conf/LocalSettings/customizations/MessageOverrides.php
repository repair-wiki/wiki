<?php

# Interface message overrides
$wgMessagesDirs['RepairWiki'] = __DIR__ . '/../i18n';

$wgHooks['MessageCacheFetchOverrides'][] = function ( array &$keys ) {
    $keys['formedit'] = 'repairwiki-formedit';
    $keys['pf_viewform'] = 'repairwiki-formedit';
    $keys['others'] = 'repairwiki-others';
};
