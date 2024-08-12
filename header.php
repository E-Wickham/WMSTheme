<?php
/**
 * Contains the header.
 */

 $bloginfo = get_bloginfo();
 $categories = get_categories();
?>
<!doctype html>
<html <?php language_attributes();?>>
    <head>
        <meta charset="<?php bloginfo( 'charset') ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo $bloginfo ?></title>
        <link rel="stylesheet" href="style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap" rel="stylesheet">        
        <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
        <?php wp_head(); ?>
        <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    </head>
    <body <?php body_class();?> x-data>
    <nav>
        <div class="navFlex" >
            <a href="#">
                <div class="title">
                    <!--replace this with new logo-->                   
                </div>
            </a>
            <div x-data="{ open: false }" class="links">
                <button @click="open = !open" class="menu-button">
                    <i x-show="open" class='bx bxs-x-square'></i>
                    <i x-show="!open" class='bx bx-menu'></i>
                </button>
                <div x-show="open" class="menuList" x-transition>
                    <a href="https://wickhammediasolutions.com/wpbc-booking/"><div class="link-reg">Booking Calendar</div></a>
                    <a href="https://wickhammediasolutions.com/category/portfolio"><div class="link-reg">Portfolio</div></a>
                </div>
                <div x-show="!open" class="menuList-reg" x-transition>
                    <a href="https://wickhammediasolutions.com/wpbc-booking/"><div class="link-reg">Booking Calendar</div></a>
                    <a href="https://wickhammediasolutions.com/category/portfolio"><div class="link-reg">Portfolio</div></a>
                </div>
            </div>
        </div>  
    </nav>


    <style>


    </style>
