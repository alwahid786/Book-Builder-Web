@extends('layouts.default')
@section('content')
<div class="main" style="padding-top:30px !important;padding-bottom:30px !important; min-height:100vh;">

    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="container" style="max-width: 700px; width:100%">
            <div class="signup-content d-block">
                <div class="text-center mx-auto">
                    <h2>Reset Password</h2>
                </div>
                <p class="text-center mt-3">Enter your new Password.</p>
                <form action="" class="mt-5" method="post">
                    <div class="form-group w-50 mx-auto">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="New Password" />
                    </div>
                    <div class="form-group w-50 mx-auto">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Confirm New Password" />
                    </div>
                    <div class="form-group form-button text-center">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Reset" />
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
@endsection