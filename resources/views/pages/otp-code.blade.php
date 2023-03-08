@extends('layouts.default')
@section('content')
<style>
    form input {
        display: inline-block;
        text-align: center;
        width: 50px;
        /*height: 50px;
        color: black; */
    }
</style>
<div class="main" style="padding-top:30px !important;padding-bottom:30px !important; min-height:100vh;">

    <!-- Sign up form -->
    <section class="signup m-0">
        <div class="container" style="max-width: 700px; width:100%">
            <div class="signup-content d-block">
                <div class="text-center mx-auto">
                    <h2>Verify OTP Code</h2>
                </div>
                <p class="text-center mt-3">Enter OTP Code you received in your registered email.</p>
                <form action="" class="mt-5 mx-auto" method="post">
                    <div class="w-50 mx-auto d-flex justify-content-center align-items-center">
                        <input class="otp p-0 mx-1 text-center" type="text" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1>
                        <input class="otp p-0 mx-1 text-center" type="text" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1>
                        <input class="otp p-0 mx-1 text-center" type="text" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1>
                        <input class="otp p-0 mx-1 text-center" type="text" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1>
                    </div>
                    <div class="form-group form-button text-center">
                        <input type="submit" name="signup" id="signup" class="form-submit" value="Submit" />
                    </div>
                </form>
            </div>
        </div>
    </section>

</div>
<script>
    let digitValidate = function(ele) {
        console.log(ele.value);
        ele.value = ele.value.replace(/[^0-9]/g, '');
    }

    let tabChange = function(val) {
        let ele = document.querySelectorAll('input');
        if (ele[val - 1].value != '') {
            ele[val].focus()
        } else if (ele[val - 1].value == '') {
            ele[val - 2].focus()
        }
    }
</script>
@endsection