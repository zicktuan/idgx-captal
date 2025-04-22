<div class="relative min-h-svh">
    <div>
        <div class="px-container-mobile md:px-container-desktop my-8 md:mt-12 lg:mt-18">
            <div class="grid grid-cols-12 gap-y-3">
                <div class="col-span-12 md:col-span-7 max-w-[1000px] md:col-start-5 xl:col-start-4 xl:col-span-5">
                    <div class="flex flex-col gap-3 3xl:gap-6">
                        <h1 class="idgx-about text-serif-32 md:text-serif-40 3xl:text-serif-64">
                            <?php echo !empty($atts['itsa_about_title']) ? $atts['itsa_about_title'] : '' ?>
                        </h1>
                        <div class="rich-text rich-text-page line-break text-serif-18 3xl:text-serif-24">
                            <div>
                                <?php echo !empty($content) ? $content : '' ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    .idgx-about {
        background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        color: transparent;
        display: inline-block;
        text-shadow: 0 0 10px rgba(188, 56, 217, 0.4);
    }
</style>