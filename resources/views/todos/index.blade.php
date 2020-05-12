@extends('todos.layouts')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">
        TO-DO Lists
    </h1>

    <a href="{{ route('todo.create') }}" class="mx-5 py-2 text-blue-400 cursor-pointer text-white">
        <span class="fas fa-plus-circle"></span>
    </a>
</div>

<ul class="my-5">
    <x-alert />
    @forelse($todos as $todo)
    <li class="flex justify-between p-2">
        <div>
            <!-- complete /  incomplete -->
            @include('todos.complete-button')
        </div>
        @if($todo->completed)
        <a href="{{ route('todo.show',$todo->id) }}">
            <p class="line-through">{{ $todo->title }}</p>
        </a>
        @else
        <a href="{{ route('todo.show',$todo->id) }}">{{ $todo->title }}</a>
        @endif

        <div>
            <a href="{{ route('todo.edit',$todo->id) }}" class="text-orange-400 cursor-pointer">
                <span class="fas fa-pencil-alt px-2"></span>
            </a>

            <span class="fas fa-times px-2 text-red-500 cursor-pointer" onclick=" if(confirm('Are you sure want to delete ?')){ 
                event.preventDefault(); 
                document.getElementById('form-delete-{{ $todo->id }}').submit()
            }"></span>
            <form method="post" style="display:none;" id="{{ 'form-delete-'.$todo->id }}" action="{{ route('todo.destroy',$todo->id) }}">
                @csrf
                @method('delete')
            </form>
        </div>
    </li>
    @empty
    <p>No task available, create one</p>
    @endforelse
</ul>
@endsection