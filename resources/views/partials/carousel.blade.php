 <style rel="stylesheet">
        .navbar {
            position: absolute;
    top: 0;
    left: 0;
    z-index: 999;
    width: 100%;
    background: rgba(0, 222, 203, 0.28) !important;
        }
        
        .top-nav-collapse {
            background-color: #4285F4;
        }
        
        footer.page-footer {
            background-color: #4285F4;
        }
        
        @media only screen and (max-width: 768px) {
            .navbar {
                background-color: #4285F4;
            }
        }
        /* Carousel*/
        
        .carousel {
            height: 50vh;
        }
        
        @media (max-width: 776px) {
            .carousel {
                height: 100%;
            }
        }
        
        .carousel-item,
        .active {
            height: 100%;
        }
        
        .carousel-inner {
            height: 100%;
        }
        
        .carousel-item:nth-child(1) {
            background-color: #2c3e50;
            background-repeat: no-repeat;
            background-size: cover;
            opacity: 0.4;
        }
        
        .carousel-item:nth-child(2) {
            background-color: #34495e;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .carousel-item:nth-child(3) {
            background-color: #2c3e50;
            background-repeat: no-repeat;
            background-size: cover;
        }
        /*Caption*/
        
        .flex-center {
            color: #fff;
        }
    </style>


    <!--Carousel Wrapper-->
    <div id="carousel-example-2" class="carousel slide carousel-fade no-flex" data-ride="carousel">
        <!--Indicators-->
        <ol class="carousel-indicators">
            <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-2" data-slide-to="1"></li>
            <li data-target="#carousel-example-2" data-slide-to="2"></li>
        </ol>
        <!--/.Indicators-->
        <!--Slides-->
        <div class="carousel-inner" role="listbox">
            <!--First slide-->
            <div class="carousel-item active">
                <!--Caption-->
                <div class="flex-center animated fadeInDown">
                    <ul>
                        <li>
                            <h1 class="h1-responsive">Gym with Friends</h1></li>
                        <li>
                            <p>a gym app to challenge your friends</p>
                        </li>
                        <li>
                            <a target="_blank" href="#" class="btn btn-primary btn-lg">Sign up!</a>
                            <a target="_blank" href="#" class="btn btn-default btn-lg">Learn more</a>
                        </li>
                    </ul>
                </div>
                <!--Caption-->
            </div>
            <!--/.First slide-->
            
            <!--Second slide -->
            <div class="carousel-item">
                <!--Caption-->
                <div class="flex-center animated fadeInDown">
                    <ul>
                        <li>
                            <h1 class="h1-responsive">Easily Create Challenges</h1>
                        </li>
                        <li>
                            <p>And all of this and it's totally FREE!</p>
                        </li>
                        <li>
                            <a target="_blank" href="#" class="btn btn-primary btn-lg">Get Started Today!</a>
                        </li>
                    </ul>
                </div>
                <!--Caption-->
            </div>
            <!--/.Second slide -->
            
            <!--Third slide-->
            <div class="carousel-item">
                <!--Caption-->
                <div class="flex-center animated fadeInDown">
                    <ul>
                        <li>
                            <h1 class="h1-responsive">Visit our support forum</h1></li>
                        <li>
                            <p>Our community can help you with any question</p>
                        </li>
                        <li>
                            <a target="_blank" href="#" class="btn btn-default btn-lg">Support forum</a>
                        </li>
                    </ul>
                </div>
                <!--Caption-->
            </div>
            <!--/.Third slide-->
            
        </div>
        <!--/.Slides-->
        <!--Controls-->
        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        <!--/.Controls-->
    </div>
