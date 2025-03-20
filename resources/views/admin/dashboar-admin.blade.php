<x-admin-layout>
    <x-slot:title>Dashboard Admin</x-slot:title>

    <div class="p-5">
        <div class="mb-4">
            <a href="{{ route("tambah.peserta") }}" class="px-4 py-2 font-semibold text-white bg-blue-500 rounded-md hover:bg-blue-600">
                Tambah Peserta
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded-lg shadow-md">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr class="border-b">
                        <th class="px-4 py-2 text-left">Nama</th>
                        <th class="px-4 py-2 text-left">No. Sertifikat</th>
                        <th class="px-4 py-2 text-left">Tema Pelatihan</th>
                        <th class="px-4 py-2 text-left">Ceo</th>
                        <th class="px-4 py-2 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pesertas as $peserta)
                    <tr class="border-b hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $peserta->nama }}</td>
                            <td class="px-4 py-2">{{ $peserta->no_sertif }}</td>
                            <td class="px-4 py-2">{{ $peserta->tema_pelatihan }}</td>
                            <td class="px-4 py-2">{{ $peserta->setting->ceo }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route("edit.peserta", $peserta->id) }}" class="px-3 py-1 text-white bg-yellow-500 rounded-md hover:bg-yellow-600">Edit</a>
                                <form action="{{ route('delete.peserta', $peserta->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE') <!-- Gunakan DELETE method -->
                                    <button type="submit" class="px-3 py-1 text-white bg-red-500 rounded-md hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>

                            </td>
                    </tr>
                    @empty
                    <p>Data Kosong</p>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin-layout>
