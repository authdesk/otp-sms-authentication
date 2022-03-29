@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>

            <h3>  {{ __('Welcome to Registration') }}</h3>
            <p>{{ __('Create account to see it in action.') }}</p>

            @if ($errors->any())
                <div >
              
                    <div class="font-medium text-red-600">
                        {{ __('Error! Something went wrong.') }}
                    </div>

                    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="m-t" role="form" method="POST" action="{{ route('register') }}">
                @csrf
                

                <div class="form-group">
                                <input id="name" class="form-control" type="text" name="name" placeholder="Name"   autofocus />
                            </div>

							<input type="hidden" name="user_type" value="user">

        

                            <div class="form-group">
                                <input id="phone" class="form-control" type="text" name="phone" placeholder="Phone"  autofocus />
                            </div>



                            <div class="form-group">
                                <input id="email" class="form-control" type="email" name="email" placeholder="Email"  autofocus />
                                
                            </div>



                            <div class="form-group">
                                <input id="password" class="form-control" type="password" name="password" placeholder="Password"  autocomplete="new-password" />
                            </div>

                            <div class="form-group">
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" placeholder="Confirm Password" />
                            </div>


                            <div class="input-group">

								<input id="avatar" class="form-control d-none"  type="file"  name="avatar"  onchange="readURL(this);">
								<label for="avatar" class="form-control avatar_label">Select an Avatar</label>

								<div class="input-group-append">
									<label class="input-group-text" for="avatar">Browse</label>
								</div>


                            </div>

                            <img id="image" src="" >


                           


                            
                            <input type="hidden" name="status" value="success">
 

                <br>

                
                <button type="submit" class="btn btn-primary block full-width m-b">{{ __('Create Account') }}</button>

                <p class="text-muted text-center"><small>{{ __('Already registered?') }}</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{ route('login') }}">{{__('Login')}}</a>
            </form>
           
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>


<script>
    function readURL(input)
    {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#image')
                .attr('src', e.target.result)
                .height(80);
                
            };
            reader.readAsDataURL(input.files[0]);
        }

    }
</script>

@endsection
