<?php


function base_set_scripts($set_in_footer)
{
	$base_scripts = array();
	$base_scripts_path = 'scripts/';

	// HEADER ------------------------------------------------------------

	/** jQuery :: http://jquery.com/ **/
	$base_scripts['jquery'] = array(
		'active' => true,
		'deregister_first' => true,
		'handler' => 'jquery',
		'cdn' => 'http://code.jquery.com/jquery-1.11.3.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/jquery/jquery-1.11.3.min.js',
		'dependencies' => false,
		'version' => '1.11.3',
		'set_in_footer' => false
	);

	/** jQuery Mousewheel :: https://github.com/jquery/jquery-mousewheel **/
	$base_scripts['jquery-mousewheel'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'jquery-mousewheel',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.12/jquery.mousewheel.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/mousewheel/jquery.mousewheel.min.js',
		'dependencies' => false,
		'version' => '3.1.12',
		'set_in_footer' => false
	);

	// FOOTER ------------------------------------------------------------

	/** from Eric B. Dev - Simple Grid Wordpress :: https://github.com/ericbdev/simpleGridWordPress **/
	$base_scripts['ericbdev'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'ericbdev',
		'cdn' => '', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/ericbdev/ericbdev.js',
		'dependencies' => false,
		'version' => '1.0.0',
		'set_in_footer' => true
	);

	/** Foundation Zurb :: http://foundation.zurb.com/ **/
	$base_scripts['foundation'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'foundation',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation/foundation.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/foundation/foundation.min.js',
		'dependencies' => false,
		'version' => '5.5.2',
		'set_in_footer' => true
	);
	$base_scripts['foundation_topbar'] = array( // only here because doesn't work if passed as dependency to 'foundation'
		'active' => true,
		'deregister_first' => false,
		'handler' => 'foundation_topbar',
		'cdn' => 'http://cdnjs.cloudflare.com/ajax/libs/foundation/5.5.2/js/foundation/foundation.topbar.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/foundation/components/foundation.topbar.js',
		'dependencies' => false,
		'version' => '5.5.2',
		'set_in_footer' => true
	);

	/** Google Maps JavaScript API :: https://developers.google.com/maps/documentation/javascript/ **/
	$base_scripts['google_js_api'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'google_js_api',
		'cdn' => 'http://maps.googleapis.com/maps/api/js?language=en', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/google/google-maps-api-en.js',
		'dependencies' => false,
		'version' => '3.0.0',
		'set_in_footer' => true
	);

	/** Validate :: https://github.com/jzaefferer/jquery-validation **/
	$base_scripts['jQuery_validate'] = array(
		'active' => false,
		'deregister_first' => false,
		'handler' => 'jQuery_validate',
		'cdn' => 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.min.js', // make sure the protocol is 'http' and not 'https'
		'local' => $base_scripts_path . 'vendor/validate/jquery.validate.min.js',
		'dependencies' => false,
		'version' => '1.14.0',
		'set_in_footer' => true
	);


	/** BASE THEME SCRIPTS ---------------------------------------- **/
	$base_scripts['base'] = array(
		'active' => true,
		'deregister_first' => false,
		'handler' => 'base',
		'cdn' => '',
		'local' => $base_scripts_path . 'base.js',
		'dependencies' => array(
			array(
				'active' => true,
				'deregister_first' => false,
				'handler' => 'base_functions',
				'cdn' => '',
				'local' => $base_scripts_path . 'base/functions.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			),
			array(
				'active' => false,
				'deregister_first' => false,
				'handler' => 'base_google_map',
				'cdn' => '',
				'local' => $base_scripts_path . 'base/google-map.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			),
			array(
				'active' => true,
				'deregister_first' => false,
				'handler' => 'base_inits',
				'cdn' => '',
				'local' => $base_scripts_path . 'base/inits.js',
				'dependencies' => false,
				'version' => '1.0',
				'set_in_footer' => true
			)
		),
		'version' => '1.0',
		'set_in_footer' => true
	);

	base_import_scripts($base_scripts, $set_in_footer);

}

function base_import_scripts($base_scripts, $set_in_footer)
{
	if (!empty($base_scripts)) {
		foreach ($base_scripts as $base_script) {
			if (!empty($base_script['active'])) {
				if (!empty($base_script['cdn'])) {
					$base_http_headers = get_headers($base_script['cdn']);
					if (substr($base_http_headers[0], 9, 3) == '200') {
						$base_script_source = $base_script['cdn'];
					}
				} else if (!empty($base_script['local'])) {
					$base_script_source = $base_script['local'];
				} else {
					continue;
				}
				if (!empty($set_in_footer)) {
					if (!empty($base_script['set_in_footer'])) {
						echo '<script src="' . $base_script_source . '"></script>';
					}
				}
				if ($set_in_footer) {
					if ($base_script['set_in_footer']) {
						echo '<script src="' . $base_script_source . '"></script>';
					}
				}
			}
		}
	}
}