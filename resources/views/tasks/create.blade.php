@extends('layouts.app')

@section('content')
    <h1>New Task</h1>

    @if($errors->any())
      <ul class="alert alert-danger" role="alert" style="padding-left: 2rem;">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    @endif

    <form method="POST" action="/tasks">
        @csrf
        <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <input type="text" class="form-control" id="description" name="description" aria-describedby="description">
        </div>
        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>

@endsection

