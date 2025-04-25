<style>
    .arrow-icon {
        transition: transform 0.3s ease;
    }

    /* Khi mở menu thì thêm class này */
    .arrow-rotated {
        transform: rotate(180deg) !important;
    }
    .idgx-link-portfolio:hover {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
    }
    .idgx-title-portfolio {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        display: inline-block;
        text-shadow: 0 0 10px rgba(188, 56, 217, 0.4);
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
                            <h2 class="idgx-title-portfolio font-mono text-mono-12 uppercase font-medium">
                                <?php echo !empty($item['title']) ? $item['title']: ''?>
                            </h2>
                            <?php if (!empty($item['path'])):?>
                            <div class="grid lg:grid-cols-2">
                                <div class="rich-text line-break font-mono text-mono-12">
                                    Explore more
                                    <a href="<?php echo $item['path']?>" class="idgx-link-portfolio" target="_blank rel="noopener noreferrer">
                                        here. 
                                    </a>
                                </div>
                            </div>
                            <?php endif?>
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
                                <a _key="3f41a6ce9406" class="portfolio-link" 
                                data-title="<?php echo !empty($value['name']) ? esc_attr($value['name']) : ''; ?>" 
                                data-desc-short="<?php echo !empty($value['title']) ? esc_attr($value['title']) : ''; ?>" 
                                data-desc="<?php echo !empty($value['desc']) ? esc_attr($value['desc']) : ''; ?>" 
                                data-linkedin="<?php echo !empty($value['lkd']) ? esc_url($value['lkd']) : ''; ?>"
                                data-website="<?php echo !empty($value['web']) ? esc_url($value['web']) : ''; ?>" 
                                data-twitter="<?php echo !empty($value['tw']) ? esc_url($value['tw']) : ''; ?>" 
                                data-img="<?php echo !empty($value['img']) ? wp_get_attachment_url($value['img']) : ''; ?>"
                                rel="noopener noreferrer" href="<?php echo !empty($value['url']) ? $value['url'] : ''?>">
                                    <div class="img-swap relative w-full aspect-square overflow-hidden">
                                        <div class="image-wrapper overflow-hidden block w-full aspect-square select-none absolute hover:opacity-60">
                                            <picture>
                                                <source srcset="<?php echo !empty($value['img']) ? wp_get_attachment_url($value['img']) : '' ?>" media="(min-width: 600px)">
                                                <img class="portfolio-image" src="<?php echo !empty($value['img']) ? wp_get_attachment_url($value['img']) : '' ?>">
                                            </picture>
                                        </div>
                                    </div>
                                </a>
                                <div class="flex flex-col gap-half">
                                    <p class="font-mono font-medium uppercase text-mono-12">
                                        <a _key="3f41a6ce9406" class="link-underline-hover" rel="noopener noreferrer" 
                                        href="<?php echo !empty($value['url']) ? $value['url'] : ''?>">
                                            <?php echo !empty($value['name']) ? $value['name'] : ''?>
                                        </a>
                                    </p>
                                    <a _key="3f41a6ce9406" class="" rel="noopener noreferrer" href="https://uniswap.org/">
                                        <div class="rich-text line-break font-mono text-mono-12">
                                            <p><?php echo !empty($value['title']) ? $value['title'] : ''?></p>
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
        <div class="w-full text-center mt-24 px-container-mobile md:px-container-desktop" style="margin-bottom: 30px;">
            <div class="font-mono text-mono-12 uppercase font-medium text-[#000]">
                BECOME A PART OF US!
            </div>
            <div class="font-mono text-mono-12 mt-2 text-[#000]">
                Web3 enthusiasts with a can-do <br/>
                attitude are wanted to join our team.
            </div>
        </div>
    </div>
    <div id="portfolioPopup" class="popup-overlay">
        <div class="popup-content">
            <span id="popupClose" class="popup-close">×</span>
            <div class="popup-image-container">
                <img id="popupImage" src="" alt="Portfolio Image">
            </div>
            <h3 id="popupTitle"></h3>
            <p id="popupDescShort" class="popup-desc-short"></p>
            <div class="popup-socials">
                <a id="popupWebsite" href="" target="_blank" rel="noopener noreferrer">
                    <span class="social-icon website-icon"></span> Website
                </a>
                <a id="popupTwitter" href="" target="_blank" rel="noopener noreferrer">
                    <span class="social-icon twitter-icon"></span> Twitter
                </a>
                <a id="popupLinkedIn" href="" target="_blank" rel="noopener noreferrer">
                    <span class="social-icon linkedin-icon"></span> LinkedIn
                </a>
            </div>
            <div class="popup-description">
                <p id="popupDesc"></p>
            </div>
        </div>
    </div>
</div>
<style>
    .img-swap {
        position: relative;
        width: 100%;
        aspect-ratio: 1 / 1;
        overflow: hidden;
        }
    .image-wrapper {
        position: absolute;
        overflow: hidden;
        display: flex;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, #6366f1, #ec4899);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); /* đổ bóng nhẹ */
    }

    .portfolio-image {
        max-width: 90%;
        max-height: 100%;
        margin: 0 auto;
        width: 100%;
        height: 100%;
        display: block;
        object-fit: contain;
    }

    .popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1000;
    display: none;
    align-items: center;
    justify-content: center;
}

