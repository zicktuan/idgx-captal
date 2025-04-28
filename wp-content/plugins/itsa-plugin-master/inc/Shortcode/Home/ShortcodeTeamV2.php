<?php
    namespace MyPlugin\Shortcode\Home;

    use MyPlugin\Shortcode\AbstractShortcode;

    class ShortcodeTeamV2 extends AbstractShortcode
    {
        protected $parent;

        public function __construct($self = null) {
            $this->parent = $self;
            add_shortcode($this->get_name(), array($this, 'render'));
            vc_lean_map($this->get_name(), function() {
                return $this->map();
            });
        }

        /**
         * Get ShortCode name.
         *
         * @return string
         */
        public function get_name() {
            return 'itsa_team_v2';
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
            $listItemsData = vc_param_group_parse_atts( $atts['items_data'] );
            
            ob_start();
            include $this->parent->locateTemplate('home/shortcode-team-v2.tpl.php');
            return ob_get_clean();
        }

        private function getMenuOptions() {
            $menuOption = array( esc_html__('Select a menu', 'bookawesome') => '' );
        
            // Lấy danh sách items từ Visual Composer
            if (isset($_POST['action']) && $_POST['action'] === 'vc_edit_form') {
                if (!empty($_POST['params']['items'])) {
                    $listItems = vc_param_group_parse_atts($_POST['params']['items']);
                    foreach ($listItems as $item) {
                        if (!empty($item['name'])) {
                            $menuOption[$item['name']] = $item['name'];
                        }
                        if (!empty($item['sub_items'])) {
                            $subItems = vc_param_group_parse_atts($item['sub_items']);
                            foreach ($subItems as $subItem) {
                                if (!empty($subItem['name'])) {
                                    $submenuKey = $item['name'] . ' - ' . $subItem['name'];
                                    $menuOption[$submenuKey] = $submenuKey;
                                }
                            }
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
                    'param_name' => 'itsa_team_data_title',
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
                        array(
                            'type'       => 'param_group',
                            'param_name' => 'sub_items',
                            'heading'    => esc_html__('Sub menu', 'bookawesome'),
                            'params'     => array(
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'name',
                                    'heading'    => esc_html__('Menu name', 'bookawesome')
                                ),
                            )
                        ),
                    )
                ),
                array(
                    'type'       => 'param_group',
                    'param_name' => 'items_data',
                    'heading'    => esc_html__( 'List Team', 'bookawesome' ),
                    'params'     => array(
                        array(
                            'type'       => 'dropdown',
                            'param_name' => 'selected_menu',
                            'heading'    => esc_html__('Select Team Menu', 'bookawesome'),
                            'value'      => array_merge(
                                array(esc_html__('Select a menu', 'bookawesome') => ''),
                                $menuOption
                            ),
                            'description' => esc_html__('Choose a menu from the Team shortcode.', 'bookawesome'),
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'title',
                            'heading'    => esc_html__('Title', 'bookawesome')
                        ),
                        array(
                            'type'       => 'param_group',
                            'param_name' => 'sub_items',
                            'heading'    => esc_html__('Items', 'bookawesome'),
                            'params'     => array(
                                array(
                                    'type'       => 'attach_image',
                                    'param_name' => 'img',
                                    'heading'    => esc_html__('Avt', 'bookawesome')
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'name',
                                    'heading'    => esc_html__('Name', 'bookawesome')
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'position',
                                    'heading'    => esc_html__('Position', 'bookawesome')
                                ),
                                array(
                                    'type'       => 'textfield',
                                    'param_name' => 'url',
                                    'heading'    => esc_html__('Url', 'bookawesome')
                                ),
                            )
                        ),
                    )
                )
                
            );

            return array(
                'name'        => esc_html__('Team Data V2', 'bookawesome'),
                'description' => esc_html__('Team', 'bookawesome'),
                'category'    => $this->get_category(),
                'icon'        => $this->get_icon(),
                'params'      => $params
            );
        }
    }
