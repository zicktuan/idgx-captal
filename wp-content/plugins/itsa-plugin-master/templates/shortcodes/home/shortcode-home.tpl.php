<div class="relative min-h-hero">
        <div class="container">
            <div class="center-point">
                <div class="x-container">
                    <div class="x-arm x-arm-1"></div>
                    <div class="x-arm x-arm-2"></div>
                </div>
            </div>

            <!-- Các khối nội dung -->
             <?php if(!empty($listItems[0])): $i = 0;?>
             <?php foreach($listItems as $item): $i++?>
                <div>
                    <div class="content content-<?php echo $i?>">
                        <div class="content-inner">
                            <div class="flex items-center gap-1">
                                <a class="button button-tag" href="<?php echo !empty($item['url']) ? $item['url'] : '#' ?>">
                                    <?php echo !empty($item['title']) ? $item['title'] : '' ?>
                                </a>
                                <svg width="12" height="6" viewBox="0 0 12 6" class="block rotate-180">
                                    <path d="M0 3L5 5.88675L5 0.113248L0 3ZM12 2.5L4.5 2.5L4.5 3.5L12 3.5L12 2.5Z" fill="currentColor"></path>
                                </svg>
                            </div>
                            <div class="homepage-tag-description">
                                <p><?php echo !empty($item['desc']) ? $item['desc'] : '' ?></p>
                            </div>
                        </div>
                    </div>
                </div>
             <?php endforeach?>
             <?php endif?>
        </div>
    </div>
    <style>
       

        html, body {
            height: 100vh;
            overflow: auto;
            /* background: linear-gradient(135deg, #f5e6e6 0%, #e6e9f0 50%, #d7e1ec 100%); */
            /* background: linear-gradient(
                135deg,
                #85d2c4 0%,   
                #6b81e0 40%, 
                #c176f4 75%,  
                #3e0055 100% 
            );
            background-blend-mode: overlay; */
            font-family: Arial, sans-serif;
        }
        

        /* Thanh điều hướng (Navbar) */
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #000;
        }

        .nav-links {
            display: flex;
            gap: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #000;
            font-size: 16px;
            font-weight: 500;
        }

        .nav-links a:hover {
            color: #a100ff;
        }

        /* Main content */
        .min-h-hero {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            padding: 80px 20px;
        }

        /* Container chính */
        .container {
            position: relative;
            width: 60vw;
            max-width: 500px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Thay hình tròn bằng đám mây plasma */
        .center-point {
            position: relative;
            width: 100%;
            padding-top: 100%; /* Tỷ lệ 1:1 */
            background: none;
        }

        .x-arm {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 140%;
            height: 4px;
            background: linear-gradient(
                to right,
                transparent,
                #ff00ff,
                #00f0ff,
                transparent
            );
            border-radius: 2px;
            transform-origin: center;
            animation: colorFlow 2.5s linear infinite;
            transform: translate(-50%, -50%) rotate(45deg);
            
        }

        .x-arm::before {
            content: "";
            position: absolute;
            top: 0;
            left: -20%;
            width: 20%;
            height: 100%;
            background: linear-gradient(
                to right,
                transparent,
                rgba(255, 255, 255, 0.9),
                transparent
            );
            animation: laserGlint 2s linear infinite;
            pointer-events: none;
        }

        @keyframes laserGlint {
            0% {
                left: -20%;
                opacity: 0;
            }
            30% {
                opacity: 1;
            }
            50% {
                left: 100%;
                opacity: 0;
            }
            100% {
                left: 100%;
                opacity: 0;
            }
        }

        @keyframes colorFlow {
            0% {
                background-position: 0% 50%;
            }
            100% {
                background-position: 100% 50%;
            }
        }

        .x-arm-1 {
            transform: translate(-50%, -50%) rotate(45deg);
        }

        .x-arm-2 {
            transform: translate(-50%, -50%) rotate(-45deg);
        }

        /* Các khối nội dung */
        .content {
            position: absolute;
            width: 60vw;
            max-width: 340px;
        }

        .content-inner {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .button-tag {
            padding: 5px 10px;
            background-color: #ccc;
            color: #000;
            text-transform: uppercase;
            font-size: 12px;
            font-weight: bold;
            border-radius: 4px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .button-tag svg {
            width: 12px;
            height: 6px;
        }

        .homepage-tag-description {
            font-size: 14px;
            color: #000;
            line-height: 1.5;
        }

        .content-1 {
            top: 24%; left: 133%; transform: translate(-50%, -50%);
        }

        .content-2 {
            top: 24%; left: -32%; transform: translate(-50%, -50%);
        }

        .content-3 {
            top: 75%; left: -32%; transform: translate(-50%, -50%);
        }

        .content-4 {
            top: 75%; left: 133%; transform: translate(-50%, -50%);
        }

        /* Responsive Design */
        @media (max-width: 1024px) {
            .container {
                width: 70vw;
                max-width: 400px;
            }

            .content {
                max-width: 200px; /* Giảm kích thước nội dung để vừa màn tablet */
            }

            .content-1 {
                top: 24%; left: 105%; transform: translate(-50%, -50%);
            }

            .content-2 {
                top: 24%; left: -4%; transform: translate(-50%, -50%);
            }

            .content-3 {
                top: 75%; left: -4%; transform: translate(-50%, -50%);
            }

            .content-4 {
                top: 75%; left: 105%; transform: translate(-50%, -50%);
            }

            .navbar {
                padding: 15px 20px;
            }

            .logo {
                font-size: 20px;
            }

            .nav-links {
                gap: 15px;
            }

            .nav-links a {
                font-size: 14px;
            }

            .homepage-tag-description {
                font-size: 12px;
            }
        }

        @media (max-width: 767px) {
            .container {
                width: 80vw;
                max-width: 350px;
            }

            /* Chuyển các khối nội dung thành dạng xếp chồng trên mobile */
            .content {
                position: static;
                width: 100%;
                max-width: 300px;
                margin: 10px 0;
                transform: none !important; /* Bỏ transform để xếp chồng */
            }

            .content-inner {
                align-items: center;
                text-align: center;
            }

        }

        @media (max-width: 480px) {
            .container {
                width: 90vw;
                max-width: 300px;
            }

            .navbar {
                flex-direction: column;
                gap: 10px;
                padding: 10px;
            }

            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
                gap: 10px;
            }

            .content {
                max-width: 250px;
            }

            .button-tag {
                font-size: 10px;
                padding: 4px 8px;
            }

            .homepage-tag-description {
                font-size: 10px;
            }
}
    </style>
<!-- <script>
    function updateLines() {
        const svg = document.getElementById("dynamic-lines");
        svg.innerHTML = ""; // Clear old lines

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

            // Assign data-index for CSS
            link.setAttribute("data-index", index);
        });
    }

    document.querySelectorAll(".point-link").forEach(link => {
        link.addEventListener("mouseenter", () => {
            const index = link.getAttribute("data-index");
            document.body.setAttribute("data-hover-index", index);
        });
        link.addEventListener("mouseleave", () => {
            document.body.removeAttribute("data-hover-index");
        });
    });

    document.addEventListener("DOMContentLoaded", updateLines);
    window.addEventListener("resize", updateLines);
</script> -->