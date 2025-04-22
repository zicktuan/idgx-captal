
<?php
global $myplugin;
    $optionTheme  = $myplugin->themeSettings->getSettings();
    $logo = !empty($optionTheme['awe_footer_logo']) ? $optionTheme['awe_footer_logo'] : '';
?>
<style>
    .logo-footer-idgx {
        width: 100px;
        height: 70px;
    }

    @media (min-width: 1024px) {
        .logo-footer-idgx {
            height: 65px;
        }
    }
</style>
<div class="p-3 md:pt-6 bg-black text-white font-mono text-mono-12">
                <div class="flex flex-col gap-6">
                    <div class="grid grid-cols-12 gap-y-6">
                        <div class="col-span-12 md:col-span-3">
                            <div class="flex">
                                <img src="<?php echo $logo ?>" alt="Icon" class="logo-footer-idgx" />
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