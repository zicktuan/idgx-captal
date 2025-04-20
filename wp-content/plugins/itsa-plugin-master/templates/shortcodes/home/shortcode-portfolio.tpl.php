<style>
    .arrow-icon {
        transition: transform 0.3s ease;
    }

    /* Khi mở menu thì thêm class này */
    .arrow-rotated {
        transform: rotate(180deg) !important;
    }
</style>
<div class="relative min-h-svh">
    <div>
        <div class="hidden md:block absolute inset-0 pointer-events-none px-container-desktop z-10">
            <div class="sticky top-12 lg:top-18 md:max-w-[30%] lg:max-w-[22%] pointer-events-auto">
                <div class="font-mono text-mono-12 flex flex-col gap-1">
                    <p class="uppercase font-medium"><?php echo !empty($atts['itsa_portfolio_title']) ? $atts['itsa_portfolio_title'] : ''?></p>
                    <?php if(!empty($listItems[0])):?>
                    <ul class="flex flex-col gap-1">
                        <?php foreach($listItems as $menu):?>
                        <li>
                            <a _key="beb9384e2db1" class="link-tag-push pointer-events-auto menu-link" 
                                href="#<?php echo !empty($menu['name']) ? strtolower($menu['name']) : ''?>">
                                <span><?php echo !empty($menu['name']) ? $menu['name'] : ''?></span>
                            </a>
                        </li>
                        <?php endforeach ?>
                    </ul>
                    <?php endif?>
                </div>
            </div>
        </div>
        <div class="md:hidden sticky top-6 p-[16px] z-10 bg-white">
            <div class="border border-solid border-gray">
                <button id="toggleMenuMobile" class="block w-full font-mono text-mono-12">
                    <div class="flex justify-between items-center p-2">
                        <div class="uppercase font-medium">Portfolio</div>
                        <img id="arrowIcon" class="arrow-icon w-[12px] h-[6px] transition-transform duration-300" src="<?php echo get_template_directory_uri() . '/assets/images/icon-arrow-dropdown.svg'?>" style="transform: none;">
                    </div>
                </button>
                <div>
                <div id="dropdownMenuMobile" class="overflow-hidden pointer-events-none transition-all duration-300" style="height: 0px; opacity: 0;">
                        <div>
                            <div class="p-2 pt-0">
                            <?php if(!empty($listItems[0])):?>
                                <ul class="flex flex-col gap-2 font-mono text-mono-12">
                                    <?php foreach($listItems as $menuItem):?>
                                    <li>
                                        <a _key="beb9384e2db1" class="link-underline-hover pointer-events-auto flex" href="#<?php echo !empty($menuItem['name']) ? strtolower($menuItem['name']) : ''?>">
                                        <?php echo !empty($menuItem['name']) ? $menuItem['name'] : ''?>
                                        </a>
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
        <?php if(!empty($listItemsData[0])):?>
        <?php foreach($listItemsData as $item):?>
        <div id="<?php echo !empty($item['selected_menu']) ? strtolower($item['selected_menu']) : ''?>" class="px-container-mobile md:px-container-desktop my-8 md:my-12 lg:mt-18">
            <div class="grid grid-cols-12">
                <div class="col-span-12 md:col-span-7 md:col-start-5 xl:col-start-4 max-w-[1000px]">
                    <div class="flex flex-col gap-3 md:gap-4">
                        <div class="flex flex-col gap-1">
                            <h2 class="font-mono text-mono-12 uppercase font-medium">
                                <?php echo !empty($item['title']) ? $item['title']: ''?>
                            </h2>
                            <div class="grid lg:grid-cols-2">
                                <div class="rich-text line-break font-mono text-mono-12">
                                    <p><?php echo !empty($item['desc']) ? $item['desc']: ''?></p>
                                </div>
                            </div>
                        </div>
                        <?php
                            if(!empty($item['sub_items'])):
                            $subItems = vc_param_group_parse_atts( $item['sub_items'] );
                            if(!empty($subItems[0])):
                        ?>
                        <div class="grid gap-x-3 gap-y-4 grid-cols-2 lg:grid-cols-4">
                            <?php foreach($subItems as $value):?>
                            <div class="flex flex-col gap-1 relative">
                                <a _key="3f41a6ce9406" class="" target="_blank" rel="noopener noreferrer" href="<?php echo !empty($value['url']) ? $value['url'] : ''?>">
                                    <div class="img-swap relative w-full aspect-square overflow-hidden">
                                        <div class="image overflow-hidden block w-full aspect-square select-none absolute hover:opacity-60">
                                            <picture>
                                                <source srcset="<?php echo !empty($value['img']) ? wp_get_attachment_url($value['img']) : '' ?>" media="(min-width: 600px)">
                                                <img class="" src="<?php echo !empty($value['img']) ? wp_get_attachment_url($value['img']) : '' ?>">
                                            </picture>
                                        </div>
                                    </div>
                                </a>
                                <div class="flex flex-col gap-half">
                                    <p class="font-mono font-medium uppercase text-mono-12">
                                        <a _key="3f41a6ce9406" class="link-underline-hover" target="_blank" rel="noopener noreferrer" 
                                        href="<?php echo !empty($value['url']) ? $value['url'] : ''?>">
                                            <?php echo !empty($value['name']) ? $value['name'] : ''?>
                                        </a>
                                    </p>
                                    <a _key="3f41a6ce9406" class="" target="_blank" rel="noopener noreferrer" href="https://uniswap.org/">
                                        <div class="rich-text line-break font-mono text-mono-12">
                                            <p><?php echo !empty($value['desc']) ? $value['desc'] : ''?></p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; endif?>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach?>
        <?php endif ?>
       
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const toggleBtn = document.getElementById("toggleMenuMobile");
    const dropdown = document.getElementById("dropdownMenuMobile");
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

    // Đóng dropdown khi click vào bất kỳ link nào bên trong nó
    dropdown.querySelectorAll("a").forEach(function (link) {
        link.addEventListener("click", function () {
            closeDropdown();
        });
    });
});
</script>
