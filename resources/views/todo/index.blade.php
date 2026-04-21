@extends('layouts.app')

@section('title','Todo List')

@section('content')
    <form action="/task/store" method="post">
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label small">Task Name</label>
            <div class="input-group">
                <input type="text" name="name" id="name" class="form-control">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </div>            
        </div>
    </form>

    <div class="card">
        <div class="card-header">
            <h5 class="card-title">Todo List</h5>
        </div>
        <ul class="list-group list-group-flush">
            @foreach ($all_tasks as $task)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <span class="">{{ $task->name }}</span>
                    <div>
                        <a href="/task/{{ $task->id }}/edit" class="btn btn-sm btn-warning">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>
                        <form action="/task/{{ $task->id }}/destroy" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>    
                    </div>
                </li>
                
            @endforeach
        </ul>
    </div>
@endsection