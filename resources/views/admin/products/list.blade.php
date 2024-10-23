<x-app-layout>
    <x-slot name="header">
        <div class="header__block flex justify-between items-center	">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('dashboard/general.menu.products') }}
            </h2>
            <a class="border-accent-500 text-accent-500 inline-block rounded-lg px-4 py-2 font-montserrat text-sm border-[1px]" href="{{ route('dashboard.products.form') }}">
                {{ __('dashboard/general.button.create') }}
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- Example Product List -->
{{--                    <ul>--}}
{{--                        <!-- Product Item -->--}}
{{--                        <li class="flex items-center justify-between border-b border-gray-300 py-3">--}}
{{--                            <div class="flex items-center space-x-4">--}}
{{--                                <img src="{{ asset("images/categories/1.png") }}" alt="Product Image" class="h-16 w-16 rounded">--}}
{{--                                <div>--}}
{{--                                    <h3 class="text-lg font-semibold">Product Name 1</h3>--}}
{{--                                    <p class="text-gray-600">Short description of the product.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center space-x-4">--}}
{{--                                <p class="text-gray-600">Price: $100</p>--}}
{{--                                <p class="text-gray-600">In Stock: 50</p>--}}
{{--                                <p class="text-gray-600">Category: Electronics</p>--}}
{{--                                <p class="text-gray-600">Status: Active</p>--}}
{{--                                <a href="edit-product/1" class="text-blue-500 hover:underline">Edit</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}

{{--                        <!-- Repeat the above structure for each product -->--}}
{{--                        <!-- Product Item -->--}}
{{--                        <li class="flex items-center justify-between border-b border-gray-300 py-3">--}}
{{--                            <div class="flex items-center space-x-4">--}}
{{--                                <img src="{{ asset("images/categories/2.png") }}" alt="Product Image" class="h-16 w-16 rounded">--}}
{{--                                <div>--}}
{{--                                    <h3 class="text-lg font-semibold">Product Name 2</h3>--}}
{{--                                    <p class="text-gray-600">Short description of the product.</p>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="flex items-center space-x-4">--}}
{{--                                <p class="text-gray-600">Price: $150</p>--}}
{{--                                <p class="text-gray-600">In Stock: 30</p>--}}
{{--                                <p class="text-gray-600">Category: Clothing</p>--}}
{{--                                <p class="text-gray-600">Status: Inactive</p>--}}
{{--                                <a href="edit-product/2" class="text-blue-500 hover:underline">Edit</a>--}}
{{--                            </div>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                    <!-- End Product List -->--}}

{{--                    <!-- Example Product Table -->--}}
{{--                    <div class="overflow-x-auto">--}}
{{--                        <table class="min-w-full border border-gray-300">--}}
{{--                            <thead>--}}
{{--                            <tr>--}}
{{--                                <th class="py-2 px-4 border-b">Image</th>--}}
{{--                                <th class="py-2 px-4 border-b">Name</th>--}}
{{--                                <th class="py-2 px-4 border-b">Description</th>--}}
{{--                                <th class="py-2 px-4 border-b">Price</th>--}}
{{--                                <th class="py-2 px-4 border-b">In Stock</th>--}}
{{--                                <th class="py-2 px-4 border-b">Category</th>--}}
{{--                                <th class="py-2 px-4 border-b">Status</th>--}}
{{--                                <th class="py-2 px-4 border-b">Actions</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            <!-- Product Row -->--}}
{{--                            <tr>--}}
{{--                                <td class="py-2 px-4 border-b"><img src="product-image.jpg" alt="Product Image" class="h-12 w-12 rounded"></td>--}}
{{--                                <td class="py-2 px-4 border-b">Product Name 1</td>--}}
{{--                                <td class="py-2 px-4 border-b">Short description of the product.</td>--}}
{{--                                <td class="py-2 px-4 border-b">$100</td>--}}
{{--                                <td class="py-2 px-4 border-b">50</td>--}}
{{--                                <td class="py-2 px-4 border-b">Electronics</td>--}}
{{--                                <td class="py-2 px-4 border-b">Active</td>--}}
{{--                                <td class="py-2 px-4 border-b"><a href="edit-product/1" class="text-blue-500 hover:underline">Edit</a></td>--}}
{{--                            </tr>--}}

{{--                            <!-- Repeat the above structure for each product -->--}}
{{--                            <!-- Product Row -->--}}
{{--                            <tr>--}}
{{--                                <td class="py-2 px-4 border-b"><img src="product-image.jpg" alt="Product Image" class="h-12 w-12 rounded"></td>--}}
{{--                                <td class="py-2 px-4 border-b">Product Name 2</td>--}}
{{--                                <td class="py-2 px-4 border-b">Short description of the product. Short description of the product. Short description of the product.</td>--}}
{{--                                <td class="py-2 px-4 border-b">$150</td>--}}
{{--                                <td class="py-2 px-4 border-b">30</td>--}}
{{--                                <td class="py-2 px-4 border-b">Clothing</td>--}}
{{--                                <td class="py-2 px-4 border-b">Inactive</td>--}}
{{--                                <td class="py-2 px-4 border-b"><a href="edit-product/2" class="text-blue-500 hover:underline">Edit</a></td>--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                    <!-- End Product Table -->--}}

{{--                    <!-- Pagination -->--}}
{{--                    <div class="mt-4">--}}
{{--                        <ul class="flex space-x-2">--}}
{{--                            <li><a href="#" class="text-blue-500 hover:underline">1</a></li>--}}
{{--                            <li><a href="#" class="text-blue-500 hover:underline">2</a></li>--}}
{{--                            <li><a href="#" class="text-blue-500 hover:underline">3</a></li>--}}
{{--                            <!-- Add more pages as needed -->--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <!-- End Pagination -->--}}

                    <ul class="space-y-4">
{{--                        @foreach($products as $product)--}}
                            <li class="flex items-center justify-between p-4 bg-white shadow-sm rounded-lg border border-gray-200">
                                <div class="flex items-center space-x-4">
                                    <!-- Главное изображение товара -->
                                    <img src="{{ asset("images/categories/1.png") }}" alt="Test" class="w-16 h-16 object-cover rounded-lg">

                                    <div>
                                        <!-- Название товара -->
                                        <h3 class="text-lg font-semibold text-gray-900">Test</h3>

                                        <!-- Название категории -->
                                        <p class="text-sm text-gray-500">Категория №1</p>

                                        <!-- Короткое описание товара -->
                                        <p class="text-sm text-gray-600">Test desct</p>

                                        <!-- Статус товара -->
                                        <p class="text-sm font-semibold {{ true ? 'text-green-500' : 'text-red-500' }}">
                                            {{ true ? 'Активный' : 'Не активный' }}
                                        </p>
                                    </div>
                                </div>

                                <!-- Дополнительные действия, если необходимы -->
                                <div class="flex space-x-2">
                                    <!-- Кнопка редактирования -->
                                    <a href="#"
                                       class="px-4 py-2 bg-blue-500 hover:bg-blue-400 text-white text-sm font-semibold rounded-lg shadow">
                                        Редактировать
                                    </a>

                                    <!-- Кнопка удаления -->
                                    <form action="#" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-4 py-2 bg-red-500 hover:bg-red-400 text-white text-sm font-semibold rounded-lg shadow">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
                            </li>
{{--                        @endforeach--}}
                    </ul>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
