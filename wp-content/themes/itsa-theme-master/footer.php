
<?php
global $myplugin;
    $optionTheme  = $myplugin->themeSettings->getSettings();
    $logo = !empty($optionTheme['awe_footer_logo']) ? $optionTheme['awe_footer_logo'] : '';
?>
<div class="p-3 md:pt-6 bg-black text-white font-mono text-mono-12">
                <div class="flex flex-col gap-6">
                    <div class="grid grid-cols-12 gap-y-6">
                        <div class="col-span-12 md:col-span-3">
                            <div class="flex">
                                <!-- <svg width="94" height="108" viewBox="0 0 94 108" class="text-green block w-[53px] h-[60px] md:w-[94px] md:h-[108px]">
                                    <path d="M94 33.2314L36.1538 0L28.9231 4.15692V12.4628L21.6923 8.30585L14.4615 12.4628V20.7686L7.23077 16.6117L0 20.7686V87.2314L7.23077 91.3883L14.4615 87.2314V95.5372L21.6923 99.6942L28.9231 95.5372V103.843L36.1538 108L94 74.7686V66.4628L86.7692 62.3059L94 58.1489V49.8431L86.7692 45.6862L94 41.5292V33.2314ZM14.4615 78.9255L7.23077 83.0825V24.9255L14.4615 29.0825V78.9255ZM36.1538 83.0745V74.7686L65.0769 58.1569L72.3077 62.3138L36.1538 83.0745ZM57.8462 54L36.1538 66.4628V41.5372L57.8462 54ZM65.0769 49.8431L36.1538 33.2314V24.9255L72.3077 45.6942L65.0769 49.8431ZM21.6923 16.6117L28.9231 20.7686V29.0745L21.6923 24.9175V16.6117ZM21.6923 33.2314L28.9231 37.3883V70.6197L21.6923 74.7766V33.2314ZM21.6923 83.0745L28.9231 78.9175V87.2234L21.6923 91.3803V83.0745ZM86.7692 70.6117L36.1538 99.6862V91.3803L79.5385 66.4548L86.7692 70.6117ZM86.7692 54L79.5385 58.1569L72.3077 54L79.5385 49.8431L86.7692 54ZM79.5385 41.5372L36.1538 16.6117V8.30585L86.7692 37.3803L79.5385 41.5372Z" fill="currentColor"></path>
                                </svg> -->
                                <img src="<?php echo $logo ?>" alt="Icon" class="text-green block w-[53px] h-[60px] md:w-[94px] md:h-[108px]" />
                            </div>
                        </div>
                        <div class="col-span-12 md:col-span-6 flex flex-col gap-6">
                            <div class="grid md:grid-cols-3 gap-y-1">
                                <?php dynamic_sidebar('awe-footer-menu-area');?>
                            </div>
                            <div class="grid md:grid-cols-3 gap-y-1">
                                <?php if(!empty($optionTheme['awe_social_fb'])):?>
                                    <div>
                                        <a class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_fb'] ?>">Facebook</a>
                                    </div>
                                <?php endif ?>
                                <?php if(!empty($optionTheme['awe_social_ins'])):?>
                                    <div>
                                        <a class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_ins'] ?>">Instagram</a>
                                    </div>
                                <?php endif ?>
                                <?php if(!empty($optionTheme['awe_social_twitter'])):?>
                                    <div>
                                        <a class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_twitter'] ?>">Twitter</a>
                                    </div>
                                <?php endif ?>
                                <?php if(!empty($optionTheme['awe_social_linkedin'])):?>
                                    <div>
                                        <a class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_linkedin'] ?>">Linkedin</a>
                                    </div>
                                <?php endif ?>
                                <?php if(!empty($optionTheme['awe_social_you'])):?>
                                    <div>
                                        <a class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_you'] ?>">Youtube</a>
                                    </div>
                                <?php endif ?>
                                <?php if(!empty($optionTheme['awe_social_warpcast'])):?>
                                    <div>
                                        <a class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_warpcast'] ?>">Warpcast</a>
                                    </div>
                                <?php endif ?>
                                <?php if(!empty($optionTheme['awe_social_zalo'])):?>
                                    <div>
                                        <a _key="f325e52a9ec5" class="link-underline-hover" target="_blank" rel="noopener noreferrer" href="<?php echo $optionTheme['awe_social_zalo'] ?>">Zalo</a>
                                    </div>
                                <?php endif ?>
                                
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-12 items-end gap-y-6">
                        <div class="col-span-12 md:col-span-3">
                            <!-- <ul class="flex flex-col gap-1">
                                <li><a _key="d6e347271e47" class="link-underline-hover" href="https://www.paradigm.xyz/website-terms-of-use">Terms</a></li>
                                <li><a _key="29e55cad5ff7" class="link-underline-hover" href="https://www.paradigm.xyz/important-disclosures">Disclosures</a></li>
                                <li><a _key="02e810af4cf8" class="link-underline-hover" href="https://www.paradigm.xyz/privacy-policy">Privacy</a></li>
                                <li><a _key="520d04d2ff65" class="link-underline-hover" href="https://www.paradigm.xyz/privacy-policy#83a48e65d92d">CA Privacy</a></li>
                            </ul> -->
                        </div>
                        <div class="col-span-12 md:col-span-6">
                            <p>
                                <?php echo !empty($optionTheme['awe_footer_copyright']) ? $optionTheme['awe_footer_copyright'] : '' ?>
                            </p>
                        </div>
                        <div class="col-span-12 md:col-span-3">
                            <div class="flex justify-between md:justify-end">
                                <div class="tag block md:hidden"></div>
                                <div class="tag"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
        </div>
        <script id="__NEXT_DATA__" type="application/json"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/js/js'?>" data-nscript="afterInteractive"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/pages/[slug]-0ea5e165854b7652.js'?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/3367-0205374eb3f7b060.js'?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/7295-3d19f8d3b9ea4147.js'?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/pages/careers-4f1e234187272549.js'?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/js/index-6d8b7e8cfd91f0c1.js'?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/js/1358-b6def54e6ad0bd04.js'?>"></script>
       
        <script src="<?php echo get_template_directory_uri() . '/assets/js/custom.js'?>"></script>
        
    </body>
</html>