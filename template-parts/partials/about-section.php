        <!--ABOUT -->
        <div class="about">
            <div class="aboutFlex">
                <div class="aboutImg"></div>
                <div class="aboutLogin" x-data="{ active: false }">
                    <a href="#">
                        <h3>About Us</h3>
                        <div class="loginBtn hidden" @click="active = !active"> About 

                        
                        </div>
                        <div class="about-ctn" :class="active ? 'active' : 'hidden'">
                            <div>
                                <div :class="active ? 'active' : 'hidden'" class="about-section1">
                                    <p>Wickham Media Solutions is a web development and podcast production agency.</p>   
                                </div>
                                <div :class="active ? 'active' : 'hidden'" class="about-section2">
                                    <p>Our work has been featured in internationally-recognized podcasts, software companies and national news organizations. </p>
                                </div>
                                <div :class="active ? 'active' : 'hidden'" class="about-section3">
                                    <p>Whether you're interested in building new audiences with high-quality audio content, or if you're trying to build a website  </p>  
                                </div>
                                <div :class="active ? 'active' : 'hidden'" class="about-section4">
                                    <p>that can convert visitors into customers, you're in the right place.    </p>     
                                </div>
                                <div :class="active ? 'active' : 'hidden'" class="about-section5">
                                    <p>Click on a link below to get started, or book a free consultation at the link above! </p>  
                                </div>
                            </div>

                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>   