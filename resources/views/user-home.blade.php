<x-home-layout>
    <div class="flex h-screen ">
        @include('components.user-sidebar')
        <div class="flex-1 overflow-y-scroll bg-custom">
            {{-- <div class="pt-12 pb-24 mx-auto max-w-7xl sm:px-6 lg:px-8"> --}}
                <div class="w-full pb-24">
                    @yield('content')
            </div>
        </div>
    </div>
</x-home-layout>
