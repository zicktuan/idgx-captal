<?php

    namespace MyPlugin\PostType\MetaBox\Post;

    use MyPlugin\PostType\MetaBox\AbstractMetaBox;

    class PostMetaBox extends AbstractMetaBox
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
                'pages'    => array('post'),
                'context'  => 'normal',
                'priority' => 'high',
                'fields'   => [
                    [
                        'label' => __( 'General', 'bookawesome' ),
                        'id'    => 'general',
                        'type'  => 'tab'
                    ],
                    [
                        'label' => __('Date time', 'bookawesome'),
                        'id'    => 'itsa_event_date_time',
                        'type'  => 'text',
                    ],
                    [
                        'label' => __('Location', 'bookawesome'),
                        'id'    => 'awe_event_location_meta',
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
