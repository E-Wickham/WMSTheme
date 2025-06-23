<?php
/**
 * Responsive columns for second section
 */
?>
<div class="hero-contain">
    <div class="hero-grid">
        <div class="hero-img">
                <img class="hero-img-src" src="https://wickhammediasolutions.com/wp-content/uploads/2024/10/eric2022-2.png" alt="Eric headshot">
        </div>
        <div class="hero-landing">
                <h1>Eric Wickham</h1>
                    <div class="animation-flex">
                        <h2 @click=scrollTo('.wwd-item.jrnl')>Journalism</h2>
                        <div>/</div>
                        <h2 @click=scrollTo('.wwd-item.pod')>Podcasts</h2>
                        <div>/</div>
                        <h2 @click=scrollTo('.wwd-item.web')>Web Development</h2>
                        <div>/</div>
                        <h2 @click=scrollTo('.wwd-item.news')>News Products</h2>
                    </div>
                <div class="timeline-draw"></div>
                <div class="free-consult">
                    <div class="aboutLogin" x-data="{ active: false, consult: false }">     
                            <div class="button-flex">
                                <div :class="active ? 'blue': ''" class="loginBtn hidden" @click="active = !active" > About </div>
                                <div class="loginBtn hidden" > Recent Work </div>
                                <div class="loginBtn hidden" > 
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bluesky" viewBox="0 0 16 16">
                                        <path d="M3.468 1.948C5.303 3.325 7.276 6.118 8 7.616c.725-1.498 2.698-4.29 4.532-5.668C13.855.955 16 .186 16 2.632c0 .489-.28 4.105-.444 4.692-.572 2.04-2.653 2.561-4.504 2.246 3.236.551 4.06 2.375 2.281 4.2-3.376 3.464-4.852-.87-5.23-1.98-.07-.204-.103-.3-.103-.218 0-.081-.033.014-.102.218-.379 1.11-1.855 5.444-5.231 1.98-1.778-1.825-.955-3.65 2.28-4.2-1.85.315-3.932-.205-4.503-2.246C.28 6.737 0 3.12 0 2.632 0 .186 2.145.955 3.468 1.948"/>
                                    </svg> 
                                     BlueSky
                                </div>
                                <div class="loginBtn hidden" > 
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                                    <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                                </svg> 
                                TikTok
                                </div>
                            </div>         
                            <div class="about-ctn" :class="active ? 'active' : 'hidden'">
                            <div>
                                <i class='bx bx-x-circle close-btn' x-show="active" @click="active = ! active"></i>
                            </div>      
                                <div class="about-ctn-text">
                                    <div :class="active ? 'active' : 'hidden'" class="about-section1">
                                        <p>Hello, My name is Eric Wickham. </p>   
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section2">
                                        <p>I am a journalist, podcast producer and full stack developer based in Toronto, Canada.</p>
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section3">
                                        <p>I'm also the Ontario reporter for PressProgress and the web developer for Unrigged.</p>  
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section4">
                                        <p>My work has been published in Macleans, CBC, Spacing, The Hoser, and The Maple</p>     
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section5">
                                        <p>I enjoy working on building news products and infrastructure for independent</p>  
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section6">
                                        <p>Canadian media outlets. And I love writing a good story.</p>  
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section7">
                                        <p>Click on a link below to see some of my work!</p>  
                                    </div>
                                </div>
                                <div class="about-ctn-text-resp" x-show="active">
                                    <p>Eric is a journalist, podcast producer and full stack developer based in Toronto, Canada.</p>   
                                    <p>
                                        Currently, he is the producer of Tech Won't Save Us and Sources by PressProgress. Eric is
                                        also the web developer for Unrigged and the project lead for The Hoser's Grocery Tracker  
                                        Project. His written work has been published in Macleans, The Hoser, The Maple and   
                                        Spacing Magazine. Eric's current work centers on building news products and infrastructure for independent Canadian media outlets.
                                    </p>  
                                    <p>Click on a link below to see some of his work</p>  
                                </div>
                            </div>
                        <i class='bx bx-x-circle close-btn' x-show="consult" @click="consult = ! consult"></i>
                    </div>
                </div>
        </div>
    </div>
</div>
<?php include('we-do.php');?>   
<div class="floating_thumb-ctn">
    <?php
    $args = array(
        'post_type'      => 'publications',
        'posts_per_page' => 10,
    );
    $loop = new WP_Query($args);
    $count = 1;
    while ( $loop->have_posts() ) {
        $loop->the_post();
        ?>
            <?php
                
                    if(has_post_thumbnail()){
                        ?>
                        <div class="floating_thumb">
                            <?
                            the_post_thumbnail();
                            ?>
                        </div>
                        <?
                    }
            ?>
        <?php
    }?>
</div>



