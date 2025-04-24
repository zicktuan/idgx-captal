<?php

namespace MyPlugin\Taxonomies;

class CareerCategoryTaxonomies extends AbstractTaxonomies {

    protected $taxonomie = 'career';

	protected $argsPostType = ['itsa_career_pt'];

    public function __construct(){
		parent::__construct();
	}

	public function labels(){
        return array(
			'name'              => _x( 'Categories Career', 'taxonomy general name', 'bookawesome' ),
			'singular_name'     => _x( 'Careers', 'taxonomy singular name', 'bookawesome' ),
			'search_items'      => __( 'Search Career Category', 'bookawesome' ),
			'all_items'         => __( 'All Career Category', 'bookawesome' ),
			'parent_item'       => __( 'Parent Career Category', 'bookawesome' ),
			'parent_item_colon' => __( 'Parent Career Category:', 'bookawesome' ),
			'edit_item'         => __( 'Edit Career Category', 'bookawesome' ),
			'update_item'       => __( 'Update Career Category', 'bookawesome' ),
			'add_new_item'      => __( 'Add New Career Category', 'bookawesome' ),
			'new_item_name'     => __( 'New Career Category Name', 'bookawesome' ),
			'menu_name'         => __( 'Category Career', 'bookawesome' ),
		);
    }

    public function argsRegister(){
        return array(
			'hierarchical'      => true,
			'labels'            => $this->labels(),
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'rewrite'           => array( 'slug' => 'career' ),
		);
    }

    public function taxonomieName(){
		return $this->taxonomie;
	}
}