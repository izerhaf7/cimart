<form wire:submit.prevent="remove">
    <input type="hidden" name="id" value="{{ $id }}">
    <button type="submit"
        class="bg-red-600 text-white px-4 py-2 rounded-md hover:bg-red-700">
        Remove
    </button>
</form>
