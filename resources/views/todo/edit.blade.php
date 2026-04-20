@extends('layouts.app')

@section('title','Todo List')

@section('content')
    <form action="" method="post">
        @csrf
        <div class="mb-2">
            <label for="name" class="form-label small">Task Name</label>
            <div class="input-group">
                <input type="text" name="name" id="name" class="form-control">
                <button type="submit" class="btn btn-warning">
                    <i class="fa-solid fa-pen"></i>
                </button>
            </div>            
        </div>
    </form>

@endsection