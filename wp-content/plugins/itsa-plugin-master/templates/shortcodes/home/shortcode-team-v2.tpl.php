<style>
   .team-toggle {
        text-align: left;
    }

    .team-label {
        color: #000;
        font-family: monospace;
        font-size: 12px;
        text-transform: uppercase; /* Giữ chữ in hoa cho "TEAM" và tên mục được chọn */
    }

    /* Dropdown container */
    .dropdown-content {
        transition: height 0.3s ease, opacity 0.3s ease;
        overflow: hidden;
        pointer-events: none;
        background: #fff;
    }

    /* Khi dropdown mở */
    .dropdown-content.open {
        height: auto;
        opacity: 1;
        pointer-events: auto;
    }

    /* Khi dropdown mở, mũi tên hướng lên */
    .arrow-icon.open {
        transform: rotate(180deg) !important; /* Đảm bảo mũi tên hướng lên khi mở */
    }

    /* Khi dropdown đóng, mũi tên hướng xuống */
    .arrow-icon:not(.open) {
        transform: rotate(0) !important; /* Mũi tên hướng xuống khi đóng */
    }

    .image img {
        object-position: top !important;
    } 

    /* .image-container {
        width: 100%;
        height: 250px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background: #d2d8dc;
    } */

    /* .img-center {
        height: 100%;
        object-fit: cover;
        object-position: center;
    } */

    @media (max-width: 767px) {
        .team-menu::before {
            content: none;
        }
        /* .img-center {
            object-fit: contain;
            width: 100%;
            height: auto;
        }

        .image-container {
            padding: 20px 0;
        } */
        .team-label {
            font-weight: bold;
        }
    }
    @media (min-width: 768px) and (max-width: 1023px) {
        .team-menu::before {
            content: none;
        }
        .team-label {
            font-weight: bold;
        }
        /* .img-center {
            object-fit: contain;
            width: 100%;
            height: auto;
        }

        .image-container {
            height: -webkit-fill-available;
            padding: 20px 0;
        } */
    }

    .idgx-title-team {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        display: inline-block;
        text-shadow: 0 0 10px rgba(188, 56, 217, 0.4);
    }

    .idgx-content-team {
        margin-bottom: 60px;
    }

    
