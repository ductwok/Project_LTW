<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E Learning</title>

    <!-- google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- font awesome  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/js/all.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
</head>
<body>
    <!-- 
    header
    -->
    <header class="header">
        <div class="header1">
            <a href="#" class="logo"><i class="fas fa-book"></i> EASY LEARN</a>

            <form action="" class="search-form">
                <input type="search" name="" placeholder="Search here..." id="search-box">
                <label for="search-box" class="search fas fa-search"></label>
            </form>

            <div class="icons">
                <div id="search-btn" class="search fas fa-search"></div>
                <a href="#" class="shopping fas fa-shopping-cart"></a>
                <a href="login"><i class="user fas fa-user"></i></a>
            </div>
        </div>

        <div class="header2">
            <nav class="navbar">
                <a href="#home">Home</a>
                <a href="#about">About</a>
                <a href="#courses">Courses</a>
                <a href="#teachers">Teachers</a>
                <a href="#contact">Contact</a>
            </nav>
        </div>
    </header>



    <!--
    login form previous version
    -->
    <!-- <div class="login">
        <form action="">
            <h3>Login</h3>
            <input type="email" placeholder="username" class="box" name="">
            <input type="password" placeholder="password" class="box" name="">
            <p>Forget password? <a href="#">click here</a></p>
            <p>don't have account? <a href="#">register now</a></p>
            <input type="submit" class="btn" value="login" name="">
            <i class="fa-solid fa-xmark"></i>
        </form>
    </div> -->


    <!--
    Login form new version
    -->
    <div class="login-form">
        <div id="close-btn" class="fas fa-times"></div>

        <form action="">
            <h3>Sign In</h3>
            <span>Username</span>
            <input type="email" class="box" placeholder="Enter your email...">
            <span>Password</span>
            <input type="password" class="box" placeholder="Enter your password...">
            <div class="checkbox">
                <input type="checkbox" id="remember-me">
                <label for="remember-me"> Remember me</label>
            </div>
            <input type="submit" value="Sign in" class="btn">
            <p>Forget password? <a href="#">Click here</a></p>
            <p>Don't have an account? <a href="#">Create one</a></p>
        </form>
    </div>



    <!--
    home section
    -->
    <section class="home" id="home">
        <h1>Education From Home</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <a href="#"><button class="btn">Get Started</button></a>
        <div class="shape"></div>
    </section>
    <!--
    about section
    -->
    <section class="about" id="about">
        <div class="image">
            <img src="images/Studying-rafiki.svg">
        </div>

        <div class="content">
            <h3>Why <span>Choose Us</span></h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <a href="#"><button class="btn">Learn More</button></a>
        </div>
    </section>
    <!--
    course section
    -->
    <section class="course" id="courses">
        <h1 class="head">Our Popular <span>Courses<span></h1>

        <div class="box-container">
            <div class="subject box">
                <a href="#"><img src="images/php-course.jpg"></a>
                <h3 class="price">$22</h3>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn PHP From Scratch</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="info">
                        <h3> <i class="icon far fa-clock"></i> 2 hours </h3>
                        <h3> <i class="icon far fa-calendar-alt"></i> 6 months </h3>
                        <h3> <i class="icon fas fa-book"></i> 12 modules </h3>
                    </div>
                </div>
            </div>
        
            <div class="subject box">
                <a href="#"><img src="images/python-course.jpg"></a>
                <h3 class="price">$22</h3>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn Python From Scratch</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="info">
                        <h3> <i class="icon far fa-clock"></i> 2 hours </h3>
                        <h3> <i class="icon far fa-calendar-alt"></i> 6 months </h3>
                        <h3> <i class="icon fas fa-book"></i> 12 modules </h3>
                    </div>
                </div>
            </div>
        
            <div class="subject box">
                <a href="#"><img src="images/html-course.png"></a>
                <h3 class="price">$22</h3>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn HTML From Scratch</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="info">
                        <h3> <i class="icon far fa-clock"></i> 2 hours </h3>
                        <h3> <i class="icon far fa-calendar-alt"></i> 6 months </h3>
                        <h3> <i class="icon fas fa-book"></i> 12 modules </h3>
                    </div>
                </div>
            </div>
        
            <div class="subject box">
                <a href="#"><img src="images/css-course.jpg"></a>
                <h3 class="price">$22</h3>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn CSS From Scratch</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="info">
                        <h3> <i class="icon far fa-clock"></i> 2 hours </h3>
                        <h3> <i class="icon far fa-calendar-alt"></i> 6 months </h3>
                        <h3> <i class="icon fas fa-book"></i> 12 modules </h3>
                    </div>
                </div>
            </div>
        
            <div class="subject box">
                <a href=""><img src="images/c++-course.jpg"></a>
                <h3 class="price">$22</h3>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn C++ From Scratch</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="info">
                        <h3> <i class="icon far fa-clock"></i> 2 hours </h3>
                        <h3> <i class="icon far fa-calendar-alt"></i> 6 months </h3>
                        <h3> <i class="icon fas fa-book"></i> 12 modules </h3>
                    </div>
                </div>
            </div>
        
            <div class="subject box">
                <a href="#"><img src="images/flutter-course.png"></a>
                <h3 class="price">$22</h3>
                <div class="content">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half"></i>
                    </div>
                    <a href="#" class="title">Learn Flutter From Scratch</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    <div class="info">
                        <h3> <i class="icon far fa-clock"></i> 2 hours </h3>
                        <h3> <i class="icon far fa-calendar-alt"></i> 6 months </h3>
                        <h3> <i class="icon fas fa-book"></i> 12 modules </h3>
                    </div>
                </div>
            </div>
        </div>
        <a href="#"><button class="btn">More Courses</button></a>
    </section>
    <!--
    teacher
    -->
    <section class="teacher" id="teachers">
        <h1 class="head">Our Expert <span>Teachers</span></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        <a href="#"><button class="btn">Learn More</button></a>
    </section>
    <!--
    contact section
    -->
    <section class="contact" id="contact">
        <h1 class="heading"><span>Contact</span> Us</h1>
        <div class="row">
            <form class="contact-box">
                <input type="text" placeholder="Full name" class="box">
                <input type="email" placeholder="Your email" class="box">
                <input type="password" placeholder="Your password" class="box">
                <input type="phonenumber" placeholder="Your phone number" class="box">
                <textarea name="" cols="30" rows="10" class="box address" placeholder="Your address"></textarea>
                <input type="submit" class="btn" value="Send now">
            </form>

            <div class="image">
                <img src="images/speech-bubbles-amico.png">
            </div>
        </div>
    </section>
	<!--
	footer section
	-->
	<div class="footer">
        <div class="box-container">
            <div class="box">
                <h3>Branch Locations</h3>
                <a href="#">Ha Noi</a>
                <a href="#">Sai Gon</a>
                <a href="#">Da Nang</a>
                <a href="#">Da Lat</a>
            </div>

            <div class="box">
                <h3>Quick Links</h3>
                <a href="#">Home</a>
                <a href="#">About</a>
                <a href="#">Courses</a>
                <a href="#">Teachers</a>
                <a href="#">Contact</a>
            </div>

            <div class="box">
                <h3>Contact Info</h3>
                <p><i class="icon fas fa-map-marker-alt"></i>Da Nang, Hai Chau, Xo Viet Nghe Tinh</p>
                <p><i class="icon fas fa-envelope"></i>elearning@gmail.com</p>
                <p><i class="icon fas fa-phone"></i>+8499999999</p>
            </div>
        </div>

        <h1 class="credit">
            Created by <a href="#">E-Learning Designer</a>. All Right Reserved.
        </h1>
	</div>
</body>
</html>