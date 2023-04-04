@extends('layouts.default')
@section('content')
<div class="main" style="padding-top:30px !important;padding-bottom:30px !important; min-height:100vh;">

    <!-- Sing in  Form -->
    <section class="sign-in">
        <div class="container">
            <div class="signin-content">
                <div class="signin-image">
                    <figure><img src="{{asset('assets/images/signin-image.jpg')}}" alt="sing up image"></figure>
                </div>

                <div class="signin-form" style="margin-top:auto;margin-bottom:auto;">
                    <h2 class="form-title">Sign In</h2>
                    <form method="POST" class="register-form" action="{{route('signin')}}" id="loginForm">
                        @csrf
                        <div class="form-group">
                            <label for="your_name"><i class="fas fa-user"></i></label>
                            <input type="text" name="email" id="your_name" placeholder="Email" />
                        </div>
                        <div class="form-group">
                            <label for="your_pass"><i class="fas fa-lock"></i></label>
                            <input type="password" name="password" id="your_pass" placeholder="Password" />
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <!-- <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" /> -->
                            <a href="{{url('/forgot-password')}}">
                                <span>Forgot Password ?</span>
                            </a>
                        </div>
                        <div class="form-group form-button">
                            <input type="submit" name="signin" id="login" class="form-submit" value="Log in" />
                        </div>
                    </form>
                    <a href="{{url('/sign-up')}}" class="signup-image-link pt-5">
                        <p>Create an account</p>
                    </a>

                    <!-- <div class="social-login">
                        <span class="social-label">Or login with</span>
                        <ul class="socials">
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                            <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>
    </section>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    // Contact Us Form Submission Function
    $("#loginForm").submit(function(e) {
        e.preventDefault();
        validation = validateForm();
        if (validation) {
            $("#loginForm")[0].submit();
        } else {
            swal({
                title: "Some Fields Missing",
                text: "Please fill all fields.",
                icon: "error",
            });
        }
    })

    function validateForm() {
        let errorCount = 0;
        $("form#loginForm :input").each(function() {
            let val = $(this).val();
            if (val == '' && $(this).attr('id') !== 'login') {
                errorCount++
                $(this).css('border-bottom', '1px solid red');
            } else {
                $(this).css('border-bottom', '1px solid #999');
            }
        });
        if (errorCount > 0) {
            return false;
        }
        return true;
    }
</script>
@endsection