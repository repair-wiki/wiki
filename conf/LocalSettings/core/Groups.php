<?php

// *
$wgGroupPermissions['*']['skipcaptcha'] = false;             // Anonymous users must complete CAPTCHA.
$wgGroupPermissions['*']['createpage'] = false;
$wgGroupPermissions['*']['edit'] = false;
$wgGroupPermissions['*']['viewedittab'] = true;
$wgGroupPermissions['*']['searchdigest-reader'] = false;
$wgGroupPermissions['*']['searchdigest-reader-stats'] = false;

// Bot
$wgGroupPermissions['bot']['skipcaptcha'] = true;
$wgGroupPermissions['bot']['protect'] = true;
$wgGroupPermissions['bot']['createpage'] = true;

// Normal user
$wgGroupPermissions['user']['createpage'] = true;
$wgGroupPermissions['user']['skipcaptcha'] = false;          // Registered users must also complete CAPTCHA.
$wgGroupPermissions['user']['edit'] = true;
$wgGroupPermissions['user']['createtalk'] = true;
$wgGroupPermissions['user']['searchdigest-reader'] = true;
$wgGroupPermissions['user']['searchdigest-reader-stats'] = true;

// Automatically confirmed
$wgAutoConfirmAge = 86400*3; // three days
$wgAutoConfirmCount = 5;

$wgGroupPermissions['autoconfirmed']['skipcaptcha'] = false;

// Sysop
$wgGroupPermissions['sysop']['smitespam'] = true;        // Use SmiteSpam extension for spam cleanup.
$wgGroupPermissions['sysop']['skipcaptcha'] = true;          // Sysops are exempt from CAPTCHA.
$wgGroupPermissions['sysop']['spamblacklistlog'] = true;     // View the spam blacklist log.
$wgGroupPermissions['sysop']['sboverride'] = true;            // Bypass the spam blacklist.
$wgGroupPermissions['sysop']['tboverride'] = true;            // Bypass the title blacklist.
$wgGroupPermissions['sysop']['protectsite'] = true;           // Activate and deactivate site protection.
$wgGroupPermissions['sysop']['userrights-global'] = true;
$wgGroupPermissions['sysop']['renameuser'] = true;
$wgGroupPermissions['sysop']['createpage'] = true;
$wgGroupPermissions['sysop']['nuke'] = true;
$wgGroupPermissions['sysop']['bulkblock'] = true;
$wgGroupPermissions['sysop']['massrollback'] = true;
$wgGroupPermissions['sysop']['searchdigest-admin'] = true;

// Bureaucrat
$wgGroupPermissions['bureaucrat']['usermerge'] = true;
$wgGroupPermissions['bureaucrat']['createaccount'] = true;

$wgAddGroups['bureaucrat'] = [ 'checkuser', 'no-captcha', 'bot' ];
$wgRemoveGroups['bureaucrat'] = [ 'checkuser', 'no-captcha', 'bot' ];

// Site protection exempt groups
$wgProtectSiteExempt = [ 'sysop', 'bureaucrat' ];

// Check user
$wgGroupPermissions['checkuser']['checkuser'] = true;
$wgGroupPermissions['checkuser']['checkuser-log'] = true;
$wgGroupPermissions['checkuser']['checkuser-temporary-account'] = true;
$wgGroupPermissions['checkuser']['checkuser-temporary-account-log'] = true;

// No captcha
$wgGroupPermissions['no-captcha']['skipcaptcha'] = true;
$wgGroupPermissions['no-captcha']['createpage'] = true;
