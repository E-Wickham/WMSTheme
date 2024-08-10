<?php
/**
 * Responsive columns for second section
 */
?>
<div class="hero-contain">
    <div class="hero-landing">
            <h1>Wickham Media Solutions</h1>
            <div class="animation-flex">
                <h2 @click=podProd>Podcast Production</h2>
                <div>/</div>
                <h2 @click=webDev>Web Development</h2>
                <div>/</div>
                <h2 @click=newsProd>News Products</h2>
            </div>
            <div class="timeline-draw"></div>
            <div class="free-consult">
                <div>Book a free consultation:</div>
                <div x-data="{ open: false }">
                    <button x-on:click="open = ! open" x-show="!open">Book Now</button>
                    <div x-show="open" x-transition>
                        <?php echo do_shortcode("[booking resource_id=1]"); ?>
                    </div>
                </div>
            </div>

    </div>
</div>
<script>
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


.hero-contain{
    width: 100%;
    display: flex;
    justify-content: center;
    background: linear-gradient( rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5) ),url(wp-content/uploads/2024/08/computer-4795762_1920.jpg);

    color: var(--font-light);
}
    
.hero-landing {
    min-height: 375px;
    padding: 1rem 0;
    display: flex;
    flex-direction: column;
    align-items: center;
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
    
}

.hero-landing h2:nth-of-type(1) {
    animation: fadeIn1 1.4s forwards;
}
.hero-landing h2:nth-of-type(2) {
    animation: fadeIn1 1.65s forwards;

}
.hero-landing h2:nth-of-type(3) {
    animation: fadeIn1 1.85s, forwards;
}


.animation-flex h2:hover {
    text-decoration: underline;
    cursor: pointer;
}

.animation-flex {
    display: flex;
    justify-content: center;
    gap: 1rem;
    align-items: center;
}

.timeline-draw {
    width: 100%;
    border-bottom: 2px solid #fff;
    position: relative;
    animation: lineDrawToRight 2s, slideDown 2.8s forwards;
}

.free-consult {
    animation: consultFadeIn 2.9s forwards;
    color: var(--font-dark);
}

@media only screen and (max-width: 768px) {
    .hero-landing h1 {
        font-size: 1.5rem;
        animation: fadeIn 0.5s;
        border-right: none;
        margin: 0.95rem 1rem 2.175rem 2rem;      
    }
    .animation-flex {
        display: none;
    }
}


/* The typing effect */
@keyframes typing {
    from { width: 0; visibility: visible;}
    to { width: 100%; visibility: visible;}
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
        transform: translateY(150px);
        opacity: 1;

    }
    100% {
        transform: translateY(150px);
        opacity: 0;

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