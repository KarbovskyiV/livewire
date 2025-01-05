<div>
    <div class="min-w-full align-middle">
        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
            <tr>
                <th class="bg-gray-50 px-6 py-3 text-left">
                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Name</span>
                </th>
                <th class="bg-gray-50 px-6 py-3 text-left">
                    <span class="text-xs font-medium uppercase leading-4 tracking-wider text-gray-500">Price</span>
                </th>
                <th class="bg-gray-50 px-6 py-3 text-left">
                </th>
            </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
            @forelse($products as $product)
                <tr class="bg-white">
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ $product->name }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        {{ $product->price }}
                    </td>
                    <td class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap">
                        <a wire:click="edit({{ $product->id }})" href="#" class="mt-4 rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="px-6 py-2 text-sm leading-5 text-gray-900 whitespace-no-wrap" colspan="3">No products found.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <div @class(['fixed bottom-0 left-0 flex h-full w-full items-center justify-center bg-gray-800 bg-opacity-60', 'hidden' => ! $showModal])>
            <div class="w-1/2 rounded-lg bg-white">
                <form wire:submit="update" class="w-full">
                    <div class="flex flex-col items-start p-4">
                        <div class="flex w-full items-center border-b pb-4">
                            <div class="text-lg font-medium text-gray-900">Edit Product</div>
                            <svg wire:click="$toggle('showModal')" class="ml-auto h-6 w-6 cursor-pointer fill-current text-gray-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                            </svg>
                        </div>
                        <div class="mt-4 w-full">
                            <label for="name" class="block text-sm font-medium text-gray-700">
                                Name
                            </label>
                            <input wire:model="name" id="name" class="block mt-1 w-full rounded-md border border-gray-200 px-3 py-2 text-sm"/>
                        </div>
                        <div class="my-4 w-full border-b pb-4">
                            <label for="price" class="block text-sm font-medium text-gray-700">
                                Price
                            </label>
                            <input wire:model="price" id="price" class="block mt-1 w-full rounded-md border border-gray-200 px-3 py-2 text-sm"/>
                        </div>
                        <div class="ml-auto">
                            <button class="mt-2 rounded-md bg-blue-500 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-blue-700" type="submit">
                                Save
                            </button>
                            <button wire:click="$toggle('showModal')" class="mt-2 rounded-md bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white hover:bg-gray-700" type="button">
                                Close
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
