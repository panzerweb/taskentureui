{{-- 
 ==========================================================
 ||                     Help View Page                   ||
 ==========================================================
 
 Description: 
 This is the view page for the Help Section. Other term for
 this is that this is the About Page. Contacts, Team Developers,
 Related Details and Information regarding this website is shown.
 
--}}

@extends('layouts.app')

@section('content')

<div class="help-header-div py-5">
    <h1 class="text-center text-light">
        TEAM
    </h1>
</div>

<div class="container-lg help-wrapper my-3">
    <div class="row justify-content-center">
        <!-- <h3 class="fw-bold text-center mt-4 mb-2">Our Team</h3> -->
        <p class="text-center mb-4">Cooperation and Collaboration of these wonderful developers have this app a success.</p>

        @foreach($devs as $dev)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="card shadow-lg border border-1">
                <!-- Cover Photo -->
                <img src="{{asset($dev['cover_photo'])}}" class="card-img-top object-fit-cover" alt="Cover Photo" style="height: 120px; object-fit: cover;">

                <!-- Profile Picture -->
                <div class="d-flex justify-content-center" style="margin-top: -40px;">
                    <img src="{{asset($dev['profile_pic'])}}" class="rounded-circle border border-3 object-fit-cover" alt="Profile Picture" style="width: 100px; height: 100%;">
                </div>

                <div class="card-body text-center">
                    <h5 class="card-title fw-bold">{{$dev['name']}}</h5>
                    <p class="card-subtitle mb-2 ">{{$dev['role']}}</p>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="https://goto.now/w8E4P" class="btn btn-sm btn-outline-warning"><i class="bi bi-meta"></i></a>
                        <a href="https://www.instagram.com/" class="btn btn-sm btn-outline-warning"><i class="bi bi-instagram"></i></a>
                        <a href="https://www.tiktok.com/en/" class="btn btn-sm btn-outline-warning"><i class="bi bi-tiktok"></i></a>
                        <a href="https://github.com/" class="btn btn-sm btn-outline-warning"><i class="bi bi-github"></i></a>
                    </div>
                    <small class="text-dark d-block mt-3">Joined: 2024</small>

                    {{-- Go the individual pages of each developer --}}
                    <a href="{{route('pages.developer', $dev['id'])}}">
                        <button class="btn btn-warning my-2">Visit Profile</button>
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



@endsection
