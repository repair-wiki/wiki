<?php

# Protect against web entry
if ( !defined( 'MEDIAWIKI' ) ) {
	exit;
}

# Periodically send a pingback to https://www.mediawiki.org/ with basic data
# about this MediaWiki instance. The Wikimedia Foundation shares this data
# with MediaWiki developers to help guide future development efforts.
$wgPingback = false;

# Site language code, should be one of the list in ./languages/data/Names.php
$wgLanguageCode = "en";

# Time zone
$wgLocaltimezone = "UTC";

$wgSecretKey = getenv("MEDIAWIKI_SECRET");

# Changing this will log out all existing sessions.
$wgAuthenticationTokenVersion = "1";

# Path to the GNU diff3 utility. Used for conflict resolution.
$wgDiff3 = "/usr/bin/diff3";

# Core
require_once __DIR__ . '/LocalSettings/core/Cache.php';
require_once __DIR__ . '/LocalSettings/core/Logs.php';
require_once __DIR__ . '/LocalSettings/core/Brand.php';
require_once __DIR__ . '/LocalSettings/core/Paths.php';
require_once __DIR__ . '/LocalSettings/core/Database.php';
require_once __DIR__ . '/LocalSettings/core/Skins.php';
require_once __DIR__ . '/LocalSettings/core/Namespaces.php';
require_once __DIR__ . '/LocalSettings/core/Uploads.php';
require_once __DIR__ . '/LocalSettings/core/Email.php';
require_once __DIR__ . '/LocalSettings/core/Copyright.php';
require_once __DIR__ . '/LocalSettings/core/Security.php';
require_once __DIR__ . '/LocalSettings/core/CDN.php';
require_once __DIR__ . '/LocalSettings/core/Debug.php';
require_once __DIR__ . '/LocalSettings/core/Sessions.php';

# Extensions
require_once __DIR__ . '/LocalSettings/extensions/Scribunto.php';
require_once __DIR__ . '/LocalSettings/extensions/ParserFunctions.php';
require_once __DIR__ . '/LocalSettings/extensions/Math.php';
require_once __DIR__ . '/LocalSettings/extensions/Cite.php';
require_once __DIR__ . '/LocalSettings/extensions/CloudflarePurge.php';
require_once __DIR__ . '/LocalSettings/extensions/ImageMap.php';
require_once __DIR__ . '/LocalSettings/extensions/InputBox.php';
require_once __DIR__ . '/LocalSettings/extensions/Gadgets.php';

require_once __DIR__ . '/LocalSettings/extensions/VisualEditor.php';
require_once __DIR__ . '/LocalSettings/extensions/VEForAll.php';
require_once __DIR__ . '/LocalSettings/extensions/WikiEditor.php';
require_once __DIR__ . '/LocalSettings/extensions/CodeEditor.php';

require_once __DIR__ . '/LocalSettings/extensions/PageForms.php';
require_once __DIR__ . '/LocalSettings/extensions/SemanticMediaWiki.php';

require_once __DIR__ . '/LocalSettings/extensions/CategoryTree.php';
require_once __DIR__ . '/LocalSettings/extensions/DynamicPageList3.php';
require_once __DIR__ . '/LocalSettings/extensions/TabberNeue.php';

require_once __DIR__ . '/LocalSettings/extensions/EmbedVideo.php';
require_once __DIR__ . '/LocalSettings/extensions/NativeSvgHandler.php';
require_once __DIR__ . '/LocalSettings/extensions/MultimediaViewer.php';
require_once __DIR__ . '/LocalSettings/extensions/PageImages.php';
require_once __DIR__ . '/LocalSettings/extensions/SimpleBatchUpload.php';

require_once __DIR__ . '/LocalSettings/extensions/Popups.php';
require_once __DIR__ . '/LocalSettings/extensions/TextExtracts.php';
require_once __DIR__ . '/LocalSettings/extensions/WikiSEO.php';

require_once __DIR__ . '/LocalSettings/extensions/CirrusSearch.php';
require_once __DIR__ . '/LocalSettings/extensions/Elastica.php';
require_once __DIR__ . '/LocalSettings/extensions/SearchDigest.php';

require_once __DIR__ . '/LocalSettings/extensions/Echo.php';
require_once __DIR__ . '/LocalSettings/extensions/LoginNotify.php';
require_once __DIR__ . '/LocalSettings/extensions/Discord.php';

require_once __DIR__ . '/LocalSettings/extensions/Captcha.php';
require_once __DIR__ . '/LocalSettings/extensions/AbuseFilter.php';
require_once __DIR__ . '/LocalSettings/extensions/StopForumSpam.php';
require_once __DIR__ . '/LocalSettings/extensions/SmiteSpam.php';
require_once __DIR__ . '/LocalSettings/extensions/TitleBlacklist.php';
require_once __DIR__ . '/LocalSettings/extensions/SpamBlacklist.php';
require_once __DIR__ . '/LocalSettings/extensions/ConfirmAccount.php';

require_once __DIR__ . '/LocalSettings/extensions/Nuke.php';
require_once __DIR__ . '/LocalSettings/extensions/BulkBlock.php';
require_once __DIR__ . '/LocalSettings/extensions/MassRollback.php';
require_once __DIR__ . '/LocalSettings/extensions/ProtectSite.php';
require_once __DIR__ . '/LocalSettings/extensions/CheckUser.php';
require_once __DIR__ . '/LocalSettings/extensions/AntiSpoof.php';

require_once __DIR__ . '/LocalSettings/extensions/DeleteBatch.php';
require_once __DIR__ . '/LocalSettings/extensions/OATHAuth.php';

# Customizations
require_once __DIR__ . '/LocalSettings/customizations/MessageOverrides.php';
require_once __DIR__ . '/LocalSettings/customizations/Footer.php';

# Groups
require_once __DIR__ . '/LocalSettings/core/Groups.php';