<script>

    function scrollTo(domElem) {
        const elem = document.querySelector(domElem)
        elem.scrollIntoView()
        elem.click()
    }

</script>

<style>

.about-ctn-text-resp {
    display: none;
}



.hero-img {
    width: 200px;
	height: 200px;
	transform: rotate(45deg);
	outline: 1px solid #cacaca;
	position: relative;
	overflow: hidden;
    top: 100px;
    background-color: #ecf2fe;
    left: 2.5rem;
    animation: heroLoadImg 1.5s;
}

.hero-grid {
    display: grid;
    grid-template-columns: minmax(100px, 300px) minmax(668px, 800px);
    grid-gap: 1rem;
}
    
.hero-img-src {
    height: 300px;
    position: relative;
    bottom: 19px;
    right: 43px;
    transform: rotate(-45deg);
}

.hero-landing {
    min-height: 375px;
    padding: 1rem 0;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    justify-content: center;
}
.hero-landing h1 {
    font-size: 4rem;
    padding-right:0.5rem;
    margin:0;
    overflow: hidden; /* Ensures the content is not revealed until the animation */
    border-right: 8px solid #dadada; /* The typewriter cursor */
    white-space: nowrap; /* Keeps the content on a single line */
    /*margin: 0 auto; /* Gives that scrolling effect as the typing happens */
    letter-spacing: .015em; /* Adjust as needed */
    animation: 
        typing 1.2s steps(20, end),
        blink-caret 1s step-end infinite;
    margin-top: 2rem;
}

.hero-landing h2:nth-of-type(1) {
    animation: fadeIn1 1.4s forwards;
    margin-left: 0.125rem;
}
.hero-landing h2:nth-of-type(2) {
    animation: fadeIn1 1.65s forwards;
}
.hero-landing h2:nth-of-type(3) {
    animation: fadeIn1 1.85s, forwards;
}
.hero-landing h2:nth-of-type(4) {
    animation: fadeIn1 2.05s, forwards;
}


.animation-flex h2:hover {
    text-decoration: underline;
    cursor: pointer;
}

.animation-flex {
    display: flex;
    justify-content: flex-start;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
    text-wrap: nowrap;
}

.animation-flex h2 {
    margin: 0.5rem;
}

.timeline-draw {
    width: 100%;
    border-bottom: 2px solid #fff;
    position: relative;
    animation: lineDrawToRight 2s, slideDown 2.8s forwards;
}


@media only screen and (max-width: 1200px) {
    .hero-img {
        display: none;
    }
    .hero-grid {
        display: flex;
    }
    .hero-landing {
        align-items: center;
    }    
    .button-flex {
        justify-content: center;
    }

}
@media only screen and (max-width: 768px) {
    .hero-landing h1 {
        font-size: 2rem;
        animation: fadeIn 0.5s;
        border-right: none;
    }
    .animation-flex {
        display: none;
    }
    .about-ctn-text {
        display: none;
    }

    .about-ctn-text-resp {
        display: block;
        padding: 0 1rem;
    }
}


/* The typing effect */
@keyframes typing {
    from { width: 0; visibility: visible;}
    to { width: 425px; visibility: visible;}
  }
  
/* The typewriter cursor effect */
  @keyframes blink-caret {
    from, to { border-color: transparent; }
    50% { border-color: #dadada; }
  }

  @keyframes fadeIn {
    from, to {
        opacity: 0;
    }
    50% {
        opacity: 0;
        transform: translateY(10px);
    }
    100% { 
        opacity: 1;
        transform: translateY(0px);
    }
  }
  @keyframes fadeIn1 {
    from, to {
        opacity: 0;
    }
    70% {
        opacity: 0;
        transform: translateY(10px);
    }
    100% { 
        opacity: 1;
        transform: translateY(0px);
    }
  }
 
  @keyframes lineDrawToRight {
    0% {
        width: 0;
    }
    50%{
        width:0;
    }
    100% {
        width: 100%;
    }
}
  @keyframes slideDown {
    0% {
        transform: translateY(0);
        opacity: 1;

    }
    70%{
        transform: translateY(0);
        opacity: 1;

    }
    90%{
        transform: translateY(160px);
        opacity: 1;

    }
    100% {
        transform: translateY(160px);
        opacity: 0;

    }
}


  @keyframes heroLoadImg {
    0% {
        opacity: 0;
        transform: rotate(45deg);
    }
    100% { 
        opacity: 1;
        transform: rotate(45deg);
    }
  }
  @keyframes imageFadeIn {
    from, to {
        opacity: 0;
    }
    100% { 
        opacity: 1;
        transform: translateY(0px);
    }
  }
  @keyframes consultFadeIn {
    0% {
        opacity: 0;
    }
    70%{
        opacity: 0;
    }
    100% { 
        opacity: 1;
    }
  }
</style>