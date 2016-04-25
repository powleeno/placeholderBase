<?php


// STRING UTILS ----------------------------------------------------------

function base_limit_string($string, $limit = 25, $suffix = '...')
{
	if ($suffix) {
		$sufixed_limit = $limit - strlen($suffix);
	} else {
		$sufixed_limit = $limit;
	}
	if (strlen($string) >= $limit) {
		$limited_string = substr($string, 0, $sufixed_limit) . $suffix;
	} else {
		$limited_string = $string;
	}
	return $limited_string;
}

function base_phone_string($string)
{
	$characters = array('(', ')', '-', ' ');
	foreach ($characters as $character) {
		$string = str_replace($character,'',$string);
	}
	return $string;
}


// FORM UTILS ------------------------------------------------------------

function base_form_build_message($form_first_name, $form_last_name, $form_phone, $form_email, $form_message)
{
	$body = '<html>';
	$body .= '<table width="100%">';
	$body .= '<tr><td>' . apply_filters('the_content', $form_message) . '</td></tr>';
	$body .= '<tr><td>&nbsp;</td></tr>';
	$body .= '<tr><td><strong>' . $form_first_name . ' ' . $form_last_name . '</strong></td></tr>';
	$body .= '<tr><td>' . $form_email . '</td></tr>';
	if (!empty($form_phone)) {
		$body .= '<tr><td>' . $form_phone . '</td></tr>';
	}
	$body .= '<tr><td><br/>&nbsp;</td></tr>';
	$body .= '</table>';
	$body .= '</html>';

	return $body;
}

function base_form_build_headers($first_name, $last_name, $email, $reply_to)
{
	$headers = 'From: ' . $first_name . ' ' . $last_name . ' <' . $email . '>;' . "\r\n";
	$headers .= 'Reply-to: ' . $reply_to . "\r\n";
	$headers .= 'MIME-Version: 1.0;' . "\r\n";
	$headers .= 'Content-Type: text/html; charset=utf-8;' . "\r\n";
	return $headers;
}


// MISC ------------------------------------------------------------------

// Sets favicons; place files in $favicons_path
// Favicon generator online tool :: http://www.favicon-generator.org
function base_set_favicons($favicons_path = 'images/favicon/')
{
	echo '<link rel="apple-touch-icon" sizes="57x57" href="' . $favicons_path . 'apple-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="' . $favicons_path . 'apple-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="' . $favicons_path . 'apple-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="' . $favicons_path . 'apple-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="' . $favicons_path . 'apple-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="' . $favicons_path . 'apple-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="' . $favicons_path . 'apple-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="' . $favicons_path . 'apple-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="' . $favicons_path . 'apple-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" sizes="192x192"  href="' . $favicons_path . 'android-icon-192x192.png">';
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . $favicons_path . 'favicon-32x32.png">';
	echo '<link rel="icon" type="image/png" sizes="96x96" href="' . $favicons_path . 'favicon-96x96.png">';
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . $favicons_path . 'favicon-16x16.png">';
	echo '<link rel="manifest" href="' . $favicons_path . 'manifest.json">';
	echo '<meta name="msapplication-TileColor" content="#ffffff">';
	echo '<meta name="msapplication-TileImage" content="' . $favicons_path . 'ms-icon-144x144.png">';
	echo '<meta name="theme-color" content="#ffffff">';
}