<?php
get_header();
$defaulPostType = 'itsa_product_pt';
$postType = get_post_type();
$currentTerm = get_the_terms($post->ID, 'product');
$args = array(
    'post_type' => 'itsa_product_pt',
    'showposts' => -1,
    'tax_query' => array(
        array(
            'taxonomy' => 'product',
            'field' => 'term_id', 
            'terms' => $currentTerm[0], 
        )
    ),
    'posts_per_page' => 3
);
$classRow = ($postType == $defaulPostType) ? 'col-md-8' : 'col-sm-8';

$recentPost = new WP_Query($args);
?>
<div class="container nopadding-top" id="single_product_b">
    <div class="row mg_bottom_20 mg_top_20">
        <div class="col-sm-12">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php home_url()?>">Trang chủ</a></li>
                <?php
                    if (get_post_type() == 'itsa_product_pt') {
                        echo '<li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>';
                    } else if (get_post_type() == 'post') {
                        $blogPageId = get_option('page_for_posts');
                        $blogPageTitle = get_the_title($blogPageId);
                        $blogPageUrl = get_permalink($blogPageId);
                        echo '<li class="breadcrumb-item"><a href="'. $blogPageUrl .'">'.$blogPageTitle .'</a></li>';
                    }
                ?>
                
                <li class="breadcrumb-item active"><?php the_title() ?></li>
            </ol>
        </div>
    </div>
    <div class="row nopadding" id="">

        <div class="<?php echo $classRow?>">
            <div class="content-post">
                <div class="mg_bottom_20">
                    <h1 class="h2 content-title"><?php the_title() ?></h1>
                </div>
                <div class="mg_top_20 mg_bottom_20">
                    <?php the_content() ?>
                </div>
            </div>
        </div>

        <div class="col-md-1"></div>
        <?php if ($postType == $defaulPostType): ?>
            <div class="col-md-3 bg-gray suggest">
                <div class="single_product_involve">
                    <div class="title_class">
                        Sản phẩm cùng loại
                    </div>
                    <div class="row">
                    <?php if ($recentPost->have_posts()) : ?>
                        <?php 
                            while ($recentPost->have_posts()) : $recentPost->the_post();
                                $thumb = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'',false, '' );
                                $thumb = $thumb[0];   
                                echo '<div class="col-md-12 col-sm-6">';
                                echo '<div class="product_box">';

                                echo '<div class="product_box_image">';
                                    echo '<div class="content_image">';
                                        echo '<div class="bg_flex">
                                                <img alt="'.get_the_title().'" src="'.$thumb.'" class="loading">
                                            </div>';
                                    echo '</div>';
                                    echo '<a class="read_more" href="'.get_permalink().'">
                                            <div class="read_more_content">
                                                Xem thông tin
                                                <span><i aria-hidden="true" class="fa fa-arrow-right"></i></span>
                                            </div>
                                        </a>';
                                echo '</div>';

                                echo '<h3 class="product_box_name">';
                                    echo get_the_title();
                                    echo '<span>'.get_the_title().'</span>';
                                echo '</h3>';
                                
                                echo '</div>';
                                echo '</div>';

                            endwhile;
                            wp_reset_postdata();
                        ?>
                        
                        <?php endif ?>
                    </div>
                </div>
            </div>
        <?php else:?>
        <?php get_template_part( 'blog', 'sidebar' ); ?>
        <?php endif ?>
    </div>
</div>
<?php get_footer() ?>