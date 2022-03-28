<html>
    <head>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css"
        />
        <link rel="stylesheet" href="{{ asset('css/styless.css') }}" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container" id="container">
            <div class="form-container sign-in-container">
                <form action="#">
                    <h1>Password Recovery</h1>
                    <div class="social-container">
                        <a href="#" class="social"
                            ><i class="fab fa-facebook-f"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-google-plus-g"></i
                        ></a>
                        <a href="#" class="social"
                            ><i class="fab fa-linkedin-in"></i
                        ></a>
                    </div>
                    <span>
                        Enter your email address and we will send you a link to
                        reset your password.</span
                    >
                    <input type="email" placeholder="Email" />
                    <br />
                    <button>Reset Password</button>
                </form>
            </div>

            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-right">
                        <h1>Welcome Back!</h1>
                        <p>Return to Sign in</p>
                        <button class="ghost" id="signIn"><a class="" href="login">Sign in</a></button>
                        
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
