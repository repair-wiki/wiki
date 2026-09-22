<?php

# Basic session settings
$wgObjectCacheSessionExpiry = 3600;       // Time-to-live for session data in object cache (1 hour).
$wgCookieExpiration = 2592000;            // Expiration time for session cookies (30 days).
$wgExtendedLoginCookieExpiration = 15552000; // Expiration time for "remember me" cookies (180 days).

# Session security settings
$wgSessionCacheType = CACHE_DB;           // Use the database for session storage to ensure data is not lost during cache evictions.
