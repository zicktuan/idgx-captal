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
    @media (max-width: 767px) {
        .team-menu::before {
            content: none;
        }
    }
    @media (min-width: 768px) and (max-width: 1023px) {
        .team-menu::before {
            content: none;
        }
    }

</style>
<div class="relative min-h-svh">
    <div>
        <div class="relative min-h-svh">
            <div class="md:hidden sticky top-6 p-[16px] z-10 bg-white">
                <div class="border border-solid border-gray">
                    <button class="team-toggle block w-full font-mono text-mono-12">
                        <div class="flex justify-between items-center p-2">
                            <div class="flex gap-[16px]">
                                <div class="uppercase font-medium">
                                    <span class="team-label">Team</span>
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
            <div class="px-container-mobile md:px-container-desktop my-8 md:my-12 lg:my-18 team-container">
                <div class="grid grid-cols-12 list-item team-grid">
                    <div class="col-span-12 md:col-span-7 md:col-start-5 xl:col-start-4 max-w-[1000px]">
                        <div class="grid grid-cols-2 lg:grid-cols-4 gap-x-2 gap-y-4">
                        <?php if(!empty($listItemsData[0])):?>
                            <?php foreach($listItemsData as $item):?>
                                <div class="relative flex flex-col gap-1 md:gap-[14px]">
                                    <div class="w-full aspect-square overflow-hidden">
                                        <div class="image overflow-hidden block w-full aspect-square select-none">
                                            <picture>
                                                <source srcset="<?php echo !empty($item['img']) ? wp_get_attachment_url($item['img']) : '' ?>" media="(min-width: 600px)">
                                                <img class="<?php echo !empty($item['img']) ? wp_get_attachment_url($item['img']) : '' ?>" src="">
                                            </picture>
                                        </div>
                                    </div>
                                    <div class="flex flex-col gap-half font-mono text-mono-12">
                                        <p class="font-medium">
                                            <a class="link-underline-hover link-cover" href="<?php echo !empty($item['url']) ? $item['url'] : '#'?>">
                                                <?php echo !empty($item['name']) ? $item['name'] : '' ?>
                                            </a>
                                        </p>
                                        <p><?php echo !empty($item['position']) ? $item['position'] : '' ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
    </div>
</div>
<script>
    const teamData = <?php 
        $data_with_urls = array_map(function($item) {
            $item['img_url'] = !empty($item['img']) ? wp_get_attachment_url($item['img']) : '';
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
        const teamGrid = document.querySelector('.team-grid .grid');
        const menuButtons = document.querySelectorAll('.team-menu, .link-tag-push');

        const teamToggle = document.querySelector('.team-toggle');
        const dropdownContent = document.querySelector('.dropdown-content');
        const arrowIcon = document.querySelector('.arrow-icon');
        const teamLabel = document.querySelector('.team-label');

        // Hàm render team members
        function renderTeamMembers(items) {
            teamGrid.innerHTML = ''; // Xóa nội dung hiện tại
            
            items.forEach(item => {
                const memberHTML = `
                    <div class="relative flex flex-col gap-1 md:gap-[14px]">
                        <div class="w-full aspect-square overflow-hidden">
                            <div class="image overflow-hidden block w-full aspect-square select-none">
                                <picture>
                                    <source srcset="${item.img_url || ''}" media="(min-width: 600px)">
                                    <img src="${item.img_url || ''}" alt="${item.name || ''}">
                                </picture>
                            </div>
                        </div>
                        <div class="flex flex-col gap-half font-mono text-mono-12">
                            <p class="font-medium">
                                <a class="link-underline-hover link-cover" href="${item.url || '#'}">
                                    ${item.name || ''}
                                </a>
                            </p>
                            <p>${item.position || ''}</p>
                        </div>
                    </div>
                `;
                teamGrid.insertAdjacentHTML('beforeend', memberHTML);
            });
        }

        // Hiển thị tất cả members khi load trang
        renderTeamMembers(teamData);

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
                if (teamLabel) {
                    if (menuText === 'All') {
                        teamLabel.textContent = 'TEAM';
                    } else {
                        teamLabel.textContent = `TEAM ${menuText}`;
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
