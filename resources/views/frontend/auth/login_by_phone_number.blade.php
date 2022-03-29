@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center animated fadeInDown">
    <div class="middle-box-div">

        <h3>{{__('Welcome to Login')}}</h3>


        <p>{{__('Login to see it in action.')}}</p>



        <div class="container">


            <div class="card" id="otp_phone_number_card">


                <div class="alert alert-danger" id="error" style="display: none;"></div>




                <div class="card-body">

                    <form>
                        <label>Phone Number:</label>
                        <input type="text" id="number" class="form-control" placeholder="+123********">
                        <br>
                        <div id="recaptcha-container"></div>
                        <br>
                        <button type="button" class="btn btn-primary block full-width m-b" onclick="phoneSendAuth();">Send
                            OTP</button>
                        
                        <a class="btn btn-sm btn-white btn-block m-b" href="{{ route('login') }}">{{__('Login by Email')}}</a>
                    </form>
                </div>
            </div>


            <div class="card" style="margin-top: 10px" id="otp_varification_card">


                <div class="alert alert-danger" id="error" style="display: none;"></div>


                <div class="alert alert-success" id="sentSuccess" style="display: none;"></div>

                
                <div class="card-body">


                    <form>
                        <label>Verification code:</label>
                        <input type="text" id="verificationCode" class="form-control"
                            placeholder="Enter verification code">
                        <br>
                        <button type="button" class="btn btn-primary block full-width m-b" onclick="codeverify();">Verify
                            code</button>
                        <br>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection