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
		wp_enqueue_script('jquery-1.11.2.min', get_template_directory_uri() . '/assets/js/jquery-1.11.2.min.js', array('jquery'), $awesomeTheme->version, true);
		wp_enqueue_script('bootstrap.min.', get_template_directory_uri() . '/assets/bootstrap/js/bootstrap.min.js', array('jquery'), $awesomeTheme->version, true);
		wp_enqueue_script('owl.carousel.min', get_template_directory_uri() . '/assets/owlcarouse/dist/owl.carousel.min.js', array('jquery'), $awesomeTheme->version, true);
		wp_enqueue_script('mmenu', get_template_directory_uri() . '/assets/mmenu/jquery.mmenu.js', array('jquery'), $awesomeTheme->version, true);
		wp_enqueue_script('frontend', get_template_directory_uri() . '/assets/js/frontend.js', array('jquery'), $awesomeTheme->version, true);
        

        wp_localize_script('frontend', 'awe_admin',
            array(
                'url' => admin_url(),
            )
        );
	}

	public function frontendStyles()
	{
		global $awesomeTheme;
        wp_enqueue_style('36d742fa6f75af33', get_template_directory_uri() . '/assets/_next/static/css/36d742fa6f75af33.css', $awesomeTheme->version, true);
        wp_enqueue_style('36d742fa6f75af33', get_template_directory_uri() . '/assets/_next/static/css/36d742fa6f75af33.css', $awesomeTheme->version, true);
        wp_enqueue_style('5b6964bdff897f88', get_template_directory_uri() . '/assets/_next/static/css/5b6964bdff897f88.css', $awesomeTheme->version, true);
        wp_enqueue_style('5b6964bdff897f88', get_template_directory_uri() . '/assets/_next/static/css/5b6964bdff897f88.css', $awesomeTheme->version, true);
        wp_enqueue_style('[slug]-0ea5e165854b7652', get_template_directory_uri() . '/assets/_next/static/chunks/pages/[slug]-0ea5e165854b7652.js', $awesomeTheme->version, true);
        wp_enqueue_style('3367-0205374eb3f7b060', get_template_directory_uri() . '/assets/_next/static/chunks/3367-0205374eb3f7b060.js', $awesomeTheme->version, true);
        wp_enqueue_style('7295-3d19f8d3b9ea4147', get_template_directory_uri() . '/assets/_next/static/chunks/7295-3d19f8d3b9ea4147.js', $awesomeTheme->version, true);
        wp_enqueue_style('careers-4f1e234187272549', get_template_directory_uri() . '/assets/_next/static/chunks/pages/careers-4f1e234187272549.js', $awesomeTheme->version, true);
        wp_enqueue_script('polyfills-c67a75d1b6f99dc8', get_template_directory_uri() . '/assets/js/polyfills-c67a75d1b6f99dc8.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('175675d1-ea6ec12d1ec73e3b', get_template_directory_uri() . '/assets/_next/static/chunks/175675d1-ea6ec12d1ec73e3b.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('3114-9ad26c08e3a6fd59', get_template_directory_uri() . '/assets/_next/static/chunks/3114-9ad26c08e3a6fd59.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('8370.b0f6899125f09c35', get_template_directory_uri() . '/assets/_next/static/team/8370.b0f6899125f09c35.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('6296.9ce23bc47085f63d', get_template_directory_uri() . '/assets/_next/static/chunks/6296.9ce23bc47085f63d.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('webpack-12e27c77f476249d', get_template_directory_uri() . '/assets/_next/static/chunks/webpack-12e27c77f476249d.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('framework-cfbe8447b8b751ea', get_template_directory_uri() . '/assets/_next/static/chunks/framework-cfbe8447b8b751ea.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('main-9a281b117d523626', get_template_directory_uri() . '/assets/_next/static/chunks/main-9a281b117d523626.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('_app-64c08ce1425afd18', get_template_directory_uri() . '/assets/_next/static/chunks/pages/_app-64c08ce1425afd18.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('8294-352a030481cb472f', get_template_directory_uri() . '/assets/_next/static/chunks/8294-352a030481cb472f.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('6674-9dd4e66fdcb6b802', get_template_directory_uri() . '/assets/_next/static/chunks/6674-9dd4e66fdcb6b802.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('index-6d8b7e8cfd91f0c1', get_template_directory_uri() . '/assets/_next/static/chunks/pages/index-6d8b7e8cfd91f0c1.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('_buildManifest', get_template_directory_uri() . '/assets/js/_buildManifest.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_script('_ssgManifest', get_template_directory_uri() . '/assets/js/_ssgManifest.js', array('jquery'), $awesomeTheme->version, true);
        wp_enqueue_style('1358-b6def54e6ad0bd04', get_template_directory_uri() . '/assets/js/1358-b6def54e6ad0bd04.js', $awesomeTheme->version, true);
        wp_enqueue_style('[slug]-bd9ce1a70a8a1f47', get_template_directory_uri() . '/assets/_next/static/team/[slug]-bd9ce1a70a8a1f47.js', $awesomeTheme->version, true);
        
		
        wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css', $awesomeTheme->version, true);
	}

	public function backendScripts() {
        global $awesomeTheme;
        // wp_enqueue_script('sweetalert2', get_template_directory_uri() . '/assets/lib/sweetalert2/sweetalert2.js', array('jquery'), $awesomeTheme->version, true);
        // wp_enqueue_style('sweetalert2', get_template_directory_uri() . '/assets/lib/sweetalert2/sweetalert2.css', $awesomeTheme->version, true);
    }
}
?>
