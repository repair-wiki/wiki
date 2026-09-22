<?php

# Enable and configure email functionality for the wiki.
$wgEnableEmail = true; // Activate email functionality in the wiki.
$wgEnableUserEmail = true; // Allow users to send emails to each other via the wiki interface.

# Administrative email addresses
$wgEmergencyContact = 'team@repair.wiki';
$wgPasswordSender = 'no-reply@repair.wiki';

# Email notification preferences
$wgEnotifUserTalk = false; // Disable email notifications for user talk page changes.
$wgEnotifWatchlist = false; // Disable email notifications for watchlist changes.
$wgEmailAuthentication = true; // Require email address verification for additional account functionality.

# Configure SMTP for sending emails.
$wgSMTP = [
    'host' => getenv("EMAIL_HOST"),
    'port' => 587,
    'auth' => true,
    'username' => getenv("EMAIL_USER"),
    'password' => getenv("EMAIL_PASS")
];

# Enable HTML-formatted emails for better readability and design.
$wgAllowHTMLEmail = true;
