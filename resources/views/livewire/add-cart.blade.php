<div class="absolute top-2 right-2">
    <form wire:submit="send({{$item->id}})">
        <input type="hidden" value-"1" wire:model.live="id">
        <button type="submit" class="bg-orange-500 p-1 rounded-full text-white hover:bg-orange-600 focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    </form>
</div>