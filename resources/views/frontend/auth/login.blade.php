@extends('frontend.layouts.guest')
@section('auth_content')
<div class="middle-box text-center loginscreen animated fadeInDown">
        <div class="middle-box-div">

            <h3>{{__('Welcome to Login')}}</h3>
           

            <p>{{__('Login to see it in action.')}}</p>

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

            <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf
                <div class="form-group">
                    <input id="email" class="form-control" type="email" name="email" placeholder="user@example.com" value="{{old('email')}}" required autofocus />
                </div>

                <div class="form-group">
                    <input id="password" class="form-control" type="password" name="password" placeholder="123456789" required autocomplete="current-password" />
                </div>

                <button type="submit" class="btn btn-primary block full-width m-b">{{__('Login')}}</button>
                

                <a class="btn btn-sm btn-white btn-block m-b" href="{{ route('login-by-phone-number') }}">{{__('Login by Phone Number')}}</a>

                <a class="btn btn-sm btn-white btn-block" href="{{ route('register') }}">{{__('Create an account')}}</a>

            </form>

        </div>
    </div>
@endsection

