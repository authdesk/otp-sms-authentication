@extends('frontend.layouts.app')
@section('dashboard_content')

<!--dashboard wrapper start-->
<div id="wrapper">

    <!--sidebar start-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <!-- Brand Logo -->
                    <?php
                    $settings = App\Models\Setting::where("Status",1)->first();
                    ?>
                    <a href="{{route('dashboard')}}" class="brand-link">
                        <img src="{{URL::to($settings->Logo) ?? ''}}" class="brand-image img-circle" style="opacity: .8">
                        <span class="brand-text text-white">{{$settings->Name ?? ''}} </span>
                    </a>                    
                </li>
                
                <li >
                <a  href="{{route('dashboard')}}" ><i class="fa fa-th-large"></i> <span class="nav-label">{{ __('Dashboard') }}</span></a>
                </li>

                <li >
                <a  href="{{route('user-profile')}}" ><i class="fa fa-th-large"></i> <span class="nav-label">{{ __('Profile') }}</span></a>
                </li>

               

            </ul>

        </div>
    </nav>
    <!--sidebar end-->


    <!--page wrapper start-->
    <div id="page-wrapper" class="gray-bg">

       <!--topbar start-->
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                </div>

                <ul class="nav navbar-top-links navbar-right">
                    <li class="mr-3">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">{{ Auth::user()->name }} <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li class="dropdown-item" >{{__('Name:')}} {{ Auth::user()->name }}</li>
                            <li class="dropdown-item" >{{__('Email:')}} {{ Auth::user()->email }}</li>
                           
                            <li class="dropdown-divider"></li>
                            <li>
                                <!-- Authentication -->
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a class="dropdown-item mb-2 text-center" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                        this.closest('form').submit();">
                                        {{ __('Log Out') }}
                                    </a>
                                </form>
                            </li>
                        </ul>
                    </li>
            
                </ul>

            </nav>
        </div>
        <!--topbar end-->
   

        <!--content start-->
        @yield('content')
        <!--content start-->


        <!--footer start-->
        <div class="footer">
            <div>
                <strong>{{ __('Copyright') }}</strong> &copy; {{ __('2021') }}
            </div>
        </div>
        <!--footer end-->

    </div>
    <!--page wrapper start-->

    

</div>
<!--dashboard wrapper end-->

@endsection