.popup-content {
    background: #fff;
    max-width: 600px;
    width: 90%;
    padding: 20px;
    border-radius: 8px;
    position: relative;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    text-align: left;
}

.popup-close {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 24px;
    cursor: pointer;
    color: #999;
    font-weight: bold;
}

.popup-image-container {
    width: 180px;
    height: 140px;
    margin-bottom: 15px;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border: 1px solid #e91e63;
    border-radius: 25px;
}

.popup-content img {
    max-width: 90%;
    max-height: 100%;
    margin: 0 auto;
    width: 100%;
    height: 100%;
    display: block;
    object-fit: contain;
    border-radius: 4px;
}

.popup-content h3 {
    font-family: 'Arial', sans-serif;
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-bottom: 5px;
}

.popup-desc-short {
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    color: #e91e63;
    margin-bottom: 15px;
    font-weight: 500;
}

.popup-socials {
    display: flex;
    gap: 15px;
    margin-bottom: 20px;
}

.popup-socials a {
    display: flex;
    align-items: center;
    gap: 5px;
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    color: #1a73e8;
    text-decoration: none;
    font-weight: 500;
}

.popup-socials a:hover {
    text-decoration: underline;
}

.social-icon {
    display: inline-block;
    width: 16px;
    height: 16px;
    background-size: contain;
    background-repeat: no-repeat;
}

.website-icon {
    background-image: url('https://img.icons8.com/ios-filled/50/1a73e8/globe.png');
}

.twitter-icon {
    background-image: url('https://img.icons8.com/ios-filled/50/1a73e8/twitter.png');
}

.linkedin-icon {
    background-image: url('https://img.icons8.com/ios-filled/50/1a73e8/linkedin.png');
}

.popup-description {
    font-family: 'Arial', sans-serif;
    font-size: 14px;
    color: #333;
    line-height: 1.5;
}

.popup-description p {
    margin: 0;
}
</style>
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


    const popup = document.getElementById("portfolioPopup");
    const popupImage = document.getElementById("popupImage");
    const popupTitle = document.getElementById("popupTitle");
    const popupDescShort = document.getElementById("popupDescShort");
    const popupDesc = document.getElementById("popupDesc");
    const popupWebsite = document.getElementById("popupWebsite");
    const popupTwitter = document.getElementById("popupTwitter");
    const popupClose = document.getElementById("popupClose");
    const portfolioLinks = document.querySelectorAll(".portfolio-link");
    const popupLinkedIn = document.getElementById("popupLinkedIn");

    // Mở popup khi click vào ảnh
    portfolioLinks.forEach(link => {
        link.addEventListener("click", function (e) {
            e.preventDefault(); // Ngăn chuyển hướng mặc định
            popupImage.src = this.getAttribute("data-img");
            popupTitle.textContent = this.getAttribute("data-title");
            popupDescShort.textContent = this.getAttribute("data-desc-short");
            popupDesc.textContent = this.getAttribute("data-desc");
            
            // Xử lý link mạng xã hội
            const websiteUrl = this.getAttribute("data-website");
            const twitterUrl = this.getAttribute("data-twitter");
            const linkedinUrl = this.getAttribute("data-linkedin");
            
            if (websiteUrl) {
                popupWebsite.href = websiteUrl;
                popupWebsite.style.display = "flex";
            } else {
                popupWebsite.style.display = "none";
            }
            
            if (twitterUrl) {
                popupTwitter.href = twitterUrl;
                popupTwitter.style.display = "flex";
            } else {
                popupTwitter.style.display = "none";
            }

            if (linkedinUrl) {
                popupLinkedIn.href = linkedinUrl;
                popupLinkedIn.style.display = "flex";
            } else {
                popupLinkedIn.style.display = "none";
            }
            
            popup.style.display = "flex";
        });
    });

    // Đóng popup khi click vào nút đóng
    popupClose.addEventListener("click", function () {
        popup.style.display = "none";
    });

    // Đóng popup khi click bên ngoài nội dung
    popup.addEventListener("click", function (e) {
        if (e.target === popup) {
            popup.style.display = "none";
        }
    });

    // Đóng popup khi nhấn phím Esc
    document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") {
            popup.style.display = "none";
        }
    });
});
</script>
