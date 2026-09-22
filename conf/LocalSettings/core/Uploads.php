<?php

# InstantCommons allows wiki to use images from https://commons.wikimedia.org
$wgUseInstantCommons = false;

# File upload settings
$wgEnableUploads = true; // Enable file uploads to the wiki.
$wgMaxUploadSize = 64 * 1024 * 1024; // Maximum file upload size (64 MB).
$wgUploadSizeWarning = 32 * 1024 * 1024; // Show a warning for files larger than 32 MB.

# File storage directories
$wgUploadDirectory = "{$IP}/images"; // Directory for storing uploaded files.

# Image processing and tools
$wgUseImageMagick = true; // Enable ImageMagick for advanced image processing.
$wgImageMagickConvertCommand = "/usr/bin/convert"; // Path to ImageMagick's `convert` command.
$wgMaxImageArea = 10e7; // Allow images up to 100 million pixels in total area.
