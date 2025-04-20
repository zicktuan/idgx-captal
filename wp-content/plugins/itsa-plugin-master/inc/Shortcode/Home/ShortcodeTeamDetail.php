<?php
    namespace MyPlugin\Shortcode\Home;

    use MyPlugin\Shortcode\AbstractShortcode;

    class ShortcodeTeamDetail extends AbstractShortcode
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
            return 'itsa_team_detail';
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
            include $this->parent->locateTemplate('home/shortcode-team-detail.tpl.php');
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
                    'type'       => 'attach_image',
                    'param_name' => 'itsa_team_detail_avt',
                    'heading'    => esc_html__('Avt', 'bookawesome')
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_team_detail_name',
                    'heading'    => esc_html__('Name', 'bookawesome')
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_team_detail_position',
                    'heading'    => esc_html__('Position', 'bookawesome')
                ),
                array(
                    'type'       => 'textarea',
                    'param_name' => 'itsa_team_detail_desc',
                    'heading'    => esc_html__('Description', 'bookawesome')
                ),
                array(
                    'type'       => 'param_group',
                    'param_name' => 'items',
                    'heading'    => esc_html__( 'List social', 'bookawesome' ),
                    'params'     => array(
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'name',
                            'heading'    => esc_html__('Social name', 'bookawesome')
                        ),
                        array(
                            'type'       => 'textfield',
                            'param_name' => 'url',
                            'heading'    => esc_html__('Url', 'bookawesome')
                        ),
                    )
                ),
                array(
                    'type'       => 'textfield',
                    'param_name' => 'itsa_team_detail_url_back',
                    'heading'    => esc_html__('Url back to other page', 'bookawesome')
                ),
            );

            return array(
                'name'        => esc_html__('Team Detail', 'bookawesome'),
                'description' => esc_html__('Team', 'bookawesome'),
                'category'    => $this->get_category(),
                'icon'        => $this->get_icon(),
                'params'      => $params
            );
        }
    }
