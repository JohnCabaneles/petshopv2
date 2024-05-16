<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            Hello, {{ Auth::user()->name }}
        </h2>
    </x-slot>

    <div class="flex h-screen">
        @if(Auth::user()->role === 'user')
            <!-- No sidebar for users -->
            <div class="flex-1 overflow-y-scroll">
                <div class="pt-12 pb-24">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div>
                            <div class="p-6 text-gray-900">
                                <div>
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <!-- Sidebar for admin role -->
            @include('components.sidebar')
            <div class="flex-1 overflow-y-scroll">
                <div class="pt-12 pb-24">
                    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                        <div>
                            <div class="p-6 text-gray-900">
                                <div>
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-app-layout>
