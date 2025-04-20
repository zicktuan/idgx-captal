<!-- <?php
$pageId = get_queried_object_id();
$pageTitle = get_the_title($pageId);
?>
<div class="container nopadding-top">
    <div class="row">
    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="<?php the_permalink()?>">
                <div class="post">
                    <div class="post-image">
                        <div class="img-re">
                            <div class="img">
                                <img alt="<?php the_title() ?>" src="<?php the_post_thumbnail_url() ?>" class="loading" data-was-processed="true">
                            </div>
                        </div>
                    </div>
                    <div class="post-content">
                        <h3 class="post-title">
                        <?php the_title() ?>
                        </h3>
                        <div class="post-des">
                        <?php the_excerpt() ?>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endwhile; endif; ?>
    <?php //echo HelpersFunction::awePagination(2) ?>
    </div>
</div>



 -->
