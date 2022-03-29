@extends('frontend.dashboard')
@section('content')
<div class="row wrapper border-bottom white-bg page-heading animated fadeInRight">
    <div class="col-lg-10">
        <h2>{{__('User Profile')}}</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route('dashboard')}}">{{__('Home')}}</a>
            </li>

            <li class="breadcrumb-item active">
                <strong>{{__('User Profile')}}</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2 align-self-center ">
        <!-- <div class="my-auto">
            <a class="btn btn-primary btn-md float-right" href="{{route('admin.settings.index')}}">{{__('Settings List')}}</a>
        </div> -->
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">

    
    <div class="row">
        
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>{{__('User Details')}}</h5>
                    
                </div>

 

                <div class="ibox-content">
                    <dl class="row">
                           
                    
                           <dt class="col-sm-12 mb-3" >
                           <img class="" alt="User Image" src="{{URL::to($user_profile->avatar) ?? ''}}" width="100px"></dt>

                            <dt class="col-sm-3" >{{__('Name')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$user_profile->name}}</dd>
                            <dt class="col-sm-3" >{{__('ID')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$user_profile->id}}</dd>
                            
                            <dt class="col-sm-3" >{{__('Email Address')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$user_profile->email}}</dd>

                            <dt class="col-sm-3" >{{__('Phone Number')}} <span class="float-right">:</span></dt>
                            <dd class="col-sm-9">{{$user_profile->phone}}</dd>

                        </dl>


                </div>
            </div>
        </div>
    </div>
</div>




@endsection