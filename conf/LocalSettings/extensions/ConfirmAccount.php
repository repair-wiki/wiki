<?php
# Disabled
#wfLoadExtension( 'ConfirmAccount' );

$wgMakeUserPageFromBio = false;  // Do not publish request text as a user page.
$wgAutoWelcomeNewUsers = false;  // No automatic talk page message.
$wgConfirmAccountContact = "no-reply@repair.wiki";  // Where request notifications are sent.

$wgConfirmAccountRequestFormItems = [
    'UserName'        => [ 'enabled' => true ],
    'RealName'        => [ 'enabled' => false ],
    'Biography'       => [ 'enabled' => false, 'minWords' => 50 ],
    'AreasOfInterest' => [ 'enabled' => false ],
    'CV'              => [ 'enabled' => false ],
    'Notes'           => [ 'enabled' => true ],
    'Links'           => [ 'enabled' => false ],
    'TermsOfService'  => [ 'enabled' => false ]
];
