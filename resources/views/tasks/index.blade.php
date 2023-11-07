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
                </div>
            </div>
        </div>
    @endforeach
    <a href="/tasks/create" class="btn btn-primary">New Task</a>
@endsection
