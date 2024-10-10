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
                                <button :class="consult ? 'blue': ''" x-on:click="consult = ! consult">Book a free consultation</button>
                            </div>         
                            <div class="about-ctn" :class="active ? 'active' : 'hidden'">
                            <div>
                                <i class='bx bx-x-circle close-btn' x-show="active" @click="active = ! active"></i>
                            </div>      
                                <div class="about-ctn-text">
                                    <div :class="active ? 'active' : 'hidden'" class="about-section1">
                                        <p>Eric is a journalist, podcast producer and full stack developer based in Toronto, Canada.</p>   
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section2">
                                        <p>Currently, he is the producer of Tech Won't Save Us and Sources by PressProgress. Eric is</p>
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section3">
                                        <p>also the web developer for Unrigged and the project lead for The Hoser's Grocery Tracker </p>  
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section4">
                                        <p>Project. His written work has been published in Macleans, The Hoser, The Maple and</p>     
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section5">
                                        <p>Spacing Magazine. Eric's current work centers on building news products and infrastructure</p>  
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section6">
                                        <p>for independent Canadian media outlets.</p>  
                                    </div>
                                    <div :class="active ? 'active' : 'hidden'" class="about-section7">
                                        <p>Click on a link below to see some of his work, or book a free consultation at the link above!</p>  
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
                                    <p>Click on a link below to see some of his work, or book a free consultation at the link above!</p>  
                                </div>
                            </div>
                        <i class='bx bx-x-circle close-btn' x-show="consult" @click="consult = ! consult"></i>

                        <div class="consult-div" x-show="consult" x-transition>

                            <?php echo do_shortcode("[booking resource_id=1]"); ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
<script>

    function scrollTo(domElem) {
        const elem = document.querySelector(domElem)
        elem.scrollIntoView()
        elem.click()
    }
    function podProd() {
        const elem = document.querySelector(".wwd-item.pod")
        elem.scrollIntoView()
        elem.click()
    }
    function webDev() {
        const elem = document.querySelector(".wwd-item.web")
        elem.scrollIntoView()
        elem.click()
    }
    function newsProd() {
        const elem = document.querySelector(".wwd-item.news")
        elem.scrollIntoView()
        elem.click()
    }
</script>

<style>

.about-ctn-text-resp {
    display: none;
}

.hero-contain{
    width: 100%;
    display: flex;
    justify-content: center;
    background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url(https://wickhammediasolutions.com/wp-content/uploads/2024/08/computer-4795762_1920.jpg);

    color: var(--font-light);
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