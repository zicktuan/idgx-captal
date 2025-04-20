<?php

if (!defined('ABSPATH')) {
	exit('No direct script access allowed');
}

/**
 * @package AwesomeTheme
 * @version 1.0
 * @author Nguyen Anh Tuan
 *
 * Class Init for theme
 */
class AwesomeTheme {
	static $getInstance = null;

	public $version = '1.0';

	public static function getInstance() {
		if (!(self::$getInstance instanceof self)) {
			self::$getInstance = new self();
		}
		return self::$getInstance;
	}

	protected function __construct() {
		include get_template_directory() . '/inc/AfterSetupTheme.php';
		add_action('wp_ajax_filter_posts', array($this, 'filter_posts_callback'));
        add_action('wp_ajax_nopriv_filter_posts', array($this, 'filter_posts_callback'));
		add_filter('pre_site_transient_update_core','remove_core_updates');
		add_filter( 'auto_update_theme', '__return_false' );
		add_filter('pre_site_transient_update_themes','remove_core_updates'); 
		add_filter( 'auto_update_plugin', '__return_false' );
		add_filter('pre_site_transient_update_plugins','remove_core_updates');
		// Init scripts for theme.
		$this->AwesomeScripts();
		$this->includeFunction();
		$this->frontendAjaxClass();
	}

	/**
	 * AwesomeScripts
	 * Load library object script.
	 *
	 * @return void
	 */
	protected function AwesomeScripts() {
		require_once 'inc/AwesomeScripts.php';
		new AwesomeScripts;
		// wp_enqueue_script('custom-ajax', get_template_directory_uri() . '/js/custom-ajax.js', array('jquery'), '1.0', true);
		// 	wp_localize_script('custom-ajax', 'ajax_params', array(
		// 		'ajaxurl' => admin_url('admin-ajax.php'),
		// 	));
	}

    /**
     * Include file Function handle
     * @return void
     */
    public function includeFunction(){
        require_once get_template_directory() . '/inc/Helpers/HelpersFunction.php';
        return HelpersFunction::getInstance();
    }

    public function frontendAjaxClass() {
        require_once get_template_directory() . '/inc/Ajax/FrontendAjax.php';
        new FrontendAjax();
    }

	// public function postTemplateInit()
    // {
    //     require_once get_template_directory() . '/inc/params/templates/post/PostTemplateInit.php';
    //     return PostTemplateInit::getInstance();
    // }

	public function categoryTemplateInit()
    {
        require_once get_template_directory() . '/inc/params/templates/category/CategoryTemplateInit.php';
		return CategoryTemplateInit::getInstance();
    }

	function filter_posts_callback() {
		$category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : '';
		$page = isset($_POST['page']) ? intval($_POST['page']) : 1;

		$args = array(
			'post_type' => 'post',
			'posts_per_page' => 10,
			'paged' => $page,
		);

		if (!empty($category_id)) {
			$args['cat'] = $category_id;
		}

		$query = new WP_Query($args);
		ob_start();

		if ($query->have_posts()) {
			while ($query->have_posts()) {
				$query->the_post();
				?>
				<div class="flex flex-col gap-1 md:gap-2">
					<div class="flex flex-row-reverse md:flex-row justify-between items-start gap-2 lg:gap-4 relative">
						<a class="" href="<?php the_permalink(); ?>">
							<div class="flex-shrink-0 w-10 md:w-12 lg:w-20 post-summary__image cursor-pointer">
								<div class="image overflow-hidden block w-full aspect-square lg:aspect-[16/9]">
									<?php if (has_post_thumbnail()) : 
										$thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
										<picture>
											<source srcset="<?php echo esc_url($thumb_url); ?>" media="(min-width: 1000px)">
											<img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>">
										</picture>
									<?php endif; ?>
								</div>
							</div>
						</a>
						<div class="flex-grow">
							<div class="flex flex-col gap-1">
								<p class="font-mono text-mono-12 uppercase font-medium md:text-mono-18 md:normal-case md:font-normal line-clamp-3">
									<a class="link-underline-hover" href="<?php the_permalink(); ?>">
										<?php the_title(); ?>
									</a>
								</p>
								<a class="" href="<?php the_permalink(); ?>">
									<p class="text-serif-14 line-clamp-3">
									<?php echo esc_html(get_the_excerpt()); ?>
									</p>
								</a>
								<div class="flex flex-col lg:flex-row justify-start gap-1 w-full md:max-w-[310px] xl:max-w-[320px] 2xl:max-w-[440px] 3xl:max-w-[540px]">
									<p class="flex font-mono text-mono-12 text-space-black min-w-fit text-nowrap"><?php echo get_the_date('m.d.Y'); ?></p>
									<p class="hidden lg:flex font-mono text-mono-12 text-space-black min-w-fit text-nowrap">|</p>
									<div class="flex font-mono text-mono-12 gap-[1ch] lg:max-w-[calc(100%-90px)]">
										<p>By</p>
										<span class="md:truncate"><?php the_author(); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php
			}
			$posts_html = ob_get_clean();

			// Tạo phân trang
			$start = ($page - 1) * 10 + 1;
			$end = min($page * 10, $query->found_posts);
			$pagination_info = "<p class='font-mono text-mono-12 opacity-50 hidden xl:block'>$start-$end of $query->found_posts</p>";

			ob_start();
			$big = 999999999;
			echo paginate_links(array(
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => '?paged=%#%',
				'current' => max(1, $page),
				'total' => $query->max_num_pages,
				'prev_text' => '<svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto rotate-180"><path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path></svg>',
				'next_text' => '<svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto"><path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path></svg>',
				'before_page_number' => '<span class="block button button-tag">',
				'after_page_number' => '</span>',
				'prev_next' => true,
				'show_all' => false,
				'mid_size' => 1,
				'end_size' => 1,
			));
			$pagination_links = ob_get_clean();

			$pagination_html = "<div class='flex gap-1 items-center'>$pagination_links</div>";
			$pagination_html = "<div class='flex gap-1 items-center justify-center mt-4'>$pagination_info $pagination_html</div>";

			wp_send_json_success(array(
				'posts' => $posts_html,
				'pagination' => $pagination_html,
			));
		} else {
			wp_send_json_error();
		}

		wp_die();
	}
}

function AwesomeTheme() {
	return AwesomeTheme::getInstance();
}

$GLOBALS['awesomeTheme'] = AwesomeTheme();

require_once( 'inc/Classes/CustomPrimaryMenuWalker.php' );
