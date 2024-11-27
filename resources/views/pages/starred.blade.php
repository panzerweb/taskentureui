{{-- 
 ==========================================================
 ||                   Starred View Page                  ||
 ==========================================================
 
 Description: 
 This is the view page for all favorite or Marked As Favorite
 Tasks. Here, you can also do the same CRUD logic from the 
 home.blade.php

 
--}}

@extends('layouts.app')

@section('content')

<div class="py-4">
    <h1 class="display-3 text-center">
        Favorite
    </h1>
    <p class="text-center lead">
        Your Favorite Tasks are Here!!!
    </p>
    
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                {{-- Search Bar --}}
                <form action="{{ route('tasks.search', ['context' => 'pages.starred'])}}" method="get">
                    <div class="input-group mb-3">
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
                
                {{-- ======================================================== --}}
                {{-- Filter if the task is not empty and 
                    the task is a favorite to search --}}
                {{-- ======================================================== --}}
                <div class="wrapper p-3 rounded-3 shadow border border-2 border-dark-subtle">
                    <div class="d-flex flex-column flex-md-row justify-content-between">
                        <h2 class="fw-bold mt-4 mb-3">Tasks</h2>
                        {{-- Filter for Priority and Categories --}}
                        <div class="dropdown my-3 filter-dropdown">
                            <button class="btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Filter
                            </button>
                            <form action="{{ route('tasks.filter', ['context' => 'pages.starred']) }}" method="GET" class="dropdown-menu p-3">
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
                @if($tasks->isNotEmpty() && $tasks->filter(fn($task) => $task->is_favorite)->isNotEmpty())
                @foreach ($tasks as $task)
                @if ($task->is_favorite)
                    <div class="task-box d-flex justify-content-between border border-dark-subtle border-1 rounded-1 gap-3 py-1 mb-2 shadow-sm
                        @if($task->is_favorite) fill-div @endif"
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

                            {{-- Priorities --}}
                            @if ($task->priority_id == 1)
                                <span class="badge text-bg-danger">High</span>
                            @elseif ($task->priority_id == 2)
                                <span class="badge text-bg-warning">Medium</span>
                            @elseif ($task->priority_id == 3)
                                <span class="badge text-bg-success">Low</span>
                            @else
                                <span class="badge text-bg-secondary">Null</span>
                            @endif

                            {{-- Category --}}
                            @if ($task->category_id == 1)
                                <span class="badge bg-warning text-dark">Personal</span>
                            @elseif ($task->category_id == 2)
                                <span class="badge bg-primary">Professional</span>
                            @elseif ($task->category_id == 3)
                                <span class="badge bg-info text-dark">Academic</span>
                            @else
                                <span class="badge bg-secondary">Null</span>
                            @endif
                        
                            {{-- Due Date --}}
                            <span class="badge text-bg-warning">{{$task->due_date}}</span>
                            
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
                @endif 
                @endforeach
                @else
                    <p class="text-center lead bg-light rounded-3 p-3">No Record Found</p>
                @endif
                {{$tasks->links('pagination::bootstrap-5')}}

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
</div>


@endsection
