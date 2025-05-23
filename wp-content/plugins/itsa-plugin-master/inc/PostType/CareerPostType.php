<?php

namespace MyPlugin\PostType;

class CareerPostType extends AbstractPostType {

    protected $posType = 'itsa_career_pt';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Handle add metabox for post type.
     * @return void
     */
    public function metaBox() {
        // add_filter( 'manage_itsa_actions_pt_posts_columns', array( $this, 'set_custom_edit_res_columns' ) );
        // add_action( 'manage_itsa_services_pt_posts_custom_column' , array( $this, 'custom_res_column') , 10, 3 );
    }

    public function labels() {
        return array(
            'name'                   => _x('Career Services', 'Career General Name', 'bookawesome'),
            'singular_name'          => _x('IDGX Career', 'IDGX Career Singular Name', 'bookawesome'),
            'menu_name'              => __('Manage Career', 'bookawesome'),
            'name_admin_bar'         => __('IDGX Career', 'bookawesome'),
            'archives'               => __('IDGX Career Archives', 'bookawesome'),
            'attributes'             => __('IDGX Career Attributes', 'bookawesome'),
            'parent_item_colon'      => __('Parent IDGX Career:', 'bookawesome'),
            'all_items'              => __('List Career', 'bookawesome'),
            'new_item'               => __('New Events', 'bookawesome'),
            'edit_item'              => __('Detail', 'bookawesome'),
            'update_item'            => __('Update IDGX Career', 'bookawesome'),
            'search_items'           => __('Search', 'bookawesome'),
            'not_found'              => __('Not found', 'bookawesome'),
            'not_found_in_trash'     => __('Not found in Trash', 'bookawesome'),
            'featured_image'         => __('Featured Image', 'bookawesome'),
            'set_featured_image'     => __('Set featured image', 'bookawesome'),
            'remove_featured_image'  => __('Remove featured image', 'bookawesome'),
            'use_featured_image'     => __('Use as featured image', 'bookawesome'),
            'insert_into_item'       => __('Insert into IDGX Career', 'bookawesome'),
            'uploaded_to_this_item'  => __('Uploaded to this IDGX Career', 'bookawesome'),
            'items_list'             => __('IDGX Careert list', 'bookawesome'),
            'items_list_navigation'  => __('IDGX Career list navigation', 'bookawesome'),
            'filter_items_list'      => __('Filter awe career list', 'bookawesome'),
        );
    }

    public function argsRegister() {

        return array(
            'label'                  => __('IDGX Career', 'bookawesome'),
            'menu_icon'              => __('dashicons-products', 'bookawesome'),
            'description'            => __('IDGX Career Description', 'bookawesome'),
            'rewrite'                => array('slug' => "career-service"),
            'labels'                 => $this->labels(),
            'supports'               => [ 'title', 'excerpt', 'editor', 'thumbnail' ],
            'taxonomies'             => ['post_tag'],
            'hierarchical'           => false,
            'public'                 => true,
            'show_ui'                => true,
            'menu_position'          => 6,
            'show_in_admin_bar'      => true,
            'show_in_nav_menus'      => true,
            'can_export'             => true,
            'has_archive'            => true,
            'exclude_from_search'    => false,
            'publicly_queryable'     => true,
            'capability_type'        => 'page',
        );
    }

    public function postTypeName() {
        return $this->posType;
    }
}
