<?php

    class FrontendAjax {

        public function __construct()
        {
            $argsAction = [
                // 'awe_reservation'  => array($this, 'aweReservation'),
                // 'awe_submit_mess'  => array($this, 'aweSendMess'),
                // 'wp_ajax_filter_careers'  => array($this, 'filter_careers_callback'),
                // 'wp_ajax_nopriv_filter_careers'  => array($this, 'filter_careers_callback'),
                
            ];

            foreach ($argsAction as $key => $value) {
                add_action('wp_ajax_'.$key, $value);
                add_action('wp_ajax_nopriv_'.$key, $value);
            }
        }

        
    }