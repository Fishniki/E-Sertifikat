<x-admin-layout>
    <x-slot:title>Lisensi Sertifikat</x-slot:title>

    <div class="max-w-6xl mx-auto mt-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($ceos as $ceo)
                <div class="bg-white shadow-lg rounded-lg p-5 border border-gray-200 mx-10">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $ceo->nama_pengajar }}</h3>
                    <p class="text-gray-600 text-sm">CEO: {{ $ceo->ceo }}</p>
                    <p class="text-gray-600 text-sm">Instansi: {{ $ceo->instansi_pengajar }}</p>
                    <p class="text-gray-600 text-sm">Tempat: {{ $ceo->tempat }}</p>
                    <p class="text-gray-600 text-sm">Tanggal: {{ $ceo->tanggal_sertifikat }}</p>

                    <div class="mt-4 flex justify-between">
                        <a href="{{ route('edit.ceo', $ceo->id) }}" class="px-4 py-2 bg-blue-500 text-white text-sm rounded-md hover:bg-blue-600">
                            Edit
                        </a>
                        <form action="#" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm rounded-md hover:bg-red-600">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</x-admin-layout>