</style>
<div class="relative min-h-svh">
    <div>
        <div class="relative min-h-svh">
            <!-- Menu mobile -->
            <div class="md:hidden sticky top-6 p-[16px] z-10 bg-white">
                <div class="border border-solid border-gray">
                    <button class="team-toggle block w-full font-mono text-mono-12">
                        <div class="flex justify-between items-center p-2">
                            <div class="flex gap-[16px]">
                                <div class="">
                                    <span class="team-label">Team</span>
                                    <span class="menu-text"></span>
                                </div>
                            </div>
                            <img class="arrow-icon w-[12px] h-[6px]" src="<?php echo get_template_directory_uri() . '/assets/images/icon-arrow-dropdown.svg'?>" style="transform: none;">
                        </div>
                    </button>
                    <div>
                        <div class="overflow-hidden pointer-events-none">
                        <div>
                        <div class="dropdown-content" style="height: 0px; opacity: 0;">
                            <div>
                                <div class="p-2 pt-0">
                                <?php if(!empty($listItems[0])): ?>
                                    <ul class="team-menu-list flex flex-col gap-2 font-mono text-mono-12">
                                        <?php foreach($listItems as $item):?>
                                        <li>
                                            <button class="link-tag-push pointer-events-auto font-mono text-mono-12 flex w-full team-menu" data-menu="<?php echo !empty($item['name']) ? $item['name'] : '' ?>">
                                                <?php echo !empty($item['name']) ? $item['name'] : '' ?>
                                            </button>
                                            <?php if(!empty($item['sub_items'])):
                                            $subItems = vc_param_group_parse_atts( $item['sub_items'] );
                                            if(!empty($subItems[0])):
                                            ?>
                                            <ul class="ml-2 flex flex-col gap-2 pt-2">
                                                <?php foreach($subItems as $subItem):?>
                                                <li>
                                                    <button class="link-tag-push font-mono text-mono-12 team-menu" data-menu="<?php echo !empty($subItem['name']) ? $item['name'] . ' - ' . $subItem['name'] : '' ?>">
                                                        <span><?php echo !empty($subItem['name']) ? $subItem['name'] : '' ?></span>
                                                    </button>
                                                </li>
                                                <?php endforeach?>
                                            </ul>
                                            <?php endif; endif ?>
                                        </li>
                                        <?php endforeach?>
                                    </ul>
                                <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu Desktop -->
            <div class="hidden md:block absolute inset-0 pointer-events-none px-container-desktop z-10 h-fit pb-20">
                <div class="sticky top-12 lg:top-18 md:max-w-[30%] lg:max-w-[22%] pointer-events-auto">
                    <div class="font-mono text-mono-12 flex flex-col gap-1">
                        <p class="uppercase font-medium"><?php echo !empty($atts['itsa_team_data_title']) ? $atts['itsa_team_data_title'] : '' ?></p>
                        <?php if(!empty($listItems[0])): ?>
                        <ul class="flex flex-col gap-1">
                            <?php foreach($listItems as $item):?>
                            <li>
                                <button class="link-tag-push font-mono text-mono-12 team-menu" data-menu="<?php echo !empty($item['name']) ? $item['name'] : '' ?>">
                                    <span><?php echo !empty($item['name']) ? $item['name'] : '' ?></span>
                                </button>
                                <?php if(!empty($item['sub_items'])):
                                $subItems = vc_param_group_parse_atts( $item['sub_items'] );
                                if(!empty($subItems[0])):
                                ?>
                                <ul class="ml-2 flex flex-col gap-1 pt-1">
                                    <?php foreach($subItems as $subItem):?>
                                    <li>
                                        <button class="link-tag-push font-mono text-mono-12 team-menu" data-menu="<?php echo !empty($subItem['name']) ? $item['name'] . ' - ' . $subItem['name'] : '' ?>">
                                            <span><?php echo !empty($subItem['name']) ? $subItem['name'] : '' ?></span>
                                        </button>
                                    </li>
                                    <?php endforeach ?>
                                </ul>
                                <?php endif; endif ?>
                            </li>
                            <?php endforeach ?>
                        </ul>
                        <?php endif ?>
                    </div>
                </div>
            </div>
            <div class="px-container-mobile md:px-container-desktop my-8 md:my-12 lg:my-18 team-container">
                <div class="grid grid-cols-12 list-item team-grid">
                    <div class="team-wrap col-span-12 md:col-span-7 md:col-start-5 xl:col-start-4 max-w-[1000px]">
                        <?php if (!empty($listItemsData[0])): ?>
                            <?php foreach ($listItemsData as $item): ?>
                                <div class="flex flex-col gap-4 mb-8">
                                    <h2 class="idgx-title-team font-mono text-mono-12 uppercase font-medium">
                                        <?php echo !empty($item['title']) ?  esc_html($item['title']) : esc_html($item['selected_menu']); ?>
                                    </h2>
                                    <div class="idgx-content-team grid grid-cols-2 lg:grid-cols-4 gap-x-2 gap-y-4">
                                        <?php if(!empty($item['sub_items'])):
                                            $subItems = vc_param_group_parse_atts( $item['sub_items'] );
                                            if(!empty($subItems[0])):
                                        ?>
                                        <?php foreach ($subItems as $value): ?>
                                            <div class="relative flex flex-col gap-1 md:gap-[14px]">
                                                <!-- <div class="image-container">
                                                    <div class="image-wrapper">
                                                        <picture>
                                                            <source srcset="<?php echo !empty($value['img']) ? wp_get_attachment_image_src($value['img'], 'medium')[0] : '' ?>" media="(min-width: 600px)">
                                                            <img 
                                                                src="<?php echo !empty($value['img']) ? wp_get_attachment_image_src($value['img'], 'medium')[0] : '' ?>" 
                                                                class="img-center"
                                                                alt="<?php echo !empty($value['name']) ? esc_attr($value['name']) : ''; ?>"
                                                            >
                                                        </picture>
                                                    </div>
                                                </div> -->

                                                <div class="w-full aspect-square overflow-hidden">
                                                    <div class="image overflow-hidden block w-full aspect-square select-none">
                                                        <picture>
                                                            <source srcset="<?php echo !empty($value['img']) ? wp_get_attachment_image_src($value['img'], 'medium')[0] : '' ?>" media="(min-width: 600px)">
                                                            <img class="" src="<?php echo !empty($value['img']) ? wp_get_attachment_image_src($value['img'], 'medium')[0] : '' ?>">
                                                        </picture>
                                                    </div>
                                                </div>


                                                <div class="flex flex-col gap-half font-mono text-mono-12">
                                                    <p class="font-medium">
                                                        <a class="link-underline-hover link-cover" href="<?php echo !empty($value['url']) ? esc_url($value['url']) : '#'; ?>">
                                                            <?php echo !empty($value['name']) ? esc_html($value['name']) : ''; ?>
                                                        </a>
                                                    </p>
                                                    <p><?php echo !empty($value['position']) ? esc_html($value['position']) : ''; ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                        <?php endif; endif ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
