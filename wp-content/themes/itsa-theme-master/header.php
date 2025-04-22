<?php
    global $myplugin;
    $optionTheme  = $myplugin->themeSettings->getSettings();
    $logo = $optionTheme['awe_header_logo'];
?>
<!DOCTYPE html>
<!-- saved from url=(0025)https://www.paradigm.xyz/ -->
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <title><?php bloginfo('title')?></title>
        <meta property="og:title" content="<?php bloginfo('title')?>">
        <meta property="og:site_name" content="<?php bloginfo('title')?>">
        <!-- <link rel="apple-touch-icon" sizes="180x180" href="https://www.paradigm.xyz/favicon/apple-touch-icon.png">
        <link rel="mask-icon" href="https://www.paradigm.xyz/favicon/safari-pinned-tab.svg" color="#00d700">
        <link rel="icon" href="https://www.paradigm.xyz/favicon/favicon.ico" sizes="any">
        <link rel="icon" href="https://www.paradigm.xyz/favicon/favicon.svg" type="image/svg+xml"> -->
        <!-- <link rel="manifest" href="https://www.paradigm.xyz/favicon/site.webmanifest" crossorigin="use-credentials"> -->
        
        <link rel="preload" href="<?php echo get_template_directory_uri() . '/assets/_next/static/css/36d742fa6f75af33.css'?>" as="style">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/_next/static/css/36d742fa6f75af33.css'?>" data-n-g="">
        <link rel="preload" href="<?php echo get_template_directory_uri() . '/assets/_next/static/css/5b6964bdff897f88.css'?>" as="style">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri() . '/assets/_next/static/css/5b6964bdff897f88.css'?>">
        <link as="script" rel="prefetch" href="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/pages/[slug]-0ea5e165854b7652.js'?>">
        <link as="script" rel="prefetch" href="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/3367-0205374eb3f7b060.js'?>">
        <link as="script" rel="prefetch" href="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/7295-3d19f8d3b9ea4147.js'?>">
        <link as="script" rel="prefetch" href="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/pages/careers-4f1e234187272549.js'?>">

        <script defer="" nomodule="" src="<?php echo get_template_directory_uri() . '/assets/js/polyfills-c67a75d1b6f99dc8.js'?>"></script>
        <script defer="" src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/175675d1-ea6ec12d1ec73e3b.js'?>"></script>
        <script defer="" src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/3114-9ad26c08e3a6fd59.js'?>"></script>
        <script defer="" src="<?php echo get_template_directory_uri() . '/assets/_next/static/team/8370.b0f6899125f09c35.js'?>"></script>
        <script defer="" src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/6296.9ce23bc47085f63d.js'?>"></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/webpack-12e27c77f476249d.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/framework-cfbe8447b8b751ea.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/main-9a281b117d523626.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/pages/_app-64c08ce1425afd18.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/8294-352a030481cb472f.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/6674-9dd4e66fdcb6b802.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/_next/static/chunks/pages/index-6d8b7e8cfd91f0c1.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/js/_buildManifest.js'?>" defer=""></script>
        <script src="<?php echo get_template_directory_uri() . '/assets/js/_ssgManifest.js'?>" defer=""></script>
        <link as="script" rel="prefetch" href="<?php echo get_template_directory_uri() . '/assets/js/1358-b6def54e6ad0bd04.js'?>">
        <link as="script" rel="prefetch" href="<?php echo get_template_directory_uri() . '/assets/_next/static/team/[slug]-bd9ce1a70a8a1f47.js'?>">
        
        <style>
            html {
                scroll-behavior: smooth;
            }
            .main-menu {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
                transform: translateY(0);
                z-index: 1000;
                background: #fff;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                display: flex;
                justify-content: space-around;
                align-items: center;
                height: 48px;
                padding: 0 20px;
                font-family: monospace;
                font-size: 12px;
            }

            .main-menu.hidden {
                transform: translateY(-100%);
                pointer-events: none;
                opacity: 0;
            }

            .logo-wrapper {
                display: flex;
                align-items: center;
                height: 50px;
            }

            .logo-img {
                height: 30px;   /* Đặt cùng chiều cao với menu */
                width: auto;    /* Giữ tỉ lệ ảnh */
                display: block;
            }
            /* Menu trên mobile */
            #mobile-menu {
                transition: opacity 0.3s ease, transform 0.3s ease;
                transform: translateY(0);
                opacity: 1;
                background: #000; /* Nền đen để nổi bật trên nội dung phía sau */
                height: 80%;
                z-index: 1000; /* Tăng z-index để đảm bảo menu nằm trên cùng */
                position: fixed;
                top: 80px;
                left: 0;
                right: 0;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Thêm bóng để nổi bật */
            }

            #mobile-menu.hidden {
                transform: translateY(-10px);
                opacity: 0;
                display: none;
            }

            .mobile-main-menu {
                background: #000; /* Nền đen đồng bộ với #mobile-menu */
                padding: 20px; /* Khoảng cách bên trong */
                display: flex;
                flex-direction: column;
                align-items: flex-start; /* Căn trái các mục */
            }

            .mobile-main-menu li {
                list-style: none;
                margin-bottom: 15px; /* Khoảng cách giữa các mục */
            }

            .mobile-main-menu li a {
                display: flex;
                align-items: center;
                color: #fff; /* Chữ trắng */
                text-decoration: none;
                font-family: monospace;
                font-size: 14px;
                text-transform: uppercase;
                transition: color 0.3s ease;
            }

            /* Hình vuông nhỏ bên trái */
            .mobile-main-menu li a::before {
                content: '';
                display: inline-block;
                width: 10px;
                height: 10px;
                background: #555; /* Xám cho mục không active */
                margin-right: 10px;
                transition: background 0.3s ease;
            }

            .mobile-main-menu li.current-menu-item a::before {
                background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
            }

            /* Hiệu ứng hover */
            .mobile-main-menu li a:hover {
                color: #BC38D9; /* Bạn có thể chọn màu chính trong gradient nếu không muốn gradient chữ */
            }

            .mobile-main-menu li a:hover::before {
                background: linear-gradient(90deg, #060419, #2A0636, #6057CC, #BC38D9);
            }

            /* Đảm bảo nội dung phía sau không đè lên menu */
            #mobile-menu + div {
                margin-top: 80px; /* Đẩy nội dung xuống để không bị che bởi menu */
            }
         </style>
         <script>
            document.addEventListener('DOMContentLoaded', () => {
                const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
                const mobileMenu = document.getElementById('mobile-menu');

                const menu = document.getElementById('menu-main-menu');
                let lastScroll = 0;
                let ticking = false;

                // Hàm xử lý scroll
                function handleScroll() {
                    const currentScroll = window.pageYOffset || document.documentElement.scrollTop;

                    // Chỉ xử lý nếu scroll đủ lớn (tránh nhấp nháy khi scroll nhỏ)
                    if (Math.abs(currentScroll - lastScroll) > 10) {
                    if (currentScroll > lastScroll && currentScroll > 100) {
                        // Scroll xuống và đã qua 100px từ top
                        menu.classList.add('hidden');
                    } else {
                        // Scroll lên hoặc ở gần top
                        menu.classList.remove('hidden');
                    }
                    lastScroll = currentScroll <= 0 ? 0 : currentScroll;
                    }

                    ticking = false;
                }

                // Thêm sự kiện scroll với tối ưu hiệu suất
                window.addEventListener('scroll', () => {
                    if (!ticking) {
                    window.requestAnimationFrame(handleScroll);
                    ticking = true;
                    }
                }, { passive: true });

                mobileMenuToggle.addEventListener('click', () => {
                    mobileMenu.classList.toggle('hidden');
                });
            });
         </script>
    </head>
    <body>
    <div id="__next">
            <header>
                <div class="lg:hidden fixed z-50 top-0 left-0 right-0 bg-white">
                    <div class="px-container-mobile h-header-mobile flex justify-between items-center">
                    <a class="logo-wrapper col-start-1 block pointer-events-auto" href="<?php echo home_url()?>">
                            <img src="<?php echo $logo?>" alt="Logo" width="140" height="32" class="block logo-img" />
                        </a>
                        <button id="mobile-menu-toggle" class="p-1 bg-black flex flex-col items-center text-center border border-solid border-transparent" aria-label="Mobile Menu">
                            <div class="tag text-gray-dark"></div>
                        </button>
                    </div>
                </div>
                <div class="hidden lg:block fixed md:top-2 md:left-2 top-[16px] left-[16px] z-50 pointer-events-none w-full">
                    <div class="grid grid-cols-12 header-grid">
                        <a class="logo-wrapper col-start-1 block pointer-events-auto" href="<?php echo home_url()?>">
                            <img src="<?php echo $logo?>" alt="Logo" width="140" height="32" class="block logo-img" />
                        </a>
                        <div class="col-span-6 col-start-5 xl:col-span-5 xl:col-start-4" style="opacity: 1; transform: translateY(0%) translateZ(0px);">
                            <div class="text-black pointer-events-auto px-2 w-fit -mx-3 border border-solid border-gray-neutral !border-transparent">
                                <?php
                                    wp_nav_menu(
                                        [
                                            'theme_location' => 'awe-header-menu',
                                            'menu_class'     => 'main-menu h-[48px] flex justify-start gap-3 2xl:gap-4 font-mono text-mono-12',
                                            'container'      => false,
                                            'walker'         => new CustomPrimaryMenuWalker()
                                        ]
                                    );
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu (Ẩn ban đầu) -->
                <div id="mobile-menu" class="lg:hidden fixed top-[80px] left-0 right-0 bg-white z-40 hidden">
                    <?php
                        wp_nav_menu([
                            'theme_location' => 'awe-header-menu',
                            'menu_class'     => 'mobile-main-menu flex flex-col font-mono text-mono-12',
                            'container'      => false,
                            'walker'         => new CustomPrimaryMenuWalker()
                        ]);
                    ?>
                </div>
            </header>
            <div style="opacity: 1;">
                <div style="opacity: 1;">
                        