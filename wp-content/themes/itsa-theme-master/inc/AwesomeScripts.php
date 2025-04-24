<?php

/**
 * 
 */
class AwesomeScripts
{

	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'frontendScripts'));
		add_action('wp_enqueue_scripts', array($this, 'frontendStyles'));
        add_action( 'admin_enqueue_scripts', array($this, 'backendScripts') );
	}

	public function frontendScripts()
	{
		global $awesomeTheme;
		// wp_enqueue_script('jquery-1.11.2.min', get_template_directory_uri() . '/assets/js/jquery-1.11.2.min.js', array('jquery'), $awesomeTheme->version, true);
		// wp_enqueue_script('bootstrap.min.', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), $awesomeTheme->version, true);
		// wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/assets/owlcarouse/dist/owl.carousel.min.js', array('jquery'), $awesomeTheme->version, true);
		// wp_enqueue_script('mmenu', get_template_directory_uri() . '/assets/mmenu/jquery.mmenu.js', array('jquery'), $awesomeTheme->version, true);
		wp_enqueue_script('customjs', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), $awesomeTheme->version, true);
        

        // wp_localize_script('customjs', 'ajax_params', [
        //     'ajaxurl' => admin_url('admin-ajax.php'),
        // ]);
	}

	public function frontendStyles()
	{
		global $awesomeTheme;
        // wp_enqueue_style('customjs', get_template_directory_uri() . '/assets/_next/static/team/[slug]-bd9ce1a70a8a1f47.js', $awesomeTheme->version, true);
        // wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', $awesomeTheme->version, true);
        	
	}

	public function backendScripts() {
        global $awesomeTheme;
        // wp_enqueue_script('sweetalert2', get_template_directory_uri() . '/assets/lib/sweetalert2/sweetalert2.js', array('jquery'), $awesomeTheme->version, true);
        // wp_enqueue_style('sweetalert2', get_template_directory_uri() . '/assets/lib/sweetalert2/sweetalert2.css', $awesomeTheme->version, true);
    }
}
?>
