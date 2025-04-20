<?php

namespace MyPlugin\Shortcode;

class ShortcodeNews extends AbstractShortcode {

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
        return 'itsa_post';
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

        $post_ids = explode(',', $atts['post_list']);
        $args = array(
            'post__in' => $post_ids,
            'post_type' => 'post',
            'orderby' => 'post__in',
        );

        $posts = get_posts($args);

        ob_start();
        include $this->parent->locateTemplate('shortcode-post.tpl.php');
        return ob_get_clean();
    }

    private function getMenuOptions() {
        $menuOption = array( esc_html__('Select a menu', 'bookawesome') => '' ); // Giá trị mặc định
    
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

    private function getPostList() {
        $posts = get_posts([
            'numberposts' => -1,
            'post_type' => 'post'
        ]);
        $results = [];
        foreach ($posts as $post) {
            $results[] = [
                'label' => $post->post_title,
                'value' => $post->ID
            ];
        }
        return $results;
    }

    /**
     * Get shortCode settings.
     *
     * @return array
     *
     * @see vc_lean_map()
     */
    public function map() {
        $categories = get_categories();
        $argsCat = [];
        foreach ($categories as $cat) {
            $tmp = [];
            $tmp['label'] = $cat->name;
            $tmp['value'] = $cat->term_id;
            $argsCat[] = $tmp;
        }
        $argsPost = [];

        $menuOption = $this->getMenuOptions();
        $params = array(
            array(
                'type'       => 'textfield',
                'param_name' => 'itsa_post_menu_title',
                'heading'    => esc_html__('Menu title', 'bookawesome')
            ),
            array(
                'type'        => 'autocomplete',
                'param_name'  => 'category_list',
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
            array(
                'type'       => 'textfield',
                'param_name' => 'itsa_post_post_title',
                'heading'    => esc_html__('Post title', 'bookawesome')
            ),
            array(
                'type'        => 'autocomplete',
                'param_name'  => 'post_list',
                'heading'     => esc_html__('Select post feature', 'bookawesome'),
                'settings'    => array(
                    'multiple'       => true,
                    'sortable'       => true,
                    'min_length'     => 1,
                    'no_hide'        => true,
                    'unique_values'  => true,
                    'display_inline' => true,
                    'values'         => $this->getPostList()
                ),
                'save_always' => true,
            ),
            array(
                'type'        => 'autocomplete',
                'param_name'  => 'post_list',
                'heading'     => esc_html__('Select Posts', 'bookawesome'),
                'description' => esc_html__('Select multiple posts', 'bookawesome'),
                'settings'    => array(
                    'multiple'       => true,
                    'sortable'       => true,
                    'min_length'     => 1,
                    'no_hide'        => true,
                    'unique_values'  => true,
                    'display_inline' => true,
                    'values'         => $argsPost,
                ),
                'save_always' => true,
            ),
        );

        return array(
            'name'        => esc_html__('Post', 'bookawesome'),
            'description' => esc_html__('Post', 'bookawesome'),
            'category'    => $this->get_category(),
            'icon'        => $this->get_icon(),
            'params'      => $params
        );
    }
}
