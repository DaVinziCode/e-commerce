<x-admin-layout>
<div class="py-12 w-full dark:bg-gray-700">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="overflow-hidden shadow-sm sm:rounded-lg p-2">
            <div class="flex justify-end p-2">
                <a href="{{ route('admin.products.create') }}" class="px-4 py-2 bg-cyan-300 hover:bg-cyan-500 rounded-md">Create Product</a>
            </div>
            <div class="overflow-x-auto relative">
                <table class="w-9 mx-auto w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Product Image
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Product Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Stock
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Stock Left
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6">

                            </th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr class="bg-gray-800 border-b text-white">
                            @php
                            $default_profile = "https://api.dicebear.com/8.x/initials/svg?seed=".$product->product_name
                             @endphp
                            <td>
                                <img src="{{ $product->product_image ? asset('storage/product/thumbnail/'.$product->product_image) : $default_profile}}" alt="">
                             </td>
                            <td class="py-4 px-6">
                                {{$product->product_name}}
                            </td>
                            <td class="py-4 px-6">
                                {{$product->actual_stock}}
                            </td>
                            <td class="py-4 px-6">
                                {{$product->stock_left}}
                            </td>
                            <td class="py-4 px-6">
                                {{$product->price}}
                            <td class="py-4 px-6">
                                {{$product->description}}
                            </td>

                            <td class="py-1 px-6">

                               <a href="{{ route('admin.products.edit', ['product' => $product->id]) }}" class="bg-cyan-700 text-white px-4 py-2 rounded">Edit</a>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mx-auto max-w-lg pt-6 p-4">
                    {{$products->links()}}
                </div>

            </div>
        </div>
    </div>
</div>
</x-admin-layout>

