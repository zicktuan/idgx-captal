
<div>
    <div class="relative min-h-hero flex flex-col justify-center items-center p-4 relative overflow-hidden mt-3 md:mt-2">
        <div class="relative w-[70vw]" style="max-width: min(626px, 80svh);">
            <div class="aspect-square w-full relative icon-spiral--animated center-point">
                <div class="icon-spiral-container--dark">
                    <div class="icon-spiral-bg--dark icon-spiral-bg--dark--animated"></div>
                </div>
                <div class="icon-spiral-container--med">
                    <div class="icon-spiral-bg--med icon-spiral-bg--med--animated"></div>
                </div>
                <div class="icon-spiral-container--light">
                    <div class="icon-spiral-bg--light icon-spiral-bg--light--animated"></div>
                </div>
            </div>
        </div>
        <svg id="dynamic-lines" class="absolute inset-0 z-0 pointer-events-none w-full h-full"></svg>
        <div class="tag absolute top-[50%] left-[50%] translate-x-[-50%] translate-y-[-50%]"></div>
        <a _key="98a17dad2e1c" class="point-link" href="https://www.paradigm.xyz/oss" data-x="68" data-y="20">
            <div class="absolute top-[25%] left-[10%] sm:top-[25%] sm:left-[10%] md:top-[30%] md:left-[10%] lg:top-[20%] lg:left-[65%] xl:left-[68%]">
                <div class="tag absolute top-0 left-0"></div>
                <div class="relative left-[24px] top-[-4px]">
                    <div class="w-[60vw] max-w-[340px]">
                        <div>
                            <div>
                                <div class="flex flex-col gap-[8px] relative">
                                    <div class="flex items-center gap-1">
                                        <a _key="98a17dad2e1c" class="block button button-tag !bg-gray uppercase link-cover" 
                                        href="<?php echo !empty($atts['itsa_home_url_2']) ? $atts['itsa_home_url_2'] : '#' ?>">
                                            <?php echo !empty($atts['itsa_home_title_2']) ? $atts['itsa_home_title_2'] : '' ?>
                                        </a>
                                        <svg width="12" height="6" viewBox="0 0 12 6" class="block rotate-180">
                                            <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="homepage-tag-description text-serif-14 md:text-serif-18 lg:block max-w-[370px] hidden block">
                                        <p><?php echo !empty($atts['itsa_home_desc_2']) ? $atts['itsa_home_desc_2'] : '' ?></p>
                                    </div>
                                    <div class="hidden lg:block">
                                        <div class="flex gap-1 rounded-6 shrink-0">
                                            <?php if (!empty($listItems[0])):?>
                                            <?php foreach ($listItems as $item): ?>
                                            <a _key="bfbd58f4966b" class="focus:outline-none" target="_blank" rel="noopener noreferrer" href="#">
                                                <div class="block relative w-9 h-9 border-dashed box-border border hover:border-none border-dark-gray p-[10px] bg-white">
                                                    <div class="image overflow-hidden w-full h-full block">
                                                        <picture>
                                                            <img class="" src="<?php echo !empty($item['image']) ? wp_get_attachment_url($item['image']) : '' ?>">
                                                        </picture>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php endforeach?>
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a _key="abd15ddaf153" class="point-link" href="https://www.paradigm.xyz/about" data-x="25" data-y="40">
            <div class="absolute top-[12%] left-[40%] sm:top-[10%] sm:left-[50%] md:top-[15%] md:left-[40%] lg:top-[40%] lg:left-[20%] xl:left-[25%]">
                <div class="tag absolute top-0 left-0"></div>
                <div class="relative left-[24px] top-[-4px]">
                    <div class="w-[50vw] md:w-[60vw] max-w-[218px] md:max-w-[285px] lg:translate-x-[-70%] xl:translate-x-[-95%]">
                        <div>
                            <div>
                                <div class="flex flex-col gap-[8px] relative">
                                    <div class="flex items-center gap-1">
                                        <a _key="abd15ddaf153" class="block button button-tag !bg-gray uppercase link-cover" 
                                        href="<?php echo !empty($atts['itsa_home_url_3']) ? $atts['itsa_home_url_3'] : '' ?>">
                                            <?php echo !empty($atts['itsa_home_title_1']) ? $atts['itsa_home_title_1'] : '' ?>
                                        </a>
                                        <svg width="12" height="6" viewBox="0 0 12 6" class="block rotate-180">
                                            <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="homepage-tag-description text-serif-14 md:text-serif-18 lg:block max-w-[370px]">
                                        <p><?php echo !empty($atts['itsa_home_desc_1']) ? $atts['itsa_home_desc_1'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <a _key="0e8769889c73" class="point-link" href="https://www.paradigm.xyz/collaborate-with-us" data-x="68" data-y="70">
            <div class="absolute top-[78%] left-[15%] sm:top-[80%] sm:left-[25%] md:top-[78%] md:left-[20%] lg:top-[70%] lg:left-[60%] xl:left-[68%]">
                <div class="tag absolute top-0 left-0"></div>
                <div class="relative left-[24px] top-[-4px]">
                    <div class="w-[60vw] max-w-[210px] md:max-w-[340px]">
                        <div>
                            <div>
                                <div class="flex flex-col gap-[8px] relative">
                                    <div class="flex items-center gap-1">
                                        <a _key="0e8769889c73" class="block button button-tag !bg-gray uppercase link-cover" 
                                        href="<?php echo !empty($atts['itsa_home_url_3']) ? $atts['itsa_home_url_3'] : '#' ?>">
                                            <?php echo !empty($atts['itsa_home_title_3']) ? $atts['itsa_home_title_3'] : '' ?>
                                        </a>
                                        <svg width="12" height="6" viewBox="0 0 12 6" class="block rotate-180">
                                            <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                                        </svg>
                                    </div>
                                    <div class="homepage-tag-description text-serif-14 md:text-serif-18 lg:block max-w-[370px]">
                                        <p><?php echo !empty($atts['itsa_home_desc_3']) ? $atts['itsa_home_desc_3'] : '' ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>
<style>
   #dynamic-lines line {
        stroke: black;
        transition: stroke 0.3s;
    }

    .square-marker {
    position: absolute;
    width: 10px;
    height: 10px;
    background-color: black;
    transform: translate(-50%, -50%);
    transition: background-color 0.3s ease;
    }

    .center-marker {
    z-index: 10;
    }

    /* Hover hiệu ứng */
    body[data-hover-index="0"] line[data-index="0"],
    body[data-hover-index="0"] .square-marker[data-index="0"],
    body[data-hover-index="0"] .center-marker {
    stroke: #00ff00 !important;
    background-color: #00ff00 !important;
    }

    body[data-hover-index="1"] line[data-index="1"],
    body[data-hover-index="1"] .square-marker[data-index="1"],
    body[data-hover-index="1"] .center-marker {
    stroke: #00ff00 !important;
    background-color: #00ff00 !important;
    }

    /* Thêm dòng mới cho từng index nếu bạn có nhiều point-link */


