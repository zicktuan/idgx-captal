<?php
get_header();
$postId = $post->ID;
$categories = get_the_category($postId);
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
</style>
<div class="md:px-container-desktop pt-header-mobile md:pt-12 lg:pt-18">
    <div class="grid grid-cols-12">
        <div class="col-span-12 md:col-span-3 md:row-start-1 md:col-start-1 md:px-0 px-container-mobile">
            <div class="md:sticky top-12 lg:top-18">
                <div class="flex">
                    <a class="block button button-tag pointer-events-auto" href="/new">
                        <div class="flex items-center gap-half">
                            <svg width="12" height="6" viewBox="0 0 12 6" class="block">
                                <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                            </svg>
                            Back to news
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
                            <figure class="py-1 gap-2 flex flex-col">
                                <div class="image overflow-hidden" style="height: 0px; padding-bottom: 50%;">
                                    <picture>
                                        <source srcset="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=1600" media="(min-width: 1200px)">
                                        <source srcset="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=1200" media="(min-width: 800px)">
                                        <source srcset="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=1000" media="(min-width: 600px)">
                                        <img class="" src="https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png?auto=format&amp;q=75&amp;url=https://cdn.sanity.io/images/dgybcd83/production/96664ca5b600075d368be5a152dd265456a504ee-1200x600.png&amp;w=800">
                                    </picture>
                                </div>
                            </figure>
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