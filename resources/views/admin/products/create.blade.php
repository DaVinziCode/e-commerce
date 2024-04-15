<x-admin-layout>
    <div class="py-12 w-full dark:bg-gray-700">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <header class="max-w-lg mx-auto mt-8">
                <a href="">
                    <h1 class="text-4xl font-bold text-white text-center">Add New Product</h1>
                </a>
            </header>

            <main class="bg-white max-w-lg mx-auto p-8 my-10 rounded-lg shadow-2xl">
                <section class="mt-5">
                    <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST"
                        class="flex flex-col">
                        @csrf
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="product_name" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Product
                                Name
                            </label>
                            <input type="text" name="product_name" id=""
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                value="{{ old('product_name') }}">
                            @error('product_name')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="qty" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Quantity
                            </label>
                            <input type="number" name="qty" id=""
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                autocomplete="off" value="{{ old('qty') }}">
                            @error('qty')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="actual_stock" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Stock
                            </label>
                            <input type="number" name="actual_stock" id=""
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                autocomplete="off" value="{{ old('actual_stock') }}">
                            @error('actual_stock')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="stock_left" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Stock Left
                            </label>
                            <input type="number" name="stock_left" id=""
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                autocomplete="off" value="{{ old('stock_left') }}">
                            @error('stock_left')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="price" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Price
                            </label>
                            <input type="number" name="price" id="price"
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                step="0.01" onblur="formatPrice(this)" />
                            @error('email')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Description
                            </label>
                            <input type="text" name="description" id=""
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                value="{{ old('description') }}">
                            @error('description')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-6 pt-3 rounded bg-gray-200">
                            <label for="product_image" class="block text-gray-700 text-sm font-bold mb-2 ml-3">Product
                                Image
                            </label>
                            <input type="file" name="product_image"
                                class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-400 px-3"
                                value="{{ old('product_image') }}">
                            @error('product_image')
                                <p class="text-red-500 text-xs p-1">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="mb-6 pt-3">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="hidden" name="is_publish" value="0"> <!-- Remove one of the input fields -->
                                <input type="checkbox" value="1" class="sr-only peer" name="is_publish" id="is_publish_checkbox">
                                <div class="relative w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                </div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-600">Is Publish</span>
                            </label>
                        </div>

                        <button
                            class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200"
                            type="submit">Add New</button>
                    </form>
                </section>
            </main>

        </div>

    </div>
    <x-messages />
</x-admin-layout>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkbox = document.getElementById('is_publish_checkbox');
        console.log(checkbox);
        const hiddenInput = document.querySelector('input[name="is_publish"]');

        checkbox.addEventListener('change', function() {
            hiddenInput.value = this.checked ? 1 : 0;
        });
    });

    function formatPrice(input) {
        // Get the value of the input
        let value = input.value;

        // Check if the value contains a decimal point
        if (!value.includes('.')) {
            // If no decimal point is present, append .00 to the value
            input.value = parseFloat(value).toFixed(2);
        }
    }
</script>
