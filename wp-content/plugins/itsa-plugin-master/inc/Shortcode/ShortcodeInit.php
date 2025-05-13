<?php
namespace MyPlugin\Shortcode;


use MyPlugin\Shortcode\Home\ShortcodeHome;
use MyPlugin\Shortcode\Home\ShortcodeAbout;
use MyPlugin\Shortcode\Home\ShortcodeTeamData;
use MyPlugin\Shortcode\Home\ShortcodePortfolio;
use MyPlugin\Shortcode\Home\ShortcodeTeamDetail;
use MyPlugin\Shortcode\Home\ShortcodeCareer;
use MyPlugin\Shortcode\ShortcodeNews;
use MyPlugin\Shortcode\Home\ShortcodeTeamV2;
// use MyPlugin\Shortcode\ShortcodeFormRegister;

/**
 * @author lookawesome team
 * @version 1.0
 * @package Shortcode
 * 
 * Init shortCode for theme lookAwesome
*/
class ShortcodeInit 
{
	function __construct() {
		add_action( 'plugins_loaded', array($this, 'includeTemplate') );
	}

	public function includeTemplate() {
        
		new ShortcodeHome($this);
		new ShortcodeAbout($this);
		new ShortcodeTeamData($this);
		new ShortcodePortfolio($this);
		new ShortcodeTeamDetail($this);
		new ShortcodeNews($this);
		new ShortcodeCareer($this);
		new ShortcodeTeamV2($this);
		// new ShortcodeFormRegister($this);
		// new ShortcodeServiceDetail($this);
		// new ShortcodeContact($this);
	}

	/**
	 * Get template path.
	 *
	 * @param  string $filename Filename with extension.
	 * @return string           Template path.
	 */
	public function locateTemplate( $filename ) {
		$theme_dir = apply_filters( 'lookawesome_shortcode_template_theme_dir', 'shortcodes/' );
		$plugin_path = MYPLUGIN_PLUGIN_DIR . 'templates/shortcodes/';

		$path = '';

		if ( locate_template( $theme_dir . $filename ) ) {
			$path = locate_template( $theme_dir . $filename );
		} elseif ( file_exists( $plugin_path . $filename ) ) {
			$path = $plugin_path . $filename;
		}

		return apply_filters( 'lookawesome_shortcode_locate_template', $path, $filename );
	}
}
