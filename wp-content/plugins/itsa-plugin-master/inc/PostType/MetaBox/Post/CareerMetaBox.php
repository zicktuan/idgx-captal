<?php

    namespace MyPlugin\PostType\MetaBox\Post;

    use MyPlugin\PostType\MetaBox\AbstractMetaBox;

    class CareerMetaBox extends AbstractMetaBox
    {
        protected $useOptionTree = true;

        public function __construct($objectPosttype)
        {
            parent::__construct($objectPosttype);
        }

        public function register(){}

        public function output($post)
        {
            $informationMetaBox = [
                'id'       => 'awe_post_meta_box',
                'title'    => __('Post Meta Box', 'bookawesome'),
                'desc'     => '',
                'pages'    => array('itsa_career_pt'),
                'context'  => 'normal',
                'priority' => 'high',
                'fields'   => [
                    [
                        'label' => __( 'General', 'bookawesome' ),
                        'id'    => 'general',
                        'type'  => 'tab'
                    ],
                    [
                        'label' => __('Company Name', 'bookawesome'),
                        'id'    => 'itsa_company_name',
                        'type'  => 'text',
                    ],
                    [
                        'label' => __('Location', 'bookawesome'),
                        'id'    => 'itsa_localtion',
                        'type'  => 'text',
                    ],
                ]
            ];

            /**
             * Register our meta boxes using the
             * ot_register_meta_box() function.
             */

            ot_register_meta_box($informationMetaBox);
        }

        public function save($post_id){}
    }
