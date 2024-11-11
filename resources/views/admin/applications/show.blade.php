<x-app-layout>
    <x-slot name="header">
        <div class="header__block flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('dashboard/applications/form.application_no', ['number' => $application->id]) }}
            </h2>

            <!-- Delete Button -->
            <form action="{{ route('dashboard.application.delete', $application) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        title="{{ __('dashboard/general.button.delete') }}"
                        class="flex items-center border-accent-500 text-accent-500 inline-block rounded-lg px-4 py-2 font-montserrat text-sm border-[1px]">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-1">
                        <path fill-rule="evenodd" d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z" clip-rule="evenodd" />
                    </svg>
                    <span>{{ __('dashboard/general.button.delete') }}</span>
                </button>
            </form>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-sm font-medium text-gray-500">

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('dashboard/applications/form.field.name') }}:</label>
                        <p class="mt-1 text-gray-900">{{ $application->name }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('dashboard/applications/form.field.email') }}:</label>
                        <p class="mt-1 text-gray-900">
                            <a href="mailto:{{ $application->email }}">{{ $application->email }}</a>
                        </p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('dashboard/applications/form.field.phone') }}:</label>
                        <p class="mt-1 text-gray-900">
                            <a href="tel:{{ $application->phone }}">{{ $application->phone }}</a>
                        </p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('dashboard/applications/form.field.message') }}:</label>
                        <p class="mt-1 text-gray-900">{{ $application->message }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">{{ __('dashboard/applications/form.field.attach_files') }}:</label>
                        @if($application->media->count())
                            <ul class="mt-2 space-y-2">
                                @foreach($application->media as $media)
                                    <li class="flex items-center justify-between bg-gray-100 pl-2 rounded-md">
                                        <span class="truncate max-w-xs" title="{{ $media->file_name }}">{{ $media->file_name }}</span>
                                        <div class="flex items-center space-x-2">
                                            <a href="{{ route(name: 'media.download', parameters: $media->id) }}" class="flex items-center bg-orange-500 text-white px-3 py-2 hover:bg-orange-600 rounded-r-lg" title="{{ __('Download') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5 mr-1">
                                                    <path d="M3.375 3C2.339 3 1.5 3.84 1.5 4.875v.75c0 1.036.84 1.875 1.875 1.875h17.25c1.035 0 1.875-.84 1.875-1.875v-.75C22.5 3.839 21.66 3 20.625 3H3.375Z" />
                                                    <path fill-rule="evenodd" d="m3.087 9 .54 9.176A3 3 0 0 0 6.62 21h10.757a3 3 0 0 0 2.995-2.824L20.913 9H3.087ZM12 10.5a.75.75 0 0 1 .75.75v4.94l1.72-1.72a.75.75 0 1 1 1.06 1.06l-3 3a.75.75 0 0 1-1.06 0l-3-3a.75.75 0 1 1 1.06-1.06l1.72 1.72v-4.94a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                                                </svg>
                                                <span>{{ __('general.download') }}</span>
                                            </a>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-left">{{ __('dashboard/applications/form.missing_files') }}</p>
                        @endif

                    </div>
            </div>
        </div>
    </div>
</x-app-layout>
