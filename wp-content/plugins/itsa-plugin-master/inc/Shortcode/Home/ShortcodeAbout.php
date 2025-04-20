<?php
    namespace MyPlugin\Shortcode\Home;

    use MyPlugin\Shortcode\AbstractShortcode;

    class ShortcodeAbout extends AbstractShortcode
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
            return 'itsa_about';
        }

        /**
         * ShortCode handler.
         *
         * @param array $atts ShortCode attributes.
         *
         * @return string ShortCode output.
         */
        public function render($atts, $content) {
            $atts = vc_map_get_attributes($this->get_name(), $atts);
            $atts = array_map('trim', $atts);
            $atts['content'] = $content;
            ob_start();
            include $this->parent->locateTemplate('home/shortcode-about.tpl.php');
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
                    'param_name' => 'itsa_about_title',
                    'heading'    => esc_html__('Title', 'bookawesome')
                ),
                array(
                    'type'       => 'textarea_html',
                    'param_name' => 'content',
                    'heading'    => esc_html__('Content', 'bookawesome')
                ),
            );

            return array(
                'name'        => esc_html__('About', 'bookawesome'),
                'description' => esc_html__('About', 'bookawesome'),
                'category'    => $this->get_category(),
                'icon'        => $this->get_icon(),
                'params'      => $params
            );
        }
    }
