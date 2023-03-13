@extends('layouts.default')
@section('content')
<div class="main" style="padding-top:30px !important;padding-bottom:30px !important; min-height:100vh;">

    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="container" style="max-width: 700px; width:100%">
            <div class="signup-content d-block">
                <div class="text-center mx-auto">
                    <h2>Forgot Password</h2>
                </div>
                <p class="text-center mt-3">Enter your email to let us verify that it is really you.</p>
                <form action="{{url('/forget')}}" class="mt-5" method="post" id="forgetForm">
                    @csrf
                    <div class="form-group w-50 mx-auto">
                        <label for="email"><i class="zmdi zmdi-email"></i></label>
                        <input type="email" name="email" id="email" placeholder="Your Email" />
                    </div>
                    <div class="form-group form-button text-center">
                        <input type="submit" name="signup" id="forget" class="form-submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    // Contact Us Form Submission Function
    $("#forgetForm").submit(function(e) {
        e.preventDefault();
        validation = validateForm();
        if (validation) {
            $("#forgetForm")[0].submit();
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
        $("form#forgetForm :input").each(function() {
            let val = $(this).val();
            if (val == '' && $(this).attr('id') !== 'forget') {
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