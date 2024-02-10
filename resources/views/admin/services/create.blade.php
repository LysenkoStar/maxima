<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Services') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="" method="post">
                    @csrf

                    <div class="container">
                        <ul class="nav flex justify-start space-x-2 text-sm font-medium text-gray-500 flex-wrap pl-0 border-b border-gray-100">
                            <li class="hover:text-gray-700">
                                <a href="#"
                                   x-on:click="activeTab = 1" :class="activeTab === 1 ? activeClass : inactiveClass"
                                   class="-mb-[1px] border border-transparent rounded-t">
                                    Tab 1
                                </a>
                            </li>
                            <li class="hover:text-gray-700">
                                <a href="#" x-on:click="activeTab = 2" :class="activeTab === 2 ? activeClass : inactiveClass">Tab 2</a>
                            </li>
                            <li class="hover:text-gray-700">
                                <a href="#" x-on:click="activeTab = 3" :class="activeTab === 3 ? activeClass : inactiveClass">Tab 3</a>
                            </li>
                        </ul>
                        <div class="mt-6 bg-white text-accent-500">
                            <div x-show="activeTab === 1"> Tab 1 Content show...  </div>
                            <div x-show="activeTab === 2">Tab 2 Content show ...</div>
                            <div x-show="activeTab === 3">Tab 3 Content show ...</div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
