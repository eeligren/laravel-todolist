@extends('layouts.app')

@section('content')
    <h1>Task List</h1>

    @foreach ($tasks as $task)
        <div class="card" style="margin-bottom: 1rem;">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">
                    <div class="col">
                        {{ $task->description }}
                        <br>
                        <span><strong>Created:</strong> {{ $task->created_at }}</span>
                    </div>
                    @if(!$task->isCompleted())
                    <form action="/tasks/{{ $task->id }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <button type="submit" class="btn btn-success">Mark as completed</button>
                    </form>
                    @endif 
                </div>
            </div>
        </div>
    @endforeach
    <a href="/tasks/create" class="btn btn-primary">New Task</a>
@endsection
