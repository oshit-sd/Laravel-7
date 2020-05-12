<div>
    <h1 class="my-10 text-3xl">Comments</h1>
    @error('newCommnet') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
    <form wire:click.prevent="addComment" class="my-4 flex">
        <!-- <input type="text" wire:model="newCommnet" class="w-full dounded shadow p-2 mr-2 my-2" placeholder="What's in your mind"> -->
        <input type="text" wire:model.debounce.500ms="newCommnet" class="w-full dounded shadow p-2 mr-2 my-2" placeholder="What's in your mind">
        <!-- <input type="text" wire:model.lazy="newCommnet" class="w-full dounded shadow p-2 mr-2 my-2" placeholder="What's in your mind"> -->
        <div class="py-2">
            <button type="submit" class="p-2 bg-blue-500 w-20 rounded shadow text-white">ADD</button>
        </div>
    </form>

    @foreach($comments as $comment)
    <div class="my-2 p-3 border rounded shadow">
        <div class="flex justify-start my-2">
            <p class="front-bold text-lg">{{ $comment->creator->name }}</p>
            <p class="px-3 py-1 text-gray-500 font-semibold text-xs">{{ $comment->created_at->diffForhumans() }}</p>
        </div>
        <div class="text-gray-800">{{ $comment->body }}
        </div>
    </div>
    @endforeach
</div>