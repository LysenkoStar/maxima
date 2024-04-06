<x-app-layout>
    @section('extended_scripts')
        @parent
        @vite([ 'resources/js/dashboard/services/form.js' ])
    @stop

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ isset($service) ? __('dashboard/services/form.Update service') : __('dashboard/services/form.Create service') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @include('partials/validation')

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-sm font-medium text-gray-500">
                <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    @if(isset($service))
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
                                        <label for="title_{{$key}}"
                                               class="block text-sm font-medium text-gray-700">
                                            {{ __('dashboard/services/form.Title') }}
                                        </label>

                                        <input type="text"
                                               id="title_{{$key}}"
                                               name="title[{{$key}}]"
                                               value="{{ old('title.'.$key, isset($service) ? optional($service)->getTranslation('title', $key) : null) }}"
                                               class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

                                        @error("title.$key")
                                            <small class="text-accent-500 font-montserrat italic">
                                                {{ __('dashboard/validation.'.$message) }}
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
                                                  class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ckeditor">{{ old('description.'.$key, isset($service) ? optional($service)->getTranslation('description', $key) : '') }}</textarea>

                                        @error("description.$key")
                                            <small class="text-accent-500 font-montserrat italic">
                                                {{ __('dashboard/validation.'.$message) }}
                                            </small>
                                        @enderror
                                    </div>

                                    <!-- Short description Field -->
                                    <div class="mb-2">
                                        <label for="short_description_{{$key}}"
                                               class="block text-sm font-medium text-gray-700">
                                            {{ __('dashboard/services/form.Short Description') }}
                                        </label>
                                        <textarea id="short_description_{{$key}}"
                                                  name="short_description[{{$key}}]"
                                                  data-language="{{$key}}"
                                                  class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ckeditor">{{ old('short_description.'.$key, isset($service) ? optional($service)->getTranslation('short_description', $key) : null) }}</textarea>

                                        @error("short_description.$key")
                                            <small class="text-accent-500 font-montserrat italic">
                                                {{ __('dashboard/validation.'.$message) }}
                                            </small>
                                        @enderror
                                    </div>

                                    <!-- Text Field -->
                                    <div class="mb-2">
                                        <label for="text_{{$key}}"
                                               class="block text-sm font-medium text-gray-700">
                                            {{ __('dashboard/services/form.Text') }}
                                        </label>
                                        <textarea id="text_{{$key}}"
                                                  name="text[{{$key}}]"
                                                  data-language="{{$key}}"
                                                  class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 ckeditor">{{ old('text.'.$key, isset($service) ? optional($service)->getTranslation('text', $key) : null) }}</textarea>

                                        @error("text.$key")
                                            <small class="text-accent-500 font-montserrat italic">
                                                {{ __('dashboard/validation.'.$message) }}
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
                                         src="{{ isset($service) ? $service->getImageUrl() : \App\Models\Service::getDefaultImageUrl() }}"
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
                                        {{ __('dashboard/validation.'.$message) }}
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
                                   value="{{ old('slug', isset($service) ? optional($service)->slug : null) }}"
                                   data-route="{{ route("dashboard.services.create.slug") }}"
                                   class="mt-1 p-2 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50">

                            <input type="hidden"
                                   id="slug_hidden"
                                   name="slug"
                                   value="{{ old('slug', isset($service) ? optional($service)->slug : null) }}">

                            @error("slug")
                                <small class="text-accent-500 font-montserrat italic">
                                    {{ __('dashboard/validation.'.$message) }}
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
                                    @selected(old('status', isset($service) ? optional($service)->status : null) === 1)>
                                        {{ __('dashboard/services/form.Active') }}
                                </option>
                                <option value="0"
                                    @selected(old('status', isset($service) ? optional($service)->status : null) === 0)>
                                        {{ __('dashboard/services/form.Inactive') }}
                                </option>
                            </select>
                        </div>

                        <!-- Option Fields -->
                        <div class="mb-4">
                            <div class="flex items-center">
                                <label class="relative cursor-pointer flex items-center">
                                    <input id="switch" type="checkbox" name="products_link" class="peer sr-only" {{ old('products_link', isset($service) ? optional($service)->products_link : false) ? 'checked' : '' }} />
                                    <label for="switch" class="font-medium text-gray-900"></label>
                                    <div class="peer h-6 w-11 rounded-full border bg-slate-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-accent-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-green-300"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">{{ __('dashboard/services/form.Show products button') }}</span>
                                </label>
                                <span class="ml-2 inline-flex items-center cursor-pointer">
                                  <span class="group relative">
                                    <div class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block w-auto z-10">
                                      <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white w-40">
                                        {{ __('dashboard/services/form.Show products button help') }}
                                        <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                            <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                        </svg>
                                      </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                      <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                    </svg>
                                  </span>
                                </span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <div class="flex items-center">
                                <label class="relative cursor-pointer flex items-center">
                                    <input id="switch" type="checkbox" name="applications_link" class="peer sr-only" {{ old('applications_link', isset($service) ? optional($service)->applications_link : false) ? 'checked' : '' }} />
                                    <label for="switch" class="font-medium text-gray-900"></label>
                                    <div class="peer h-6 w-11 rounded-full border bg-slate-200 after:absolute after:left-[2px] after:top-0.5 after:h-5 after:w-5 after:rounded-full after:border after:border-gray-300 after:bg-white after:transition-all after:content-[''] peer-checked:bg-accent-500 peer-checked:after:translate-x-full peer-checked:after:border-white peer-focus:ring-green-300"></div>
                                    <span class="ml-3 text-sm font-medium text-gray-700">{{ __('dashboard/services/form.Show order button') }}</span>
                                </label>
                                <span class="ml-2 inline-flex items-center cursor-pointer">
                                  <span class="group relative">
                                    <div class="absolute bottom-[calc(100%+0.5rem)] left-[50%] -translate-x-[50%] hidden group-hover:block">
                                      <div class="bottom-full right-0 rounded bg-black px-4 py-1 text-xs text-white w-40">
                                        {{ __('dashboard/services/form.Show order button help') }}
                                        <svg class="absolute left-0 top-full h-2 w-full text-black" x="0px" y="0px" viewBox="0 0 255 255" xml:space="preserve">
                                            <polygon class="fill-current" points="0,0 127.5,127.5 255,0" />
                                        </svg>
                                      </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                      <path fill-rule="evenodd" d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z" clip-rule="evenodd" />
                                    </svg>
                                  </span>
                                </span>
                            </div>
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
