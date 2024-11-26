{{-- 
 ==========================================================
 ||                   Profile View Page                     ||
 ==========================================================
 
 Description: 
 The Reusable Component of Profile, this is where the xp, profile details
 are shown at the front page

 
--}}

<section class="profile-section shadow">
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-6">
                <div class="d-flex justify-content-center align-items-start gap-3 w-100">
                    <a href="" data-bs-toggle="modal" data-bs-target="#profileModal">
                        <img src="{{ asset(Auth::user()->avatar ?? 'images/avatars/level1.png') }}" alt="Avatar" class="avatar img-fluid text-center my-2" 
                             style="
                             width: 150px; /* Increased size */
                             height: 150px; /* Increased size */
                             border: 3px solid #fff; /* White border */
                             box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3); /* Subtle shadow */
                             object-fit: cover; /* Ensures the image covers the area */
                             ">
                    </a>

                    <div class="d-flex flex-column my-2 text-light" style="flex: 1;"> <!-- Make this container flexible -->
                        <h3 class="fw-bold mb-0">{{ Auth::user()->name }}</h3> <!-- Center the text -->
                        <span class="small">{{ Auth::user()->email }}</span> <!-- Center the text -->

                        <div class="d-flex justify-content-between flex-wrap mt-3">
                            <p class="fw-bold">Level: <span class="fw-light">{{ Auth::user()->level }}</span></p>

                            {{-- Get the specific avatar according to the level --}}
                            @php
                                $avatar = Auth::user()->avatars->where('level', Auth::user()->level)->first();
                            @endphp

                            <p class="fw-bold">Rank: <span class="fw-light">{{ $avatar->name ?? 'Rookie'}}</span></p>
                            <p class="fw-bold">XP: <span class="fw-light">{{ Auth::user()->xp }} / {{ Auth::user()->level * 30 }}</span></p>
                        </div>
                        
                        <div class="progress" style="width: 100%;"> <!-- Set progress bar to take full width -->
                            <div
                                class="progress-bar bg-warning"
                                role="progressbar"
                                style="width: {{ (Auth::user()->xp / (Auth::user()->level * 30)) * 100 }}%;;"
                                aria-valuenow="{{ Auth::user()->xp }}"
                                aria-valuemin="0"
                                aria-valuemax="{{ Auth::user()->level * 30 }}"
                            >
                            {{ Auth::user()->xp }} / {{ Auth::user()->level * 30 }}
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>