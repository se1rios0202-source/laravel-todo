@extends('layouts.app')

@section('title','Todo List')

@section('content')
    <div class="rounded-3xl bg-white/80 p-6 shadow-lg shadow-slate-200/60 ring-1 ring-slate-100 backdrop-blur-sm">
        <form action="/task/store" method="post" class="flex items-center gap-3">
            @csrf
            <input type="text" name="name" id="name" placeholder="make tasks" required class="flex-1 h-12 rounded-2xl border border-slate-200 bg-white px-4 py-3 text-slate-600 outline-none transition focus:border-indigo-300 focus:ring-indigo-100">

            <button type="submit" class="flex h-12 w-12 items-center justify-center rounded-2xl bg-indigo-400 text-white shadow-md shadow-indigo-200 transition hover:bg-indigo-300 hover:shadow-indigo-200  active:scale-95 ">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>
    </div>

    <div class="mt-8">
        <div class="mb-4 flex items-center justify-between">
            <h2 class="text-3xl font-semibold test-slate-700"></h2>
        </div>
    </div>

    <div class="mt-8">
            <div class="mb-4 flex items-center justify-between">
                <h2 class="text-3xl font-semibold text-slate-700">Todo List</h2>
                <span class="rounded-full bg-indigo-100 px-4 py-1 text-sm font-medium text-indigo-500">
                    {{ count($all_tasks) }}posts
                </span>
            </div>

        @if(count($all_tasks) > 0)
            <ul class="space-y-4">
                @foreach ($all_tasks as $task)
                    <li class="flex items-center justify-between rounded-2xl bg-white/80 px-5 py-4 shadow-slate-200/60 ring-1 ring-white/70 backdrop-blur-sm">
                        <div class="flex items-center gap-4">
                            <div class="h-3.5 w-3.5 rounded-full bg-indigo-200 ring-4 ring-indigo-50"></div>
                            <span class="task-name">{{ $task->name }}</span>
                        </div>

                        <div class="flex items-center gap-2">
                            <a href="/task/{{ $task->id }}/edit" class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-amber-100 text-amber-500 transition hover:-translate-y-0.5 hover:bg-amber-200">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="/task/{{ $task->id }}/destroy" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="inline-flex h-10 w-10 items-center justify-center rounded-xl bg-rose-100 text-rose-500 transition hover:-translate-y-0.5 hover:bg-rose-200">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>    
                        </div>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="rounded-3xl bg-white/70 px-6 py-10 text-center text-slate-400 shadow-md ring-1 ring-slate-100">
                no tasks yet
            </div>
        @endif
    </div>
@endsection