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

<div class="container-lg home">
    <div class="row justify-content-center">
        {{-- ======================================================== --}}
        {{-- Task CRUD --}}
        <div class="col-12 col-lg-7">
            {{-- ======================================================== --}}
            {{-- Search Bar --}}
            <form action="{{ route('tasks.search', ['context' => 'home']) }}" method="get">
                <div class="input-group mb-3">
                    <input
                        type="search"
                        class="form-control form-control-md"
                        name="search"
                        id="search"
                        placeholder="Search"
                    />
                    <button type="submit" class="btn btn-warning" id="search-button">
                        Search
                    </button>
                </div>
            </form>

            {{-- ======================================================== --}}
            {{-- Add Task Form --}}
            <div class="wrapper p-3 rounded-3">
                <h2 class="fw-bold">Add Task</h2>
                <form action="/create-task" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input
                            type="text"
                            class="form-control form-control-md"
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
                <h2 class="fw-bold mt-4">Tasks</h2>
                @if($tasks->isNotEmpty()){{-- If searched query is true --}}
                @foreach ($tasks as $task)
                    <div class="d-flex justify-content-between border border-2 rounded-1 gap-3 py-1 mb-2 
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
                        </div>
                        </form>

                        {{-- ======================================================== --}}

                        {{-- ======================================================== --}}
                        {{-- Options Dropdown --}}

                        <div class="dropdown align-self-center">
                            <button class="btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical fs-3"></i>
                            </button>
                            <ul class="dropdown-menu">
                                {{-- Edit Task -- Activate Modal --}}
                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#editModalId{{$task->id}}">Edit</a></li>
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
                    </div>
                @endforeach
                @else
                    <p class="text-center lead bg-light rounded-3 p-3">No Record Found</p>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-5">
            <h1 class="fw-bold">Rewards</h1>
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
