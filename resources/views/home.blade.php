{{-- 
 ==========================================================
 ||                   Home View Page                     ||
 ==========================================================
 
 Description: 
 The Main View Page of the Web Application, the link for the
 My List Navigational Link. This is where the main CRUD happens
 in the first place.

 
--}}
@extends('layouts.app')

@section('content')

{{-- The profile section --}}
@include('components.profile');

<style>
.updates-list {
    list-style-type: none;
    padding: 0;
}

.updates-list li {
    background-color: #401F71;
    border-radius: 5px;
    padding: 15px;
    margin-bottom: 15px;
}

.updates-list h3 {
    margin-top: 0;
}

h1 {
    font-size: 2.5em;
    margin-bottom: 10px;
}

.pixel-text {
    font-family: 'Press Start 2P', cursive;
    text-shadow: 2px 2px 0px #000;
}

.card {
    background-color: #6635B1;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 20px;
}
.badge {
    display: inline-block;
    padding: 5px 10px;
    background-color: #e94560;
    border-radius: 20px;
    font-size: 0.8em;
    margin-top: 10px;
}
</style>

<div class="container-lg home pb-4">
    <div class="row justify-content-center">

        {{-- ======================================================== --}}
        {{-- Task CRUD --}}
        <div class="row justify-content-center px-5 pb-3">
            {{-- Search Bar --}}
            <div class="d-flex justify-content-center">
                <form action="{{ route('tasks.search', ['context' => 'home']) }}" method="get" class="w-100">
                    <div class="input-group my-3" style="max-width: 600px; margin: 0 auto;">
                        <input
                            type="search"
                            class="form-control form-control-md border border-2 border-dark-subtle"
                            name="search"
                            id="search"
                            placeholder="Search"
                        />
                        <button type="submit" class="btn btn-warning" id="search-button">
                            Search
                        </button>
                    </div>
                </form>
            </div>
            
        </div>
        <div class="col-12 col-lg-7 mt-5">
            {{-- ======================================================== --}

            {{-- ======================================================== --}}
            {{-- Add Task Form --}}
            <div class="wrapper p-3 rounded-3 shadow border border-2 border-dark-subtle">
                <h2 class="pixel-text">Add Task</h2>
                <form action="/create-task" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control form-control-md border border-2 border-dark-subtle"
                            name="taskname"
                            id="taskname"
                            placeholder="Add your Task..."
                        />
                        <button type="submit" class="btn btn-warning" id="add-task-button">
                            Add Task
                        </button>
                    </div>
                </form>
                {{-- ======================================================== --}}

                {{-- ======================================================== --}}
                {{-- Task List --}}
                <div class="d-flex flex-column flex-md-row justify-content-between">
                    <h2 class="pixel-text">Tasks</h2>
                    {{-- Filter for Priority and Categories --}}
                    <div class="dropdown my-3 filter-dropdown">
                        <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Filter
                        </button>
                        <form action="{{ route('tasks.filter', ['context' => 'home']) }}" method="GET" class="dropdown-menu p-3">
                            <h6 class="dropdown-header">Priority</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="priority[]" value="1" id="highPriority">
                                <label class="form-check-label" for="highPriority">High</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="priority[]" value="2" id="mediumPriority">
                                <label class="form-check-label" for="mediumPriority">Medium</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="priority[]" value="3" id="lowPriority">
                                <label class="form-check-label" for="lowPriority">Low</label>
                            </div>
                            <h6 class="dropdown-header mt-3">Category</h6>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category[]" value="1" id="personalCategory">
                                <label class="form-check-label" for="personalCategory">Personal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category[]" value="2" id="professionalCategory">
                                <label class="form-check-label" for="professionalCategory">Professional</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="category[]" value="3" id="academicCategory">
                                <label class="form-check-label" for="academicCategory">Academic</label>
                            </div>
                            <button type="submit" class="btn btn-primary mt-3">Apply Filters</button>
                        </form>
                    </div>
                </div>
                @if($tasks->isNotEmpty()){{-- If searched query is true --}}
                @foreach ($tasks as $task)
                    <div class="task-box d-flex justify-content-between border border-dark-subtle border-1 rounded-1 gap-3 py-1 mb-2 shadow-sm
                        @if($task->is_favorite) fill-div @else default @endif"
                    >
                        <form action="{{route('tasks.toggleComplete', $task->id)}}" method="post" class="d-flex align-items-center gap-2">
                        @csrf
                        {{-- ======================================================== --}}
                        {{-- Checkbox --}}
                        <div class="align-self-center">
                            <div class="btn-group align-self-center checkbox" role="group" aria-label="Basic checkbox toggle button group">
                                <input
                                    class="form-check-input fs-1 mx-2 my-0 bg-warning"
                                    name="is_completed"
                                    id="is_completed_{{ $task->id }}"
                                    type="checkbox"
                                    value="{{ $task->id }}"
                                    {{$task->is_completed ? 'checked' : ''}}
                                    aria-label="Mark task as completed"
                                    onchange="this.form.submit()"
                                />                                
                            </div>
                        </div>
                        {{-- ======================================================== --}}
                        
                        {{-- ======================================================== --}}
                        {{-- Task Content --}}

                        <div class="text-content w-100">
                            <h3 class="fw-bold @if($task->is_completed) text-strikethrough @endif" id="task-name">{{ $task->taskname }}</h3>
                            <p class="@if($task->is_completed) text-strikethrough @endif">{{ $task->description }}</p>

                            {{-- Priority --}}
                            @if ($task->priority_id == 1)
                                <span class="badge text-bg-danger">High</span>
                            @elseif ($task->priority_id == 2)
                                <span class="badge text-bg-warning">Medium</span>
                            @elseif ($task->priority_id == 3)
                                <span class="badge text-bg-success">Low</span>
                            @else
                                <span class="badge text-bg-secondary"></span>
                            @endif

                            {{-- Category --}}
                            @if ($task->category_id == 1)
                                <span class="badge bg-warning text-dark">Personal</span>
                            @elseif ($task->category_id == 2)
                                <span class="badge bg-primary">Professional</span>
                            @elseif ($task->category_id == 3)
                                <span class="badge bg-info text-dark">Academic</span>
                            @else
                                <span class="badge bg-secondary"></span>
                            @endif
                            
                            {{-- Due Date --}}
                            <span class="badge text-bg-warning">{{$task->due_date}}</span>
                        </div>
                        </form>

                        {{-- ======================================================== --}}

                        {{-- ======================================================== --}}
                        {{-- Options Dropdown --}}

                        <div class="dropdown align-self-center option-dropdown">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical fs-3"></i>
                            </button>

                            <ul class="dropdown-menu">

                                {{-- Edit Task -- Activate Modal --}}
                                <li>
                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editModalId{{$task->id}}">Edit</a>
                                </li>

                                {{-- Delete Task --}}
                                <form action="{{route('tasks.delete', $task->id)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <li><button class="dropdown-item text-danger" type="submit">Delete</button></li>
                                </form>

                                {{-- Mark Task as Favorite --}}
                                <form action="{{route('tasks.starred', $task->id)}}" method="post">
                                    @csrf
                                    <li><button class="dropdown-item" href="#">Mark as Favorite</button></li>
                                </form>
                            </ul>
                        </div>
                        {{-- ======================================================== --}}

                        {{-- ======================================================== --}}
                    </div>
                @endforeach
                @else
                    <p class="text-center lead bg-light rounded-3 p-3">No Record Found</p>
                @endif
                {{$tasks->links('pagination::bootstrap-5')}}

            </div>
        </div>
        <div class="col-12 col-lg-5 mt-5">
            <div class="card">
                <h2 class="pixel-text text-white text-center">Events</h2>    
            </div>
            <!-- Display Area for Events -->
            <div class="card">
                <h2 class="pixel-text text-white">Upcoming Updates</h2>
                <ul class="updates-list">
                    <li>
                        <h3 class="pixel-text text-white">Game?!</h3>
                        <p class="text-white">Experience the thrill of our upcoming 'Tasking Royale' mode!</p>
                        <span class="badge bg-danger text-light">In Development</span>
                    </li>
                    <li>
                        <h3 class="pixel-text text-white">Customizable Avatar Soon</h3>
                        <p class="text-white">Get ready to customize your avatar.</p>
                        <span class="badge bg-warning text-dark">Planned</span>
                    </li>
                    <li>
                        <h3 class="pixel-text text-white">Forgot Password?</h3>
                        <p class="text-white">Forgetting password will never be the same. But PLEASE don't!!!</p>
                        <span class="badge bg-danger text-light">In Development</span>
                    </li>
                </ul>
                <a href="{{route('event')}}" class="btn text-white" style="background-color: #401F71;">More Events</a>
            </div>
        </div>




        {{-- ======================================================== --}}
        {{-- Toast for every message --}}

            @include('components.toast')

        {{-- ======================================================== --}}
        {{-- ======================================================== --}}
        {{-- Modal for Editing --}}

            @include('layouts.modal')

        {{-- ======================================================== --}}

        
    </div>
</div>


@endsection
