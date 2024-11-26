{{-- 
 ==========================================================
 ||                   Trash View Page                    ||
 ==========================================================
 
 Description: 
 This is the view page for all deleted tasks. Here you can
 either Restore them, or do a Hard Delete on them.

 
--}}

@extends('layouts.app')

@section('content')

<div class="py-4">
    <h1 class="display-3 text-center">
        Trash
    </h1>
    <p class="text-center lead">
        Here is your deleted tasks! You can restore them or delete them permanently.
    </p>
    
    <div class="container-lg">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7">
                {{-- Search Bar --}}
                <form action="{{ route('tasks.search', ['context' => 'pages.trash'])}}" method="get">
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
    
                <div class="wrapper p-3 rounded-3 shadow border border-2 border-dark-subtle">
                @if($tasks->isNotEmpty())
                @foreach ($tasks as $task)
                <div class="task-box d-flex justify-content-between align-items-center border border-dark-subtle border-1 rounded-1 gap-3 py-1 px-3 mb-2 shadow-sm">
                    {{-- Task Content --}}
                    <div class="text-content w-100 mx-3">
                        <h3 class="fw-bold @if($task->is_completed) text-strikethrough @endif align-self-center" id="task-name">{{ $task->taskname }}</h3>
                        <p class="@if($task->is_completed) text-strikethrough @endif">{{ $task->description }}</p>
                    </div>
                    {{-- Add buttons to restore or permanently delete --}}
                    <a href="{{route('tasks.restore', $task->id)}}" class="btn btn-warning">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-repeat" viewBox="0 0 16 16">
                            <path d="M11.534 7h3.932a.25.25 0 0 1 .192.41l-1.966 2.36a.25.25 0 0 1-.384 0l-1.966-2.36a.25.25 0 0 1 .192-.41m-11 2h3.932a.25.25 0 0 0 .192-.41L2.692 6.23a.25.25 0 0 0-.384 0L.342 8.59A.25.25 0 0 0 .534 9"/>
                            <path fill-rule="evenodd" d="M8 3c-1.552 0-2.94.707-3.857 1.818a.5.5 0 1 1-.771-.636A6.002 6.002 0 0 1 13.917 7H12.9A5 5 0 0 0 8 3M3.1 9a5.002 5.002 0 0 0 8.757 2.182.5.5 0 1 1 .771.636A6.002 6.002 0 0 1 2.083 9z"/>
                          </svg>                
                    </a>
    
                    {{-- This uses get method in the routing --}}
                    <a href="{{route('tasks.deletepermanent', $task->id)}}" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                            <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                        </svg>
                    </a>
    
                    {{-- This uses delete method in the routing --}}
                    {{-- <form action="{{route('tasks.deletepermanent', $task->id)}}" method="post">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form> --}}
    
                </div>
                @endforeach
                @else
                    <p class="text-center lead bg-light rounded-3 p-3">No Record Found</p>
                @endif

                {{$tasks->links('pagination::bootstrap-5')}}

                </div>
            </div>
            <div class="d-none d-lg-block col-12 col-lg-5">
                <div class="deleted-count-wrapper p-3 rounded-3">
                    <div class="img-wrapper text-center p-2 rounded-3">
                        <img src="{{asset('images/misc/Trashicon3.svg')}}" alt="" class="img-fluid object-fit-cover">
                        <h3 class="fw-bold text-light shadow-lg py-2">
                            You have 
                                <span id="countOfTrash">{{$tasks->count()}}</span> 
                            Task Deleted
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    {{-- ======================================================== --}}
    {{-- Toast for every message --}}

    @include('components.toast')

    {{-- ======================================================== --}}
    
</div>
@endsection

