<?php

namespace MyPlugin\Taxonomies;

use MyPlugin\Taxonomies\CareerCategoryTaxonomies;
/**
 * @author lookawesome team
 * @version 1.0
 * @package taxonomie
 * 
 * Register taxonomie for theme designer
 */
class TaxonomiesInit {

	public function __construct(){
		new CareerCategoryTaxonomies();
	}
}