{{-- 
 ==========================================================
 ||                     DEVELOPER View Page                   ||
 ==========================================================
 
 Description: 
 This is the view page for each Developer. Here you can view
 all related details regarding the developer.
 
--}}

@extends('layouts.app')

@section('content')


<div class="help-header-div py-5">
    <h1 class="text-center text-light">
        Taskenture
    </h1>
</div>

<div class="container-lg">
    <div 
    class="help-header-div py-5 text-center text-light border border-dark border-3" 
     style="background: url('{{ asset($dev['cover_photo']) }}') 
            center/cover no-repeat;
            height: 200px;"
    >   
    </div>
</div>

<div class="container-lg help-wrapper mb-3">  
    <div class="row justify-content-center">
        <div class="col-8 col-lg-5">
            <div class="card card-primary card-outline border border-3 border-dark" style="margin-top: -5rem">
                <div class="card-header text-light rounded-0">
                    <h3 class="card-title">Profile</h3>
                  </div>
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid rounded-circle mb-2 border border-5 border-dark" 
                        src="{{asset($dev['profile_pic'])}}" 
                        alt="User profile picture">
                  </div>
    
                  <h3 class="profile-username text-center">{{$dev['name']}}</h3>
    
                    <p class="text-muted text-center">{{$dev['role']}}</p>
    
                    <ul class="list-group list-group-unbordered mb-3 list-header">
                        <strong class="text-center fs-4 text-light">About Me</strong>
                        <li class="list-group-item">
                        <b>Education: </b><span>{{$dev['education']}}</span>
                        </li>
                        <li class="list-group-item">
                        <b>Skills: </b><span>{{implode(', ', $dev['skills'])}}</span>
                        </li>
                        <li class="list-group-item">
                        <b>Address: </b><span>{{$dev['address']}}</span>
                        </li>
                    </ul>
    
                    <div class="d-flex flex-wrap justify-content-center gap-2">
                        <a href="#" class="btn btn-sm btn-warning fs-5 px-3"><i class="bi bi-meta"></i></a>
                        <a href="#" class="btn btn-sm btn-warning fs-5 px-3"><i class="bi bi-instagram"></i></a>
                        <a href="#" class="btn btn-sm btn-warning fs-5 px-3"><i class="bi bi-tiktok"></i></a>
                        <a href="#" class="btn btn-sm btn-warning fs-5 px-3"><i class="bi bi-github"></i></a>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
</div>



@endsection
