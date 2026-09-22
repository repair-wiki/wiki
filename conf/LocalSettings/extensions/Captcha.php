<?php
wfLoadExtensions([ 'ConfirmEdit', 'ConfirmEdit/hCaptcha' ]);

if(getenv('CAPTCHA_USE_HCAPTCHA') == "true") {
    $wgCaptchaClass = MediaWiki\Extension\ConfirmEdit\hCaptcha\HCaptcha::class;
}

# hCaptcha Configuration
$wgHCaptchaSiteKey = getenv('CAPTCHA_SITEKEY');
$wgHCaptchaSecretKey = getenv('CAPTCHA_SECRETKEY');

# Privacy Settings
$wgHCaptchaSendRemoteIP = true; // Send user IPs to hCaptcha.

# Ensure CAPTCHA applies to "new-section" (Talk pages)
$wgCaptchaTriggers = [
    'edit' => true,           // CAPTCHA for normal edits
    'create' => true,         // CAPTCHA for creating new pages
    'createtalk' => true,     // CAPTCHA for creating talk pages
    'addurl' => true,         // CAPTCHA for adding external links
    'createaccount' => true,  // CAPTCHA for account creation
    'badlogin' => true,       // CAPTCHA for failed login attempts
    'badloginperuser' => true, // CAPTCHA after repeated failed logins
    'new-section' => true      // CAPTCHA for starting a new topic
];
