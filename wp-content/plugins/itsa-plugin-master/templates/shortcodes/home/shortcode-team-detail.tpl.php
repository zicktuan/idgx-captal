<div class="md:px-container-desktop my-8 md:my-12 lg:my-18">
    <div>
        <div class="grid grid-cols-12 gap-y-3">
            <div class="col-span-12 md:col-span-6 md:col-start-5 xl:col-start-4 max-w-[1000px]">
                <div class="flex flex-col gap-3 md:gap-6">
                    <div class="grid grid-cols-6 gap-y-3 min-h-[280px]">
                        <div class="xl:grid col-span-6 xl:col-span-3 xl:col-start-4 xl:row-start-1 xl:max-w-[280px] xl:justify-self-end w-full">
                            <div class="image overflow-hidden block w-full aspect-square">
                                <picture>
                                    <source srcset="<?php echo !empty($atts['itsa_team_detail_avt']) ? wp_get_attachment_url($atts['itsa_team_detail_avt']) : '' ?>" media="(min-width: 1000px)">
                                    <source srcset="<?php echo !empty($atts['itsa_team_detail_avt']) ? wp_get_attachment_url($atts['itsa_team_detail_avt']) : '' ?>" media="(min-width: 600px)">
                                    <img class="" src="<?php echo !empty($atts['itsa_team_detail_avt']) ? wp_get_attachment_url($atts['itsa_team_detail_avt']) : '' ?>">
                                </picture>
                            </div>
                        </div>
                        <div class="col-span-6 xl:col-span-3 xl:col-start-1 xl:row-start-1 px-container-mobile md:px-0">
                            <div class="text-mono-13 flex flex-col gap-3">
                                <div class="font-mono flex flex-col gap-1">
                                    <div class="flex flex-col gap-half">
                                        <p class="text-mono-24">
                                            <?php echo !empty($atts['itsa_team_detail_name']) ? $atts['itsa_team_detail_name'] : '' ?>
                                        </p>
                                        <p><?php echo !empty($atts['itsa_team_detail_position']) ? $atts['itsa_team_detail_position'] : '' ?></p>
                                    </div>
                                    <?php if(!empty($listItems)): ?>
                                    <div class="flex gap-1 flex-wrap">
                                        <?php foreach($listItems as $item): ?>
                                            <a _key="4ce598984b65" class="block button button-tag" target="_blank" rel="noopener noreferrer" 
                                            href="<?php echo !empty($item['url']) ? $item['url'] : '#' ?>">
                                                <?php echo !empty($item['name']) ? $item['name'] : '' ?>
                                            </a>
                                        <?php endforeach ?>
                                    </div>
                                    <?php endif ?>
                                </div>
                                <div class="flex flex-col gap-1 text-serif-14">
                                    <p>
                                    <?php echo !empty($atts['itsa_team_detail_desc']) ? $atts['itsa_team_detail_desc'] : '' ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-12 md:col-span-3 md:row-start-1 md:col-start-1 md:px-0 px-container-mobile">
                <div class="md:sticky top-12 lg:top-18">
                    <div class="flex">
                        <a class="block button button-tag pointer-events-auto" href="<?php echo $atts['itsa_team_detail_url_back'] ? $atts['itsa_team_detail_url_back'] : '#' ?>">
                            <div class="flex items-center gap-half">
                                <svg width="12" height="6" viewBox="0 0 12 6" class="block">
                                    <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                                </svg>
                                Back to Team
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>