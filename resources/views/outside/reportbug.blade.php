{{-- 
 ==========================================================
 ||                   Report Bug Page                     ||
 ==========================================================
 
 Description: 
 This page allows users to report any issues, defects, or flaws encountered 
 in the web app system to help improve the platform.
 --}}

 @extends('layouts.outside')

@section('content')

    <div class="help-header-div py-5">
        <h1 class="text-center text-light">
        Found a Bug? Let Us Know!
        </h1>
    </div>
    <div class="container py-4">
        
        <p class="text-center">
            Your feedback helps us improve! Please fill out the form below to report any issues 
            you’ve encountered while using our platform.
        </p>

        <!-- Bug Report Form -->
        <form action="{{ route('reportbug.submit') }}" method="POST" class="mt-4">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" id="name" name="name" class="form-control" placeholder="Enter your name" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Enter your email" required>
            </div>

            <div class="mb-3">
                <label for="issue" class="form-label">Issue Description</label>
                <textarea id="issue" name="issue" class="form-control" rows="5" placeholder="Describe the bug or issue in detail" required></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-warning">Submit Bug Report</button>
            </div>
        </form>

        <!-- Display Validation Errors -->
        <!-- @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    </div> -->

@endsection

