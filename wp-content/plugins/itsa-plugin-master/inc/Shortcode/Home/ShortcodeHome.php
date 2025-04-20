<?php
    namespace MyPlugin\Shortcode\Home;

    use MyPlugin\Shortcode\AbstractShortcode;

    class ShortcodeHome extends AbstractShortcode
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
            return 'itsa_home';
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
            ob_start();
            include $this->parent->locateTemplate('home/shortcode-home.tpl.php');
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
            $params = array(
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_home_title_1',
                    'heading'    => esc_html__('Title 1', 'bookawesome')
                ),
                array(
                    'type'       => 'textarea',
                    'param_name' => 'itsa_home_desc_1',
                    'heading'    => esc_html__('Description 1', 'bookawesome')
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_home_url_1',
                    'heading'    => esc_html__('Url 1', 'bookawesome')
                ),

                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_home_title_2',
                    'heading'    => esc_html__('Title 2', 'bookawesome')
                ),
                array(
                    'type'       => 'textarea',
                    'param_name' => 'itsa_home_desc_2',
                    'heading'    => esc_html__('Description 2', 'bookawesome')
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_home_url_2',
                    'heading'    => esc_html__('Url 2', 'bookawesome')
                ),
                array(
                    'type'       => 'param_group',
                    'param_name' => 'items',
                    'heading'    => esc_html__( 'List item', 'bookawesome' ),
                    'params'     => array(
                        array(
                            'type'       => 'attach_image',
                            'param_name' => 'image',
                            'heading'    => esc_html__('Avt', 'bookawesome')
                        )
                    )
                ),

                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_home_title_3',
                    'heading'    => esc_html__('Title 3', 'bookawesome')
                ),
                array(
                    'type'       => 'textarea',
                    'param_name' => 'itsa_home_desc_3',
                    'heading'    => esc_html__('Description 1', 'bookawesome')
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_home_url_3',
                    'heading'    => esc_html__('Url 3', 'bookawesome')
                ),
            );

            return array(
                'name'        => esc_html__('Home', 'bookawesome'),
                'description' => esc_html__('Home', 'bookawesome'),
                'category'    => $this->get_category(),
                'icon'        => $this->get_icon(),
                'params'      => $params
            );
        }
    }
