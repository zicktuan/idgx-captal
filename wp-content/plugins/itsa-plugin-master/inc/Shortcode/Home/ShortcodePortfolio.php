<?php
    namespace MyPlugin\Shortcode\Home;

    use MyPlugin\Shortcode\AbstractShortcode;

    class ShortcodePortfolio extends AbstractShortcode
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
            return 'itsa_portfolio';
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
            $listItems = vc_param_group_parse_atts( $atts['items'] );
            $listItemsData = vc_param_group_parse_atts( $atts['items_portfolio'] );
            
            ob_start();
            include $this->parent->locateTemplate('home/shortcode-portfolio.tpl.php');
            return ob_get_clean();
        }

        private function getMenuOptions() {
            $menuOption = array( esc_html__('Select a menu', 'bookawesome') => '' ); // Giá trị mặc định
        
            if (isset($_POST['action']) && $_POST['action'] === 'vc_edit_form') {
                if (!empty($_POST['params']['items'])) {
                    $listItems = vc_param_group_parse_atts($_POST['params']['items']);
                    foreach ($listItems as $item) {
                        if (!empty($item['name'])) {
                            $menuOption[$item['name']] = $item['name'];
                        }
                    }
                }
            }
        
            return $menuOption;
        }


        /**
         * Get shortCode settings.
         *
         * @return array
         *
         * @see vc_lean_map()
         */
        public function map() {
            $menuOption = $this->getMenuOptions();
            $params = array(
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_portfolio_title',
                    'heading'    => esc_html__('Title', 'bookawesome')
                ),
                array(
                    'type'       => 'param_group',
                    'param_name' => 'items',
                    'heading'    => esc_html__( 'Menus', 'bookawesome' ),
                    'params'     => array(
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'name',
                            'heading'    => esc_html__('Menu name', 'bookawesome')
                        ),
                    )
                ),
                array(
                    'type'       => 'param_group',
                    'param_name' => 'items_portfolio',
                    'heading'    => esc_html__( 'List porfolio', 'bookawesome' ),
                    'params'     => array(
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title',
                            'heading'    => esc_html__('Title', 'bookawesome')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'path',
                            'heading'    => esc_html__('Url part', 'bookawesome')
                        ),
                        array(
                            'type'       => 'textarea',
                            'param_name' => 'desc',
                            'heading'    => esc_html__('Description', 'bookawesome')
                        ),
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'selected_menu',
                            'heading'    => esc_html__('Select Menu', 'bookawesome'),
                            'value'      => array_merge(
                                array(esc_html__('Select a menu', 'bookawesome') => ''),
                                $menuOption
                            ),
                            'description' => esc_html__('Choose a menu from the Portfolio shortcode.', 'bookawesome'),
                        ),
                        array(
                            'type'       => 'param_group',
                            'param_name' => 'sub_items',
                            'heading'    => esc_html__('Items', 'bookawesome'),
                            'params'     => array(
                                array(
                                    'type'       => 'attach_image',
                                    'param_name' => 'img',
                                    'heading'    => esc_html__('Image', 'bookawesome')
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'name',
                                    'heading'    => esc_html__('Portfolio name', 'bookawesome')
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'desc',
                                    'heading'    => esc_html__('Description', 'bookawesome')
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'url',
                                    'heading'    => esc_html__('Url', 'bookawesome')
                                ),
                                
                            )
                        ),
                    )
                ),
                
            );

            return array(
                'name'        => esc_html__('Portfolio', 'bookawesome'),
                'description' => esc_html__('Portfolio', 'bookawesome'),
                'category'    => $this->get_category(),
                'icon'        => $this->get_icon(),
                'params'      => $params
            );
        }
    }
