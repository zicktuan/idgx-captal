<?php
get_header();
$postId = $post->ID;
$categories = get_the_category($postId);
$postType = get_post_type($postId);
$dateTime = get_post_meta($postId, 'itsa_event_date_time', true);
$location = get_post_meta($postId, 'awe_event_location_meta', true);
?>
<style>
    .idgx-title-post {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        display: inline-block;
        text-shadow: 0 0 10px rgba(188, 56, 217, 0.4);
    }
    .gradient-text {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-weight: bold;
    }
</style>
<div class="md:px-container-desktop pt-header-mobile md:pt-12 lg:pt-18">
    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-3 md:row-start-1 md:col-start-1 md:px-0 px-container-mobile">
            <div class="md:sticky top-12 lg:top-18">
                <div class="flex">
                    <a class="block button button-tag pointer-events-auto" href="<?php echo ($postType === 'itsa_career_pt') ? '/career' : '/new';?>">
                        <div class="flex items-center gap-half">
                            <svg width="12" height="6" viewBox="0 0 12 6" class="block">
                                <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                            </svg>
                            <?php
                                echo ($postType === 'itsa_career_pt') ? 'Back to careers' : 'Back to news';
                            ?>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-start-2 md:col-span-9 xl:col-span-5 xl:col-start-4 px-container-mobile md:px-0 pt-6 md:pt-0 max-w-[900px]">
            <div class="flex flex-col gap-2">
                <div class="flex flex-col gap-2">
                    <div class="flex flex-col gap-2">
                       
                        <div class="flex gap-1 md:gap-2 items-center font-mono text-mono-12 md:text-mono-13 text-gray-text">
                            <?php
                                if (!empty($categories)) {
                                $output = [];
                                foreach ($categories as $category) {
                                    $category_link = get_category_link($category->term_id);
                                    $output[] = '<span><a class="link-gray-black link-underline-hover" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a></span>';
                                }
                    
                                echo implode(' | ', $output);
                                }
                            ?> 
                        </div>
                        <h1 class="idgx-title-post font-mono text-mono-28 md:text-mono-40 tracking-tighter max-w-[1400px]">
                        <?php the_title() ?>
                        </h1>
                    </div>
                </div>
                <p class="font-mono text-mono-12 gap-1 w-full justify-between">
                    <span><?php echo date('m.d.Y', strtotime($post->post_date)); ?></span>
                    <span class="px-1">|</span>
                    <?php
                        $author_id = get_post_field ('post_author', $post_id);
                        $display_name = get_the_author_meta( 'display_name' , $author_id ); 
                        echo '<span class="content-none before:content-[\'By_\']">' . esc_html($display_name) . '</span>';
                    ?>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="my-2 md:my-4 px-container-mobile md:px-container-desktop">
    <div class="relative">
        <div class="my-2 md:my-4">
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-start-2 md:col-span-9 xl:col-span-8 xl:col-start-4 flex flex-row gap-10 max-w-[1250px]">
                    <div class="rich-text line-break rich-text-post text-serif-16 md:text-serif-18 leading-28">
                        <div>
                            <?php if (has_post_thumbnail($postId)):?>
                            <figure class="py-1 gap-2 flex flex-col">
                                <div class="image overflow-hidden" style="height: 0px; padding-bottom: 50%;">
                                    <!-- <picture>
                                        <source srcset="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=1600" media="(min-width: 1200px)">
                                        <source srcset="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=1200" media="(min-width: 800px)">
                                        <source srcset="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=1000" media="(min-width: 600px)">
                                        <img class="" src="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=800">
                                    </picture> -->
                                    <?php
                                        echo get_the_post_thumbnail($postId, 'itsa-thumbnail-1200x600', [
                                            'class' => 'w-full h-auto object-cover',
                                        ]);
                                    ?>
                                </div>
                            </figure>
                            <?php endif ?>
                            <div class="flex gap-6 mt-6" style="margin-bottom: 20px; margin-top: 20px;">
                            <?php if ($dateTime): ?>
                                <div class="flex items-center gap-2 font-mono text-mono-12 md:text-mono-14 text-gray-text gradient-text ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-event" viewBox="0 0 16 16">
                                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 3v12h14V3H1z"/>
                                    </svg>
                                    <span><?php echo esc_html($dateTime); ?></span>
                                </div>
                            <?php endif; ?>

                            <?php if ($location): ?>
                                <div class="flex items-center gap-2 font-mono text-mono-12 md:text-mono-14 text-gray-text gradient-text ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
                                        <path d="M8 0C5.238 0 3 3.582 3 7c0 4.72 5 8 5 8s5-3.28 5-8c0-3.418-2.238-7-5-7zM8 9.934S6 7.97 6 7c0-1.104.896-2 2-2s2 .896 2 2c0 .97-2 2.934-2 2.934z"/>
                                    </svg>
                                    <span><?php echo esc_html($location); ?></span>
                                </div>
                            <?php endif; ?>
                            </div>
                            <?php the_content() ?>
                        </div>
                    </div>
                    <div class="relative hidden xl:block row-start-1 max-w-[250px] pl-1" style="opacity: 1;">
                        <div class="flex flex-col gap-3 min-w-[250px]"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer() ?>