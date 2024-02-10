<x-app-layout>
    <x-slot name="header">
        <div class="header__block flex justify-between items-center	">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Services') }}
            </h2>
            <a class="border-accent-500 text-accent-500 inline-block rounded-lg px-4 py-2 font-montserrat text-sm border-[1px]" href="{{ route('dashboard.services.create') }}">
                Создать
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    Test 2
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
