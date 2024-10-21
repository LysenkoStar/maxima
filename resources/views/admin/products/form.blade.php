<x-app-layout>
    @section('extended_scripts')
        @parent
        @vite([ 'resources/js/dashboard/products/form.js' ])
    @stop

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($product) ? __('dashboard/products/form.Update product') : __('dashboard/products/form.Create product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials/validation')

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-sm font-medium text-gray-500">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(isset($product))
                        @method('PUT')
                    @endif

                    <div class="container">
                        <div x-data="{ tab: '{{ app()->getLocale() }}' }">
                            <!-- Tabs -->
                            <nav class="flex flex-wrap pl-0 border-b mb-5" role="tablist">
                                @foreach(config('app.available_locales') as $key => $locale)
                                    <button type="button"
                                            id="tab-{{$key}}"
                                            role="tab"
                                            data-toggle="tab"
                                            data-locale="{{ $key }}"
                                            aria-controls="{{ $key }}"
                                            x-bind:class="{ 'active': tab === '{{$key}}' }"
                                            @click="tab = '{{$key}}'"
                                            class="block mb-[-1px] px-2 py-4 border-[1px] border-transparent rounded-t text-sm font-medium leading-5 text-gray-500 [&.active]:border-x-gray-200 [&.active]:border-t-gray-200 [&.active]:text-gray-700 [&.active]:border-b-white hover:border-x-gray-200 hover:border-t-gray-200">
                                        {{ __('dashboard/general.languages.' . $locale) }}
                                    </button>
                                @endforeach
                            </nav>
                            <!-- Tab Contents -->
                            @foreach(config('app.available_locales') as $key => $locale)
                                <div x-show="tab === '{{$key}}'" id="{{ $key }}" role="tabpanel" aria-labelledby="tab-{{ $key }}">

                                    <!-- Name Field -->
                                    <div class="mb-2">
                                        <label for="name_{{$key}}"
                                               class="block text-sm font-medium text-gray-700">
                                            {{ __('dashboard/products/form.Title') }}
                                        </label>

                                        <input type="text"
                                               id="name_{{$key}}"
                                               name="name[{{$key}}]"
                                               value="{{ old('name.'.$key, isset($product) ? optional($product)->getTranslation('name', $key) : null) }}"
                                               class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                        @error("name.$key")
                                            <small class="text-accent-500 font-montserrat italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>

                                    <!-- Description Field -->
                                    <div class="mb-2">
                                        <label for="description_{{$key}}"
                                               class="block text-sm font-medium text-gray-700">
                                            {{ __('dashboard/products/form.Description') }}
                                        </label>
                                        <textarea id="description_{{$key}}"
                                                  name="description[{{$key}}]"
                                                  data-language="{{$key}}"
                                                  class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ckeditor">{{ old('description.'.$key, isset($product) ? optional($product)->getTranslation('description', $key) : '') }}</textarea>

                                        @error("description.$key")
                                            <small class="text-accent-500 font-montserrat italic">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <!-- Category Field -->
                        <div class="mb-4">
                            <label for="product_category_id" class="block text-sm font-medium text-gray-700 mb-2">
                                {{ __('dashboard/products/form.Category') }}
                            </label>
                            <select id="product_category_id"
                                    name="product_category_id"
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @if($categories)
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                            @error("product_category_id")
                                <small class="text-accent-500 font-montserrat italic">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!-- Image Field -->
{{--                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-2">--}}
{{--                            <!-- Image preview -->--}}
{{--                            <div class="col-span-1">--}}
{{--                                <label for="imagePreview" class="block text-sm font-medium text-gray-700">--}}
{{--                                    {{ __('dashboard/products/form.Preview') }}--}}
{{--                                </label>--}}
{{--                                <div class="image_container w-80 h-80 flex justify-center items-center">--}}
{{--                                    <img id="imagePreview"--}}
{{--                                         class="aspect-square object-contain"--}}
{{--                                         src="{{ isset($product) ? $product->getImageUrl() : \App\Models\Service::getDefaultImageUrl() }}"--}}
{{--                                         alt="default product image"--}}
{{--                                         draggable="false" />--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="col-span-2">--}}
{{--                                <label for="image" class="block text-sm font-medium text-gray-700">--}}
{{--                                    {{ __('dashboard/services/form.Image') }}--}}
{{--                                </label>--}}
{{--                                <input type="file"--}}
{{--                                       id="image"--}}
{{--                                       name="image"--}}
{{--                                       accept="image/*"--}}
{{--                                       class="mt-1 p-2 block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">--}}

{{--                                @error("image")--}}
{{--                                <small class="text-accent-500 font-montserrat italic">--}}
{{--                                    {{ __('dashboard/validation.'.$message) }}--}}
{{--                                </small>--}}
{{--                                @enderror--}}
{{--                            </div>--}}
{{--                        </div>--}}


{{--                        <div x-data="{ images: [] }" class="p-4">--}}
{{--                            <!-- Image Upload and Preview -->--}}
{{--                            <input type="file"--}}
{{--                                   multiple--}}
{{--                                   @change="images = Array.from($event.target.files)"--}}
{{--                                   id="upload_files"--}}
{{--                                   class="mb-4">--}}
{{--                            <div x-show="images.length > 0" id="sortable-list" class="grid grid-cols-6 gap-4 mb-4">--}}
{{--                                <template x-for="(image, index) in images" :key="index">--}}
{{--                                    <div class="w-32 h-32 bg-gray-200 p-2 border">--}}
{{--                                        <img :src="URL.createObjectURL(image)" class="w-full h-full object-cover" draggable="true">--}}
{{--                                    </div>--}}
{{--                                </template>--}}
{{--                            </div>--}}

                            <!-- Sortable List -->
{{--                            <div id="sortable-list" class="flex flex-col">--}}
{{--                                <template x-for="(image, index) in images" :key="index">--}}
{{--                                    <div class="border p-2" draggable="true" x-text="image.name"></div>--}}
{{--                                </template>--}}
{{--                            </div>--}}
{{--                        </div>--}}









                        <section class="image__upload">
                            <div class="image__upload-input">
                                <!-- Image Upload -->
                                <input type="file"
                                       id="imageUpload"
                                       name="images[]"
                                       multiple
                                       class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0
                                        file:text-sm file:font-semibold file:bg-violet-50 file:text-accent-500 hover:file:bg-accent-100 mb-2"/>
                            </div>
                            <div class="image__upload-preview hidden">
                                <!-- Image Preview -->
                                <span>{{ __('dashboard/products/form.Preview') }}</span>
                                <div class="w-full border-dashed border-2 rounded mb-2 p-2">
                                    <div id="imagePreview" class="grid grid-cols-5 gap-2 min-h-[210px]">
                                    </div>
                                </div>
                            </div>
                            @error("images.*")
                                <small class="text-accent-500 font-montserrat italic">
                                    {{ $message }}
                                </small>
                            @enderror
                        </section>

                        <!-- Slug Field (Disabled) -->
                        <div class="mb-2">
                            <label for="slug" class="block text-sm font-medium text-gray-700">
                                {{ __('dashboard/products/form.Slug') }}
                            </label>
                            <input type="text"
                                   id="slug"
                                   disabled
                                   value="{{ old('slug', isset($product) ? optional($product)->slug : null) }}"
                                   data-route="{{ route("dashboard.products.create.slug") }}"
                                   class="mt-1 p-2 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50">

                            <input type="hidden"
                                   id="slug_hidden"
                                   name="slug"
                                   value="{{ old('slug', isset($product) ? optional($product)->slug : null) }}">

                            @error("slug")
                                <small class="text-accent-500 font-montserrat italic">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">
                                {{ __('dashboard/products/form.Status') }}
                            </label>
                            <select id="status"
                                    name="status"
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="1"
                                    @selected(old('status', isset($product) ? optional($product)->status : null) === 1)>
                                    {{ __('dashboard/products/form.Active') }}
                                </option>
                                <option value="0"
                                    @selected(old('status', isset($product) ? optional($product)->status : null) === 0)>
                                    {{ __('dashboard/products/form.Inactive') }}
                                </option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit"
                                class="border-accent-500 text-accent-500 inline-block rounded-lg px-4 py-2 font-montserrat text-sm border-[1px]">
                            {{ __("dashboard/general.buttons.Save") }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
