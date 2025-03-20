<div class="w-full bg-gray-100 shadow">
    <div class="flex items-center justify-between px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{ $slot }}</h1>
        <span class="font-thin uppercase text-gray-950">{{ Auth::guard('admin')->user()->name }}</span>
        {{-- fungsi $slot adalah mengambil data dari tengah components seperti ini =><x-header >Home Page</x-header > --}}
    </div>
</div>
