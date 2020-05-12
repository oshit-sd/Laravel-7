@if($todo->completed)
<span onclick="event.preventDefault(); 
            document.getElementById('form-incomplete-{{ $todo->id }}').submit()" class="fas fa-check text-green-400 cursor-pointer px-2"></span>
<form method="post" style="display:none;" id="{{ 'form-incomplete-'.$todo->id }}" action="{{ route('todo.incomplete',$todo->id) }}">
    @csrf
    @method('put')
</form>
@else
<span onclick="event.preventDefault(); 
            document.getElementById('form-complete-{{ $todo->id }}').submit()" class=" fas fa-check text-gray-300 cursor-pointer px-2"></span>
<form method="post" style="display:none;" id="{{ 'form-complete-'.$todo->id }}" action="{{ route('todo.complete',$todo->id) }}">
    @csrf
    @method('put')
</form>
@endif