    <div class="wwd-category">
        <h3>What we do</h3>
            <!-- anchor links on the top to this part of the website
                    then build -->


           <div x-data="{ pod: false, webdev:false, newsprod: false }">
                <div class="wwd-items">
                    <div :class="pod ? 'active' : ''" class="wwd-item pod" @click="pod = ! pod">
                        <i class='bx bx-podcast'></i>
                        <h4>Podcasts</h4>

                    </div>
                    <div :class="webdev ? 'active' : ''" class="wwd-item web" @click="webdev = ! webdev">
                        <i class='bx bx-code-alt' ></i>                    
                        <h4>Web Development</h4>


                    </div>
                    <div :class="newsprod ? 'active' : ''" class="wwd-item news" @click="newsprod = ! newsprod">
                        <i class='bx bx-news'></i>
                        <h4>News Products</h4>


                    </div>
                </div>
                <div class="wwd-res">
                    <div x-show="pod" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="pod = ! pod"></i>
                        <div class="wwd-res-item">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/podcast-8687965_1280.jpg" alt="Podcast">
                            <div class="explainer">
                                <h5>Podcasts</h5>
                                <div>
                                    Reach new audiences with rich audio storytelling or impactful, insightful conversations with our podcast production team. 
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/podcast-production/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="webdev" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="webdev = ! webdev"></i>
                        <div class="wwd-res-item">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/programming-1873854_1280.png" alt="Web Development">
                            <div class="explainer">
                                <h5>Web Development</h5>
                                <div>
                                    Build a website to raise awareness, convert your audience into customers, or provide a new service with our web development team
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/web-development/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div x-show="newsprod" x-transition>
                        <i class='bx bx-x-circle close-btn' @click="newsprod = ! newsprod"></i>
                        <div class="wwd-res-item">
                            <img src="https://wickhammediasolutions.com/wp-content/uploads/2024/08/coffee-1869772_1280.jpg" alt="Coffee">
                            <div class="explainer">
                                <h5>News Products</h5>
                                <div>
                                    Create a new piece of infrastructure for your news team that will make you stick out from the crowd and keep your audience coming back to your site. 
                                </div>
                                <div>
                                    <a class="aboutBtn" href="https://wickhammediasolutions.com/news-products/">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

           </div>
        </div>