</style>

<script>
    function updateLines() {
        const svg = document.getElementById("dynamic-lines");
        svg.innerHTML = ""; // Xóa đường cũ

        const svgRect = svg.getBoundingClientRect();
        svg.setAttribute("viewBox", `0 0 ${svgRect.width} ${svgRect.height}`);

        const centerElement = document.querySelector(".center-point");
        if (!centerElement) return;

        const centerRect = centerElement.getBoundingClientRect();
        const centerX = centerRect.left + centerRect.width / 2 - svgRect.left;
        const centerY = centerRect.top + centerRect.height / 2 - svgRect.top;

        const pointLinks = document.querySelectorAll(".point-link");

        pointLinks.forEach((link, index) => {
            const tag = link.querySelector(".tag");
            if (!tag) return;

            const rect = tag.getBoundingClientRect();
            const x = rect.left + rect.width / 2 - svgRect.left;
            const y = rect.top + rect.height / 2 - svgRect.top;

            const line = document.createElementNS("http://www.w3.org/2000/svg", "line");
            line.setAttribute("x1", centerX);
            line.setAttribute("y1", centerY);
            line.setAttribute("x2", x);
            line.setAttribute("y2", y);
            line.setAttribute("stroke", "black");
            line.setAttribute("stroke-width", "1");
            line.setAttribute("data-index", index);

            svg.appendChild(line);

            // Gán data-index cho link để dùng cho CSS
            link.setAttribute("data-index", index);
        });
    }

    // document.querySelectorAll(".point-link").forEach(link => {
    //     link.addEventListener("mouseenter", () => {
    //         const index = link.getAttribute("data-index");
    //         document.body.setAttribute("data-hover-index", index);
    //     });
    //     link.addEventListener("mouseleave", () => {
    //         document.body.removeAttribute("data-hover-index");
    //     });
    // });

    document.addEventListener("DOMContentLoaded", updateLines);
    window.addEventListener("resize", updateLines);
</script>
