<?php
/**
 * Responsive columns for second section
 */
?>
<div class="hero-contain">
    <div class="hero-landing">
            <h1>Wickham Media Solutions</h1>
            <div class="animation-flex">
                <h2>Digital Media</h2>
                <h2>Web Development</h2>
                <h2>Podcast Production</h2>
            </div>
            <div class="timeline-draw"></div>
            <div class="free-consult">
                <div>Book a free consultation:</div>
                <div x-data="{ open: false }">
                    <button x-on:click="open = ! open">Book Now</button>
                    <div x-show="open" x-transition>
                        <?php echo do_shortcode("[booking resource_id=1]"); ?>
                    </div>
                </div>
            </div>

    </div>
</div>


<style>

.free-consult {
    padding: 1rem;
    box-shadow: rgba(9, 30, 66, 0.25) 0px 4px 8px -2px, rgba(9, 30, 66, 0.08) 0px 0px 0px 1px;
    text-align: center;
    font-size: 1.2rem;
}

.free-consult button {
    background-color: var(--bg-dark);
    color: var(--font-light);
    border: none;
    padding: 1rem;
    border-radius: 0.5rem;
    font-size: 1.5rem;
    margin: 0.5rem 0;
}

.free-consult button:hover {
    background-color: var(--navy);
    cursor: pointer;
    transition: 0.3s;
}

.hero-contain{
    width: 100%;
    display: flex;
    justify-content: center;
    background-color: #cacaca;
    /*color: var(--font-light);*/
}
    
.hero-landing {
    min-height: 400px;
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


.animation-flex {
    display: flex;
    justify-content: center;
    gap: 1rem;
    align-items: center;
}

.timeline-draw {
    width: 100%;
    border-bottom: 2px solid black;
    position: relative;
    animation: lineDrawToRight 2s, slideDown 2.8s forwards;
}

.free-consult {
    animation: consultFadeIn 2.9s forwards;
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