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

<h1 class="text-center">
    Trash
</h1>

<div class="container-lg">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-7">
            @foreach ($tasks as $task)
            <div class="d-flex justify-content-between border border-2 rounded-1 gap-3 py-1 mb-2">
                {{-- Task Content --}}
                <div class="text-content w-100">
                    <h3 class="fw-bold @if($task->is_completed) text-strikethrough @endif" id="task-name">{{ $task->taskname }}</h3>
                    <p class="@if($task->is_completed) text-strikethrough @endif">{{ $task->description }}</p>
                </div>
                {{-- Add buttons to restore or permanently delete --}}
                <a href="{{route('tasks.restore', $task->id)}}" class="btn btn-primary">Restore</a>

                {{-- This uses get method in the routing --}}
                <a href="{{route('tasks.deletepermanent', $task->id)}}" class="btn btn-danger">Delete</a>

                {{-- This uses delete method in the routing --}}
                {{-- <form action="{{route('tasks.deletepermanent', $task->id)}}" method="post">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form> --}}

            </div>
            @endforeach
        </div>
    </div>
</div>

        {{-- ======================================================== --}}
        {{-- Toast for every message --}}

        @include('components.toast')

        {{-- ======================================================== --}}

@endsection

