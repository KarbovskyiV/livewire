<form method="POST" wire:submit="save">
    <div>
        <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
        <input id="name" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm" type="text" wire:model="name"/>
    </div>

    <div class="mt-4">
        <label for="description" class="block font-medium text-sm text-gray-700">Description</label>
        <textarea id="description" class="block mt-1 w-full border-gray-300 rounded-md shadow-sm"
                  wire:model="description">
        </textarea>
    </div>

    <div class="mt-4">
        <label for="category">Category</label>
        <select wire:model="category_id" name="category" id="category"
                class="block mt-1 w-full border-gray-300 rounded-md shadow-sm">
            <option value="0">-- CHOOSE CATEGORY --</option>
            @foreach($categories as $id => $category)
                <option value="{{ $id }}">{{ $category }}</option>
            @endforeach
        </select>
    </div>

    <button class="mt-4 px-4 py-2 bg-gray-800 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
        Save Product
    </button>
</form>