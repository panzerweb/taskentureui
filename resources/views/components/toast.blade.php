{{-- 
 ==========================================================
 ||              Main Layout for the Toast               ||
 ==========================================================
 
 Description: 
 This is the toast layout for success message, error, and other
 messages in the behavior

 
--}}

<!-- resources/views/partials/toast.blade.php -->
<div aria-live="polite" aria-atomic="true" style="position: fixed; bottom: 1rem; z-index: 1050; margin: 0 1rem;" class="d-flex justify-content-end align-items-end">
    <!-- Toast Container -->
    <div>
        @if(session('success'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "success",
                title: "{{session('success')}}"
                });
            </script>
        @endif
        @if(session('added'))
            <script>
                const Toast = Swal.mixin({
                toast: true,
                position: "bottom-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
                });
                Toast.fire({
                icon: "success",
                title: "{{session('added')}}"
                });
            </script>
        @endif
        @if(session('toggle'))
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: "top-end",
                    showConfirmButton: false,
                    width: "auto",
                    padding: "1em",
                    color: "green",
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });
                Toast.fire({
                    icon: "info",
                    title: "{{ session('toggle') }}"
                }).then(() => {
                    @if(session('level_up'))
                        setTimeout(() => {
                            Swal.fire({
                                title: "<h2 class='fs-3'>{{ session('level_up') }}</h2>",
                                width: 600,
                                padding: "3em",
                                color: "green",
                                confirmButtonColor: "#F78F4B",
                                backdrop: `
                                    rgba(0,0,123,0.4)
                                    url('asset("images/misc/rocket.gif")')
                                    left top
                                    no-repeat
                                `
                            });
                        }, 100); // Adjust delay as necessary
                    @elseif(session('level_down'))
                        setTimeout(() => {
                                Swal.fire({
                                    title: "<h2 class='fs-3'>{{ session('level_down') }}</h2>",
                                    width: 600,
                                    padding: "3em",
                                    color: "red",
                                    confirmButtonColor: "#F78F4B",
                                    backdrop: `
                                        rgba(0,0,123,0.4)
                                        url('asset("images/misc/rocket.gif")')
                                        left top
                                        no-repeat
                                    `
                                });
                            }, 100); // Adjust delay as necessary
                    @endif
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    position: "top-end",
                    icon: "error",
                    title: "{{ session('error') }}",
                    showConfirmButton: false,
                    timer: 1500
                    });
            </script>
        @endif

        @if ($errors->any())
            <div class="toast show align-items-center text-white bg-danger border-0 shadow-lg" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="3000" style="min-width: 300px;">
                <div class="d-flex">
                    <div class="toast-body">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
            </div>
        @endif
    </div>
</div>

