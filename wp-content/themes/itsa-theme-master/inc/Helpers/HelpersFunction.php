<?php

    class HelpersFunction {

        private static $instance = null;

        public static function getInstance() {
            if ( !(self::$instance) instanceof self) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        public function awePagination( $totalPages = 0 ) {
            $big = 999999999;
            $currentPage = max(1, get_query_var('paged'));
            if ( $totalPages > 1 ) { ?>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <ul class="pagination justify-content-center">
                        <li>
                        <?php
                            $args = array(
                                'base'      => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                                'format'    => 'page/%#%',
                                'total'     => $totalPages,
                                'current'   => $currentPage,
                                'prev_text' => __('<i class="fa fa-angle-left"></i>', "bookawesome"),
                                'next_text' => __('<i class="fa fa-angle-right"></i>', "bookawesome"),
                                'type'      => 'array',
                            );
                            $pages = paginate_links( $args );
                            if( is_array( $pages ) ) {
                                foreach ( $pages as $key => $page ) {
                                    echo $page;
                                }
                            }
                        ?>
                        </li>
                    </ul>
                </div>
            <?php }

        }

        /**
         * setting url image default
         */
        static function basImageDefault ( $img = '' ) {
            $defaultImage = get_template_directory_uri().'/assets/images/default-image.png';

            if( function_exists('getimagesize') && !@getimagesize($img) ) {
                return $defaultImage;
            }

            return $img;
        }
    }