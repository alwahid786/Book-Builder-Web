@extends('layouts.default')
@section('content')
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #fff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "+";
        /* font-family: 'FontAwesome'; */
        color: #757575;
        position: absolute;
        top: -8px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
        font-size: 30px;
    }

    .avatar-upload .avatar-preview {
        width: 192px;
        height: 192px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }

    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
<div class="main" style="padding-top:30px !important;padding-bottom:30px !important;">

    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="container">
            <div class="signup-content">
                <div class="signup-form">
                    <h2 class="form-title">Sign up</h2>
                    <form method="POST" class="register-form" id="registerForm" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i></label>
                            <input type="text" name="f_name" id="fname" placeholder="First Name" />
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fas fa-user"></i></label>
                            <input type="text" name="l_name" id="lname" placeholder="Last Name" />
                        </div>
                        <div class="form-group">
                            <label for="email"><i class="fas fa-envelope"></i></label>
                            <input type="email" name="email" id="email" placeholder="Your Email" />
                        </div>
                        <div class="form-group">
                            <label for="name"><i class="fas fa-phone"></i></label>
                            <input type="text" name="phone" id="phone" placeholder="Phone" />
                        </div>
                        <div class="form-group">
                            <label for="pass"><i class="fas fa-lock"></i></label>
                            <input type="password" name="password" id="pass" placeholder="Password" />
                        </div>
                        <div class="form-group">
                            <label for="re-pass"><i class="fas fa-lock"></i></label>
                            <input type="password" name="password_confirmation" id="re_pass" placeholder="Repeat your password" />
                        </div>
                        <!-- <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"><i class="fa fa-cloud-upload" aria-hidden="true"></i></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url(https://png.pngtree.com/png-vector/20190508/ourmid/pngtree-upload-cloud-vector-icon-png-image_1027251.jpg);">
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="form-group">
                            <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                            <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in <a href="#" class="term-service">Terms of service</a></label>
                        </div> -->
                        <div class="form-group form-button">
                            <input type="submit" name="signup" id="signup" class="form-submit" value="Register" />
                        </div>
                    </form>
                    <a href="{{url('/')}}" class="signup-image-link pt-5">I am already member</a>
                </div>

                <div class="signup-image">
                    <figure><img src="{{asset('assets/images/signup-image.jpg')}}" alt="sing up image"></figure>
                </div>
            </div>
        </div>
    </section>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });


    // Contact Us Form Submission Function
    const form = document.getElementById('registerForm');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    let url = `{{url('register')}}`;
    form.addEventListener('submit', (event) => {
        event.preventDefault();
        validation = validateForm();
        if (validation) {
            const formData = new FormData(form);
            formData.append('_token', csrfToken);
            const xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.onreadystatechange = function() {
                if (this.readyState === XMLHttpRequest.DONE && this.status === 200) {
                    var response = JSON.parse(this.responseText);

                    if (response.success == true) {
                        window.location.href = `{{url('/release')}}`;
                    } else {
                        message = response.message[0][0];
                        swal({
                            title: "Error",
                            text: message,
                            icon: "error",
                        });
                    }
                }
            };
            xhr.send(formData);
        } else {
            swal({
                title: "Some Fields Missing",
                text: "Please fill all fields.",
                icon: "error",
            });
        }
    });

    function validateForm() {
        let errorCount = 0;
        $("form#registerForm :input").each(function() {
            let val = $(this).val();
            if (val == '' && $(this).attr('id') !== 'signup') {
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