<?php
    namespace MyPlugin\Shortcode\Home;

    use MyPlugin\Shortcode\AbstractShortcode;

    class ShortcodeCareer extends AbstractShortcode
    {
        protected $parent;

        public function __construct($self = null) {
            $this->parent = $self;
            add_shortcode($this->get_name(), array($this, 'render'));
            vc_lean_map($this->get_name(), array($this, 'map'));
        }

        /**
         * Get ShortCode name.
         *
         * @return string
         */
        public function get_name() {
            return 'itsa_career';
        }

        /**
         * ShortCode handler.
         *
         * @param array $atts ShortCode attributes.
         *
         * @return string ShortCode output.
         */
        public function render($atts) {
            $atts = vc_map_get_attributes($this->get_name(), $atts);
            $atts = array_map('trim', $atts);

            $categoryIds = !empty($atts['itsa_career_category_list']) ? explode(',', $atts['itsa_career_category_list']) : [];
            
            $categories = get_terms([
                'taxonomy'   => 'career',
                'include'    => $categoryIds,
                'hide_empty' => false,
            ]);

            $categoriesList = $categories;

            ob_start();
            include $this->parent->locateTemplate('home/shortcode-career.tpl.php');
            return ob_get_clean();
        }


        /**
         * Get shortCode settings.
         *
         * @return array
         *
         * @see vc_lean_map()
         */
        public function map() {
            $categories = get_terms([
                'taxonomy'   => 'career',
                'hide_empty' => false,
            ]);
            $argsCat = [];
            foreach ($categories as $cat) {
                $tmp = [];
                $tmp['label'] = $cat->name;
                $tmp['value'] = $cat->term_id;
                $argsCat[] = $tmp;
            }
            $params = array(
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_career_nav_title',
                    'heading'    => esc_html__('Nav Title', 'bookawesome')
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_career_nav_desc',
                    'heading'    => esc_html__('Nav Desc', 'bookawesome')
                ),
                array(
                    'type'        => 'autocomplete',
                    'param_name'  => 'itsa_career_category_list',
                    'heading'     => esc_html__('Select Category', 'bookawesome'),
                    'description' => esc_html__('Select multiple categories', 'bookawesome'),
                    'settings'    => array(
                        'multiple'       => true,
                        'sortable'       => true,
                        'min_length'     => 1,
                        'no_hide'        => true,
                        'unique_values'  => true,
                        'display_inline' => true,
                        'values'         => $argsCat,
                    ),
                    'save_always' => true,
                ),
                
            );

            return array(
                'name'        => esc_html__('Careers', 'bookawesome'),
                'description' => esc_html__('Careers', 'bookawesome'),
                'category'    => $this->get_category(),
                'icon'        => $this->get_icon(),
                'params'      => $params
            );
        }
    }
