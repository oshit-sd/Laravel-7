<div>
    <div class="flex justify-center pb-4 px-4">
        <h2 class="text-lg pb-4">
            Add Step for task
        </h2>
        <span wire:click="increment" class="fas fa-plus px-2 py-1 cursor-pointer"></span>
    </div>

    @foreach($steps as $key => $step)
    <div class="flex justify-center py-2">
        <input type="text" name="step[]" placeholder="{{ $loop->index+1 }}" class="py-1 px-2 border rounded">
        <span wire:click="remove({{$key}})" class="fas fa-times text-red-400  py-2 px-2 cursor-pointer"></span>
    </div>
    @endforeach
</div>