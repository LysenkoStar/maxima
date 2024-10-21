<x-app-layout>
    @section('extended_scripts')
        @parent
        @vite([ 'resources/js/dashboard/categories/form.js' ])
    @stop

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($category) ? __('dashboard/categories/form.Update category') : __('dashboard/categories/form.Create category') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials/validation')

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-sm font-medium text-gray-500">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(isset($category))
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
                                            {{ __('dashboard/services/form.Title') }}
                                        </label>

                                        <input type="text"
                                               id="name_{{$key}}"
                                               name="name[{{$key}}]"
                                               value="{{ old('name.'.$key, isset($category) ? optional($category)->getTranslation('name', $key) : null) }}"
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
                                            {{ __('dashboard/services/form.Description') }}
                                        </label>
                                        <textarea id="description_{{$key}}"
                                                  name="description[{{$key}}]"
                                                  data-language="{{$key}}"
                                                  class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ckeditor">{{ old('description.'.$key, isset($category) ? optional($category)->getTranslation('description', $key) : '') }}</textarea>

                                        @error("description.$key")
                                        <small class="text-accent-500 font-montserrat italic">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>

                                </div>
                            @endforeach
                        </div>

                        <!-- Image Field -->
                        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-2">
                            <!-- Image preview -->
                            <div class="col-span-1">
                                <label for="imagePreview" class="block text-sm font-medium text-gray-700">
                                    {{ __('dashboard/services/form.Preview') }}
                                </label>
                                <div class="image_container w-80 h-80 flex justify-center items-center">
                                    <img id="imagePreview"
                                         class="aspect-square object-contain"
                                         src="{{ isset($category) ? $category->getImageUrl() : \App\Models\ProductCategory::getDefaultImageUrl() }}"
                                         alt="default product image"
                                         draggable="false" />
                                </div>
                            </div>

                            <div class="col-span-2">
                                <label for="image" class="block text-sm font-medium text-gray-700">
                                    {{ __('dashboard/services/form.Image') }}
                                </label>
                                <input type="file"
                                       id="image"
                                       name="image"
                                       accept="image/*"
                                       class="mt-1 p-2 block w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                @error("image")
                                <small class="text-accent-500 font-montserrat italic">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                        </div>

                        <!-- Slug Field (Disabled) -->
                        <div class="mb-2">
                            <label for="slug" class="block text-sm font-medium text-gray-700">
                                {{ __('dashboard/services/form.Slug') }}
                            </label>
                            <input type="text"
                                   id="slug"
                                   disabled
                                   value="{{ old('slug', isset($category) ? optional($category)->slug : null) }}"
                                   data-route="{{ route("dashboard.category.create.slug") }}"
                                   class="mt-1 p-2 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50">

                            <input type="hidden"
                                   id="slug_hidden"
                                   name="slug"
                                   value="{{ old('slug', isset($category) ? optional($category)->slug : null) }}">

                            @error("slug")
                            <small class="text-accent-500 font-montserrat italic">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>

                        <!-- Status Field -->
                        <div class="mb-4">
                            <label for="status" class="block text-sm font-medium text-gray-700">
                                {{ __('dashboard/services/form.Status') }}
                            </label>
                            <select id="status"
                                    name="status"
                                    class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                <option value="1"
                                    @selected(old('status', isset($category) ? optional($category)->status : null) === 1)>
                                    {{ __('dashboard/services/form.Active') }}
                                </option>
                                <option value="0"
                                    @selected(old('status', isset($category) ? optional($category)->status : null) === 0)>
                                    {{ __('dashboard/services/form.Inactive') }}
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
