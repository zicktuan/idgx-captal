<div class="relative min-h-svh">
    <div>
        <div class=" my-10 md:my-12 lg:first:mt-18 lg:last:mb-18">
            <div class="px-container-mobile md:px-container-desktop">
                <div class="hidden md:block pointer-events-none absolute inset-0 px-container-desktop w-fit">
                    <div class="sticky top-12 lg:top-18 flex flex-col gap-2 justify-between items-start z-10 pointer-events-auto">
                        <div class="font-mono text-mono-12 flex flex-col gap-1">
                            <p class="uppercase font-medium">
                                <?php echo !empty($atts['itsa_post_menu_title']) ? $atts['itsa_post_menu_title'] : ''?>
                            </p>
                            <?php 
                                $categories = [];

                                if (!empty($atts['category_list'])) {
                                    $categoryIds = explode(',', $atts['category_list']);
                                
                                    foreach ($categoryIds as $cat_id) {
                                        $cat_id = (int) trim($cat_id);
                                        if ($cat_id) {
                                            $term = get_category($cat_id);
                                            if ($term && !is_wp_error($term)) {
                                                $categories[] = $term;
                                            }
                                        }
                                    }
                                }
                            ?>

                            <?php if (!empty($categories)) : ?>
                                <ul class="flex flex-col gap-1" id="category-filter">
                                    <div>
                                        <button class="block link-tag-push font-mono text-mono-12 text-left" data-cat-id="">
                                            <span>All</span>
                                        </button>
                                    </div>
                                    <?php foreach ($categories as $cat) : ?>
                                        <div>
                                            <button 
                                                class="block link-tag-push font-mono text-mono-12 text-left" 
                                                data-cat-id="<?php echo esc_attr($cat->term_id); ?>"
                                            >
                                                <span><?php echo esc_html($cat->name); ?></span>
                                            </button>
                                        </div>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12">
                    <div class="col-span-12 md:col-span-7 md:col-start-5 xl:col-start-4 xl:col-span-6 max-w-[1000px]">
                        <div class="flex flex-col pb-6 md:pb-5 grid-container-reset-mobile px-container-mobile gap-2 border-b border-solid md:border-none border-gray-border">
                            <p class="font-mono text-mono-12 font-medium">
                            <?php echo !empty($atts['itsa_post_post_title']) ? strtoupper($atts['itsa_post_post_title']) : ''?>
                            </p>
                            <?php if(!empty($posts)): ?>
                            <div class="grid md:grid-cols-1 gap-x-3 lg:gap-x-6 3xl:gap-x-10 gap-y-4 md:gap-y-5">
                                <?php foreach($posts as $post): ?>
                                <div class="flex flex-col gap-1 md:gap-2">
                                    <div class="flex flex-col sm:flex-row justify-between items-start gap-2 lg:gap-4 relative">
                                        <a class="w-full sm:w-12 lg:w-20" href="<?php echo get_permalink($post->ID); ?>">
                                            <div class="lg:flex-shrink-0 w-full sm:w-12 lg:w-20 post-summary__image cursor-pointer">
                                                <div class="image overflow-hidden block w-full aspect-[16/9] sm:aspect-square lg:aspect-[16/9]">
                                                <?php if (has_post_thumbnail($post->ID)): 
                                                    $thumb_url = get_the_post_thumbnail_url($post->ID, 'medium'); ?>
                                                    <picture>
                                                        <source srcset="<?= esc_url($thumb_url); ?>">
                                                        <img src="<?= esc_url($thumb_url); ?>" alt="<?= esc_attr(get_the_title($post->ID)); ?>">
                                                    </picture>
                                                <?php endif; ?>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="flex-grow">
                                            <div class="flex flex-col gap-1">
                                                <p class="font-mono text-mono-12 uppercase font-medium md:text-mono-18 md:normal-case md:font-normal line-clamp-3">
                                                    <a class="link-underline-hover" href="<?php echo get_permalink($post->ID); ?>">
                                                        <?php echo $post->post_title; ?>
                                                    </a>
                                                </p>
                                                <a class="" href="<?php echo get_permalink($post->ID); ?>">
                                                    <p class="text-serif-14 line-clamp-3">
                                                    <?php echo $post->post_excerpt; ?>
                                                </p>
                                                </a>
                                                <p class="font-mono text-mono-12 gap-1 md:truncate w-full md:max-w-[310px] xl:max-w-[320px] 2xl:max-w-[440px] 3xl:max-w-[540px] justify-between">
                                                    <span><?php echo date('m.d.Y', strtotime($post->post_date)); ?></span>
                                                    <span class="px-1">|</span>
                                                    <?php
                                                        $authors = get_the_author();
                                                        echo '<span class="content-none before:content-[\'By_\']">' . esc_html($authors) . '</span>';
                                                    ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach?>
                            </div>
                            <?php endif ?>

                        </div>
                        <div class="flex flex-col py-4 grid-container-reset-mobile px-container-mobile md:mx-0 md:px-0 gap-2">
                            <p class="font-mono text-mono-12 font-medium">ALL WRITING</p>
                            <div class="md:hidden col-span-12 lg:col-span-10 lg:col-start-2 xl:col-span-2 xl:col-start-11 xl:row-start-2 xl:border-b-0 xl:pb-0">
                                <div class="sticky top-10">
                                    <div class="flex flex-col gap-2 md:gap-4">
                                        <div class="grid grid-cols-2 xl:grid-cols-1 gap-y-1">
                                            <div class="col-span-2 xl:col-span-1">
                                                <p class="font-mono text-mono-12 uppercase font-medium">
                                                <?php echo !empty($atts['itsa_post_menu_title']) ? $atts['itsa_post_menu_title'] : ''?>
                                                </p>
                                            </div>
                                            <?php if (!empty($categories)) : ?>
                                                <ul class="flex flex-col gap-1" id="category-filter-mobile">
                                                    <div>
                                                        <button class="block link-tag-push font-mono text-mono-12 text-left" data-cat-id="">
                                                            <span>All</span>
                                                        </button>
                                                    </div>
                                                    <?php foreach ($categories as $cat) : ?>
                                                        <div>
                                                            <button 
                                                                class="block link-tag-push font-mono text-mono-12 text-left" 
                                                                data-cat-id="<?php echo esc_attr($cat->term_id); ?>"
                                                            >
                                                                <span><?php echo esc_html($cat->name); ?></span>
                                                            </button>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form id="search-form" class="hidden">
                                <input name="query" placeholder="Search" class="block w-full input-search mb-2">
                                <button type="submit" class="hidden" value="Search"></button>
                            </form>
                            <div id="search-results-container"></div>
                            
                            <?php
                                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Lấy số trang hiện tại
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 10, // Số bài viết mỗi trang
                                    'paged' => $paged, // Trang hiện tại
                                );

                                $query = new WP_Query($args);
                                $posts = $query->posts;
                            ?>
                            
                            <div id="post-list" class="grid md:grid-cols-1 gap-x-3 lg:gap-x-6 3xl:gap-x-10 gap-y-4 md:gap-y-5">
                                <?php if ($query->have_posts()) : ?>
                                <?php while ($query->have_posts()) : $query->the_post(); ?>
                                    <div class="flex flex-col gap-1 md:gap-2">
                                        <div class="flex flex-row-reverse md:flex-row justify-between items-start gap-2 lg:gap-4 relative">
                                            <a class="" href="<?php the_permalink(); ?>">
                                                <div class="flex-shrink-0 w-10 md:w-12 lg:w-20 post-summary__image cursor-pointer">
                                                    <div class="image overflow-hidden block w-full aspect-square lg:aspect-[16/9]">
                                                        <?php if (has_post_thumbnail()) : 
                                                            $thumb_url = get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>
                                                            <picture>
                                                                <source srcset="<?php echo esc_url($thumb_url); ?>" media="(min-width: 1000px)">
                                                                <img src="<?php echo esc_url($thumb_url); ?>" alt="<?php the_title(); ?>">
                                                            </picture>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a>
                                            <div class="flex-grow">
                                                <div class="flex flex-col gap-1">
                                                    <p class="font-mono text-mono-12 uppercase font-medium md:text-mono-18 md:normal-case md:font-normal line-clamp-3">
                                                        <a class="link-underline-hover" href="<?php the_permalink(); ?>">
                                                            <?php the_title(); ?>
                                                        </a>
                                                    </p>
                                                    <a class="" href="<?php the_permalink(); ?>">
                                                        <p class="text-serif-14 line-clamp-3">
                                                            <?php echo esc_html(get_the_excerpt()); ?>
                                                        </p>
                                                    </a>
                                                    <div class="flex flex-col lg:flex-row justify-start gap-1 w-full md:max-w-[310px] xl:max-w-[320px] 2xl:max-w-[440px] 3xl:max-w-[540px]">
                                                        <p class="flex font-mono text-mono-12 text-space-black min-w-fit text-nowrap"><?php echo get_the_date('m.d.Y'); ?></p>
                                                        <p class="hidden lg:flex font-mono text-mono-12 text-space-black min-w-fit text-nowrap">|</p>
                                                        <div class="flex font-mono text-mono-12 gap-[1ch] lg:max-w-[calc(100%-90px)]">
                                                            <p>By</p>
                                                            <span class="md:truncate"><?php the_author(); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            <?php else : ?>
                                <p>Nothing</p>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div>
                            <div id="pagination" class="flex gap-1 items-center justify-center mt-4">
                                <p class="font-mono text-mono-12 opacity-50 hidden xl:block">
                                    <?php
                                    $start = ($paged - 1) * 10 + 1;
                                    $end = min($paged * 10, $query->found_posts);
                                    echo "$start-$end of $query->found_posts";
                                    ?>
                                </p>
                                <div class="flex gap-1 items-center">
                                    <?php
                                    $big = 999999999; // Số lớn để đảm bảo URL phân trang hoạt động
                                    echo paginate_links(array(
                                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                        'format' => '?paged=%#%',
                                        'current' => max(1, $paged),
                                        'total' => $query->max_num_pages,
                                        'prev_text' => '<svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto rotate-180"><path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path></svg>',
                                        'next_text' => '<svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto"><path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path></svg>',
                                        'before_page_number' => '<span class="block button button-tag">',
                                        'after_page_number' => '</span>',
                                        'prev_next' => true,
                                        'show_all' => false,
                                        'mid_size' => 1,
                                        'end_size' => 1,
                                    ));
                                    ?>
                                </div>
                            </div>

                            <?php wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const searchForm = document.getElementById('search-form');
        const searchResultsContainer = document.getElementById('search-results-container');
        const postList = document.getElementById('post-list');
        const pagination = document.getElementById('pagination');
        const categoryButtons = document.querySelectorAll('#category-filter button, #category-filter-mobile button');
        // Hàm tạo phần hiển thị kết quả tìm kiếm
        function createSearchResultsHeader(searchQuery, foundPosts) {
                const header = document.createElement('div');
                header.id = 'search-results-header';
                header.className = 'flex justify-between items-center md:justify-start gap-2';
                header.innerHTML = `
                    <p class="font-mono text-mono-12">
                        <span class="text-gray-text">Results for: </span>
                        <span class="font-medium" id="search-term">${searchQuery}</span>
                        <span> </span>
                        <span class="text-gray-text" id="search-count">(${foundPosts}) results</span>
                    </p>
                    <button id="clear-search" class="block button button-tag-square">
                        <svg width="10" height="10" viewBox="0 0 10 10" class="block mx-auto">
                            <path d="M9.48633 9.48535L1.00105 1.00007" stroke="currentColor"></path>
                            <path d="M9.48438 1L0.999094 9.48528" stroke="currentColor"></path>
                        </svg>
                    </button>
                `;
                searchResultsContainer.appendChild(header);

                // Thêm sự kiện cho nút xóa
                const clearSearch = document.getElementById('clear-search');
                if (clearSearch) {
                    clearSearch.addEventListener('click', function () {
                        searchForm.query.value = '';
                        searchResultsContainer.innerHTML = ''; // Xóa phần kết quả tìm kiếm
                        loadPosts('', 1); // Tải lại toàn bộ bài viết
                    });
                }
            }

            // Hàm xóa phần hiển thị kết quả tìm kiếm
            function clearSearchResultsHeader() {
                searchResultsContainer.innerHTML = '';
            }

            function loadPosts(categoryId = '', page = 1, searchQuery = '') {
                const data = new FormData();
                data.append('action', 'filter_posts');
                data.append('category_id', categoryId);
                data.append('page', page);
                data.append('search_query', searchQuery);
                
                fetch('/wp-admin/admin-ajax.php', {
                    method: 'POST',
                    body: data
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Cập nhật danh sách bài viết
                        postList.innerHTML = data.data.posts;

                        // Cập nhật phân trang
                        pagination.innerHTML = data.data.pagination;

                        // Nếu có tìm kiếm, hiển thị kết quả tìm kiếm
                        if (searchQuery) {
                            clearSearchResultsHeader();
                            createSearchResultsHeader(searchQuery, data.data.found_posts);
                        } else {
                            clearSearchResultsHeader();
                        }
                    } else {
                        postList.innerHTML = '<p>Nothing.</p>';
                        pagination.innerHTML = '';

                        if (searchQuery) {
                            clearSearchResultsHeader();
                            createSearchResultsHeader(searchQuery, 0);
                        } else {
                            clearSearchResultsHeader();
                        }
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                });

            }

        if (searchForm) {
            searchForm.addEventListener('submit', function (e) {
                e.preventDefault();
                const searchQuery = this.query.value.trim();
                if (searchQuery) {
                    loadPosts('', 1, searchQuery);
                } else {
                    clearSearchResultsHeader();
                    loadPosts('', 1);
                }
            });
        }

        // Xử lý click vào danh mục
        categoryButtons.forEach(button => {
            button.addEventListener('click', function () {
                const categoryId = this.getAttribute('data-cat-id');
                searchForm.query.value = ''; // Xóa từ khóa tìm kiếm khi lọc danh mục
                clearSearchResultsHeader();
                loadPosts(categoryId, 1); // Tải trang 1 của danh mục
            });
        });

        // Xử lý click vào phân trang
        pagination.addEventListener('click', function (e) {
            e.preventDefault();
            const pageLink = e.target.closest('a');
            if (pageLink) {
                const page = pageLink.getAttribute('href').match(/paged=(\d+)/)?.[1] || 1;
                const activeCategory = document.querySelector('#category-filter button.active')?.getAttribute('data-cat-id') || '';
                const searchQuery = searchForm.query.value.trim();
                loadPosts(activeCategory, page);
            }
        });

        // Tải toàn bộ bài viết khi vào trang
        loadPosts();
    })
</script>