<script>
    const teamData = <?php 
        $data_with_urls = array_map(function($item) {
            if (!empty($item['sub_items'])) {
                $subItemDataTeam = vc_param_group_parse_atts($item['sub_items']);
                
                $item['sub_items'] = array_map(function($subItem) {
                    $subItem['img_url'] = !empty($subItem['img']) ? wp_get_attachment_url($subItem['img']) : '';
                    return $subItem;
                }, $subItemDataTeam);
                
                $item['sub_items'] = urlencode(json_encode($item['sub_items']));
            }
            return $item;
        }, $listItemsData);
        echo json_encode($data_with_urls);
    ?>;
    document.addEventListener('DOMContentLoaded', function() {
        // Kiểm tra xem teamData có tồn tại không
        if (typeof teamData === 'undefined') {
            console.error('teamData is not defined. Please ensure data is loaded correctly.');
            return;
        }

        // Lấy các elements cần thiết
        // const teamGrid = document.querySelector('.team-grid .grid');
        const teamGrid = document.querySelector('.team-wrap');
        const menuButtons = document.querySelectorAll('.team-menu, .link-tag-push');

        const teamToggle = document.querySelector('.team-toggle');
        const dropdownContent = document.querySelector('.dropdown-content');
        const arrowIcon = document.querySelector('.arrow-icon');
        const teamLabel = document.querySelector('.team-label');
        const menuTextElement = document.querySelector('.menu-text');

        // Hàm render team members
        function renderTeamMembers(items) {
            teamGrid.innerHTML = ''; // Xóa nội dung hiện tại
            
            items.forEach(item => {

                const subItems = JSON.parse(decodeURIComponent(item.sub_items));
                let subItemsHtml = subItems.map(value => `
                    <div class="relative flex flex-col gap-1 md:gap-[14px]">
                        <div class="image-container">
                            <div class="image-wrapper">
                                <picture>
                                    <source srcset="${value.img_url || ''}" media="(min-width: 600px)">
                                    <img 
                                        src="${value.img_url || ''}" 
                                        class="img-center"
                                        alt="${value.name ? value.name.replace(/"/g, '&quot;') : ''}"
                                    >
                                </picture>
                            </div>
                        </div>
                        <div class="flex flex-col gap-half font-mono text-mono-12">
                            <p class="font-medium">
                                <a class="link-underline-hover link-cover" href="${value.url || '#'}">
                                    ${value.name ? value.name.replace(/\+/g, ' ') : ''}
                                </a>
                            </p>
                            <p>${value.position ? value.position.replace(/\+/g, ' ') : ''}</p>
                        </div>
                    </div>
                `).join('');

                let title = (item.title === '' || item.title == null) ? item.selected_menu : item.title
                teamGrid.innerHTML  += `
                    <div class="flex flex-col gap-4 mb-8">
                        <h2 class="idgx-title-team font-mono text-mono-12 uppercase font-medium">
                            ${title}
                        </h2>
                        <div class="idgx-content-team grid grid-cols-2 lg:grid-cols-4 gap-x-2 gap-y-4">
                            ${subItemsHtml}
                        </div>
                        
                    </div>
                `;
            });
        }

        // Hiển thị tất cả members khi load trang
        // renderTeamMembers(teamData);

        // Toggle dropdown khi click vào button "Team"
        if (teamToggle && dropdownContent && arrowIcon && teamLabel) {
            teamToggle.addEventListener('click', function() {
                const isOpen = dropdownContent.classList.contains('open');
                if (isOpen) {
                    dropdownContent.classList.remove('open');
                    dropdownContent.style.height = '0px';
                    dropdownContent.style.opacity = '0';
                    arrowIcon.classList.remove('open');
                } else {
                    dropdownContent.classList.add('open');
                    dropdownContent.style.height = dropdownContent.scrollHeight + 'px';
                    dropdownContent.style.opacity = '1';
                    arrowIcon.classList.add('open');
                }
            });
        } else {
            console.error('One or more elements (teamToggle, dropdownContent, arrowIcon, teamLabel) not found.');
        }

        // Thêm event listener cho các menu button
        menuButtons.forEach(button => {
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                // const menuText = this.querySelector('span')?.textContent || this.textContent;
                const menuText = this.dataset.menu;

                // Cập nhật nội dung của team-label
                if (teamLabel && menuTextElement) {
                    if (menuText === 'All') {
                        menuTextElement.textContent = '';
                    } else {
                        menuTextElement.textContent = ` ${menuText}`;
                    }
                }

                // Lọc dữ liệu dựa trên menu được click
                let filteredData = [];
                if (menuText === 'All') {
                    filteredData = teamData;
                } else {
                    filteredData = teamData.filter(item => 
                        item.selected_menu === menuText || 
                        item.selected_menu.startsWith(menuText)
                    );
                }

                // Cập nhật giao diện với dữ liệu đã lọc
                renderTeamMembers(filteredData);

                // Optional: Thêm class active cho button đang chọn
                menuButtons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                // Đóng dropdown sau khi chọn
                if (dropdownContent && arrowIcon) {
                    dropdownContent.classList.remove('open');
                    dropdownContent.style.height = '0px';
                    dropdownContent.style.opacity = '0';
                    arrowIcon.classList.remove('open');
                }
            });
        });
    });
</script>
