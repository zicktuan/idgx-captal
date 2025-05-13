<?php

namespace MyPlugin\Shortcode;

class ShortcodeFormRegister extends AbstractShortcode {

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
        return 'itsa_form_register';
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

        ob_start();
        include $this->parent->locateTemplate('shortcode-form-register.tpl.php');
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
                'param_name' => 'itsa_post_menu_title',
                'heading'    => esc_html__('Menu title', 'bookawesome')
            ),
            
            array(
                'type'       => 'textfield',
                'param_name' => 'itsa_post_post_title',
                'heading'    => esc_html__('Post title', 'bookawesome')
            ),
        );

        return array(
            'name'        => esc_html__('Form Register', 'bookawesome'),
            'description' => esc_html__('General', 'bookawesome'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
