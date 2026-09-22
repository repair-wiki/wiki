<?php

$wgHooks['SkinAddFooterLinks'][] = function ( Skin $skin, string $key, array &$footerlinks ) {
    if ( $key === 'places' ) {
        $footerlinks['github'] = \MediaWiki\Html\Html::element(
            'a',
            [ 'href' => 'https://github.com/repair-wiki/wiki', 'rel' => 'noreferrer noopener' ],
            'GitHub'
        );
    }
};
