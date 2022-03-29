<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!--App Styles -->
        <link rel="stylesheet" href="{{ asset('public/css/app.css') }}">

        <!-- Dashboard Styles -->
        <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/animate.css')}}" rel="stylesheet">
        <link href="{{asset('public/backend/css/style.css')}}" rel="stylesheet">

        <!--App Scripts -->
        <script src="{{ asset('public/js/app.js') }}" defer></script>

    </head>
    <body class="gray-bg">
        
        @yield('auth_content')


        <!-- Mainly scripts -->
        <script src="{{asset('public/backend/js/jquery-3.1.1.min.js')}}"></script>
        <script src="{{asset('public/backend/js/popper.min.js')}}"></script>
        <script src="{{asset('public/backend/js/bootstrap.js')}}"></script>



        <!--firebase OTP  -->

    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>
	<script>
        var firebaseConfig = {
        apiKey: "AIzaSyAs7QcOEuC9bDg0U8bSPOHQvvtl_ZFTiNE",
        authDomain: "otpsettings-f90a3.firebaseapp.com",
        databaseURL: "https://otpsettings-f90a3.firebaseapp.com",
        projectId: "otpsettings-f90a3",
        storageBucket: "otpsettings-f90a3.appspot.com",
        messagingSenderId: "165444015635",
        appId: "1:165444015635:web:6e7eb140fde86d2ddfd1e6",
        measurementId: "G-T8C49PNQRL"
        };
        
        firebase.initializeApp(firebaseConfig);
    </script>
	

    <script>


       $("#otp_varification_card").hide();
	
        window.onload=function () {

			render();
        };
        
        function render() {
            window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        };
        
        function phoneSendAuth() {
            
            var number = $("#number").val();


			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

			return $.ajax({
				url: "{{ url('login-phone-number-check/') }}" + "/" + number,
				type: 'POST',
				

				success: function (response) {

	
                   if (response.error !== null) {
						$("#error").text(response.error);
						$("#error").show();
				   }

                    phone = response.user['phone']

					sessionStorage.setItem('phone', phone)


					firebase.auth().signInWithPhoneNumber(phone,window.recaptchaVerifier).then(function (confirmationResult) {
                
						window.confirmationResult=confirmationResult;
						coderesult=confirmationResult;
						console.log(coderesult);
				
						$("#sentSuccess").text("Message Sent Successfully.");
						$("#sentSuccess").show();

						$("#otp_varification_card").show();
						$("#otp_phone_number_card").hide();
						
					}).catch(function (error) {
						$("#error").text(error.message);
						$("#error").show();
					});

				}

			});
            
           
        
        };
        
        function codeverify() {
        
            var code = $("#verificationCode").val();
        
            coderesult.confirm(code).then(function (result) {
                var user=result.user;

				console.log(user)
                
                $("#successRegsiter").text("you are register Successfully.");
                $("#successRegsiter").show();

				var  phone =  sessionStorage.getItem('phone', phone)

		        console.log(phone)


				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				return $.ajax({
					url: "{{ url('login-phone-number-create-auth/') }}" + "/" + phone,
					type: 'POST',


					success: function (response) {

						window.location = "{{url('/')}}" + "/" + response.route
						
					}


				}); 
        
            }).catch(function (error) {
                $("#error").text(error.message);
                $("#error").show();
            });
        };


        
    </script>
    </body>
</html>
