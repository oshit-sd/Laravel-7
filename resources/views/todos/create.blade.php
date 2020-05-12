@extends('todos.layouts')

@section('content')
<div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl">
        What next you need TO-DO
    </h1>
    <a href="{{ route('todo.index') }}" class="mx-5 py-2 text-gray-400 cursor-pointer text-white">
        <span class="fas fa-arrow-left"></span>
    </a>
</div>

<!-- @include('layouts.flash') -->
<x-alert>
    <p>Create your todo </p>
</x-alert>

<form action="{{ route('todo.store') }}" method="post" class="py-5">
    @csrf

    <div class="py-1">
        <input type="text" name="title" class="p-2 border rounded">
    </div>

    <div class="py-1">
        <textarea name="description" rows="3" class="p-2 border rounded"></textarea>
    </div>
    <div class="py-2">
        @livewire('step')
    </div>


    <div class="py-1">
        <input type="submit" value="Submit" class="p-2 border rounded">
    </div>
</form>
<!-- @livewire('counter') -->

@endsection