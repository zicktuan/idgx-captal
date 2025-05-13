<?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;    
    $selectedCategories = isset($_GET['category']) ? array_map('intval', (array) $_GET['category']) : [];
    $args = [
        'post_type'      => 'itsa_career_pt',
        'post_status'    => 'publish',
        'posts_per_page' => 10,
        'paged' => $paged,
    ];

    if (!empty($selectedCategories)) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'career',
                'field'    => 'term_id',
                'terms'    => $selectedCategories,
            ],
        ];
    }
    $query = new WP_Query($args);
    
?>
<style>
    .idgx-title-cat {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        display: inline-block;
        text-shadow: 0 0 10px rgba(188, 56, 217, 0.4);
    }
</style>
<div class="px-container-mobile md:px-container-desktop my-10 md:my-12 lg:my-18 min-h-svh">
    <div class="grid grid-cols-12 gap-y-4">
        <div class="col-span-12 md:col-span-3 md:pr-4">
            <div class="hidden md:flex flex-col gap-2 md:max-w-[280px]">
                <div class="flex flex-col gap-1">
                    <h1 class="font-mono text-mono-12 font-medium uppercase">
                        <?php echo !empty($atts['itsa_career_nav_title']) ? $atts['itsa_career_nav_title'] : '' ?>
                    </h1>
                    <p class="font-mono text-mono-12 mb-1">
                        <?php echo !empty($atts['itsa_career_nav_desc']) ? $atts['itsa_career_nav_desc'] : '' ?>
                    </p>
                </div>
                <div class="flex flex-col gap-1 font-mono text-mono-12">
                    <?php 
                        $term = get_term_by('slug', 'idgx', 'career');
                        $idgxId = $term ? $term->term_id : 0;
                    ?>
                    <ul class="flex flex-col">
                        <li class="pb-2">
                            <a class="link-tag-fill flex gap-half items-start" href="#" data-id="<?php echo $idgxId; ?>">
                                <span class="block tag shrink-0 mt-[3px]"></span>
                                <span class="block idgx-title-cat">Careers at IDGX</span>
                            </a>
                        </li>
                    </ul>
                    <h2>Roles</h2>
                    <ul class="flex flex-col gap-1">
                        <?php if (!empty($categoriesList)): ?>
                        <?php foreach ($categoriesList as $cat): ?>
                        <li>
                            <a class="link-tag-fill flex gap-half items-start" <?php echo in_array($cat->term_id, $selectedCategories) ? 'active' : ''; ?> href="#" data-id="<?php echo $cat->term_id; ?>">
                                <span class="block tag mt-[3px] shrink-0"></span>
                                <span class="block"><?php echo esc_html($cat->name); ?></span>
                            </a>
                        </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="flex flex-col gap-4 md:hidden">
                <div class="font-mono text-mono-12 flex flex-col gap-half">
                    <p class="font-medium"><?php echo !empty($atts['itsa_career_nav_title']) ? $atts['itsa_career_nav_title'] : '' ?></p>
                    <div class="rich-text">
                        <p><?php echo !empty($atts['itsa_career_nav_desc']) ? $atts['itsa_career_nav_desc'] : '' ?></p>
                    </div>
                </div>
                <div class="border border-solid border-gray-border">
                    <div>
                        <button id="toggleMenuMobile" class="flex w-full justify-between items-center p-2">
                            <div class="font-mono text-mono-12 uppercase font-medium">Filter By</div>
                            <img id="arrowIcon" class="w-[12px] h-[6px]" src="<?php echo get_template_directory_uri() . '/assets/images/icon-arrow-dropdown.svg'?>" style="transform: none;">
                        </button>
                        <div id="dropdownMenuMobileCareer" class="overflow-hidden pointer-events-none" style="height: 0px; opacity: 0;">
                            <div>
                                <div class="p-1 px-1 flex flex-col gap-2">
                                    
                                    <div class="flex flex-col gap-1 font-mono text-mono-12">
                                        <h2>Roles</h2>
                                        <ul class="flex flex-col gap-1">
                                        <?php if (!empty($categoriesList)): ?>
                                            <?php foreach ($categoriesList as $cat): ?>
                                            <li><a class="link-tag-fill flex gap-half items-start" href="#" data-id="<?php echo $cat->term_id; ?>">
                                                <span class="block tag mt-[3px] shrink-0"></span><span class="block"><?php echo esc_html($cat->name); ?></a></li>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-9 xl:col-span-6 max-w-[1000px]">
            <div class="flex flex-col">
                <div class="hidden md:block font-mono text-mono-12 max-w-[300px]">
                    <div class="rich-text"></div>
                </div>
                <div class="flex flex-col gap-3 md:gap-6 lg:gap-10">
                    <div class="flex flex-col gap-4 post-list">
                        <?php
                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                $jobTitle = get_the_title();
                                $companyName = get_post_meta(get_the_ID(), 'itsa_company_name', true);
                                $location = get_post_meta(get_the_ID(), 'itsa_localtion', true);
                        ?>
                        <div>
                            <div class="grid grid-cols-1 relative">
                                <div class="flex flex-col">
                                    <div class="flex flex-row gap-3 md:flex-row-reverse">
                                        <div class="flex items-center flex-grow">
                                            <div class="flex flex-col gap-half md:gap-1">
                                                <p class="font-mono text-mono-18 md:text-mono-24">
                                                    <a class="link-cover link-underline-hover-large" href="<?php echo esc_url(get_permalink())?>" target="_blank">
                                                        <?= esc_html($jobTitle); ?>
                                                    </a>
                                                </p>
                                                <div class="flex flex-col md:flex-row gap-half md:gap-1 font-mono text-mono-12">
                                                    <p class="font-medium">
                                                        <?php echo !empty($companyName) ? $companyName : '' ?>
                                                    </p>
                                                    <?php if (!empty($location)):?>
                                                    <p class="hidden md:flex">|</p>
                                                    <p><?php echo $location ?></p>
                                                    <?php endif ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex shrink-0 h-[72px] md:min-h-[88px] aspect-square">
                                            <div class="image overflow-hidden block w-full aspect-square max-w-[88px]">
                                            <?php if (has_post_thumbnail(get_the_ID())):?>
                                                <picture>
                                                    <!-- <img class="" alt="Paradigm" src="https://cdn.getro.com/companies/22717ee0-86c4-5e51-a11d-ffb9ad0eccb0"> -->
                                                    <?php
                                                        echo get_the_post_thumbnail(get_the_ID(), 'itsa-thumbnail-1200x600', [
                                                            'class' => 'w-full h-auto object-cover',
                                                        ]);
                                                    ?>
                                                </picture>
                                            <?php endif;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                            endwhile;
                            wp_reset_postdata();
                        endif;
                        ?>
                    </div>
                    <div class="flex gap-1 items-center">
                        <?php
                            $big = 999999999;
                            echo paginate_links(array(
                                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                                'format' => '?paged=%#%',
                                'current' => max(1, $paged),
                                'total' => $query->max_num_pages,
                                'prev_text' => '<svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto rotate-180"><path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path></svg>',
                                'next_text' => '<svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto"><path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path></svg>',
                                'before_page_number' => '<span class="block button button-tag">',
                                'after_page_number' => '</span>',
                                'add_args' => [
                                    'category' => $selectedCategories,
                                ],
                                'prev_next' => true,
                                'show_all' => false,
                                'mid_size' => 1,
                                'end_size' => 1,
                            ));
                        ?>
                        <!-- <button class="w-2 h-2 block link-opacity-hover" tabindex="-1" disabled="">
                            <svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto rotate-180">
                                <path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path>
                            </svg>
                        </button>
                        <ul class="flex gap-1">
                            <li><a tabindex="0" class="block button button-tag active">1</a></li>
                        </ul>
                        <button class="w-2 h-2 block link-opacity-hover" tabindex="-1" disabled="">
                            <svg width="5" height="8" viewBox="0 0 5 8" class="block mx-auto">
                                <path d="M0.588432 -3.85672e-07L5 4L0.588431 8L4.66431e-08 7.46647L3.82314 4L6.52739e-07 0.533534L0.588432 -3.85672e-07Z" fill="currentColor"></path>
                            </svg>
                        </button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.addEventListener('DOMContentLoaded', function () {
    let selectedCategories = [];
    let currentPage = 1;

    const toggleBtn = document.getElementById("toggleMenuMobile");
    const dropdown = document.getElementById("dropdownMenuMobileCareer");
    const arrowIcon = document.getElementById("arrowIcon");

    function openDropdown() {
        dropdown.style.height = dropdown.scrollHeight + "px";
        dropdown.style.opacity = "1";
        dropdown.classList.remove("pointer-events-none");
        arrowIcon.classList.add("arrow-rotated");
    }

    function closeDropdown() {
        dropdown.style.height = "0px";
        dropdown.style.opacity = "0";
        dropdown.classList.add("pointer-events-none");
        arrowIcon.classList.remove("arrow-rotated");
    }

    toggleBtn.addEventListener("click", function () {
        const isVisible = dropdown.style.height !== "0px" && dropdown.style.height !== "";

        if (isVisible) {
            closeDropdown();
        } else {
            openDropdown();
        }
    });

    dropdown.querySelectorAll("a").forEach(function (link) {
        link.addEventListener("click", function () {
            closeDropdown();
        });
    });

    const postList = document.querySelector('.post-list');
    const pagination = document.querySelector('.flex.gap-1.items-center');

    if (!postList) {
        console.error('Error: .post-list element not found in DOM');
        return;
    }
    if (!pagination) {
        console.error('Error: Element .flex.gap-1.items-center not found in DOM');
    }

    document.querySelectorAll('.link-tag-fill .tag').forEach(tag => {
        tag.addEventListener('click', function (e) {
            e.preventDefault();
            const link = this.closest('a');
            const catId = parseInt(link.dataset.id);
            if (link.classList.contains('active')) {
                link.classList.remove('active');
                selectedCategories = selectedCategories.filter(id => id !== catId);
            } else {
                link.classList.add('active');
                selectedCategories.push(catId);
            }

            currentPage = 1; // Đặt lại về trang đầu
            fetchPosts();
        });
    });

    document.addEventListener('click', (e) => {
        const link = e.target.closest('a[href*="paged="]');
        if (link && !link.closest('.post-list')) {
            e.preventDefault();
            const href = link.getAttribute('href');
            const pageMatch = href.match(/paged=(\d+)/);
            currentPage = pageMatch ? parseInt(pageMatch[1]) : 1;
            fetchPosts();
        }
    });

    async function fetchPosts() {
        postList.innerHTML = '<p class="font-mono text-mono-12">Loading...</p>';
        try {
            const formData = new FormData();
            formData.append('action', 'filter_careers');
            formData.append('paged', currentPage);
            selectedCategories.forEach(catId => formData.append('categories[]', catId));

            const response = await fetch('/wp-admin/admin-ajax.php', {
                method: 'POST',
                body: formData,
            });

            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status} ${response.statusText}`);
            }

            const text = await response.text();

            let data;
            try {
                data = JSON.parse(text);
            } catch (e) {
                throw new Error('Response is not valid JSON: ' + text);
            }
            if (data.success) {
                postList.innerHTML = data.data.posts || '<p class="font-mono text-mono-12">There are no posts.</p>';
                if (pagination) {
                    pagination.innerHTML = data.data.pagination || '';
                }
            } else {
                postList.innerHTML = '<p class="font-mono text-mono-12">Error: ' + (data.data?.message || 'Unknown') + '</p>';
            }
        } catch (error) {
            postList.innerHTML = '<p class="font-mono text-mono-12">Error loading article.</p>';
            console.error('AJAX Error:', error);
        }
    }

});
</script>