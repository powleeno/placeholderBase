<?php


// Helpers
require_once 'base/helpers.php';


// Browser detection
require_once 'base/browser-detection.php';


// Google Fonts
require_once 'base/google-fonts.php';


// Scripts
require_once 'base/scripts.php';


function base_set_styles($styles_path = 'css/base.css')
{
	echo '<link rel="stylesheet" type="text/css" href="' . $styles_path . '">';

}