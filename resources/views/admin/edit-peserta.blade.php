<x-admin-layout>
    <x-slot:title>Edit Peserta</x-slot:title>

    <div class="w-full max-w-xl p-5 px-10 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <form action="{{ route('edite.peserta', $peserta->id) }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="nama" class="block mb-1 font-medium">Nama</label>
                <input
                type="text" id="nama" name="nama" value="{{ $peserta->nama }}"
                oninput="this.value = this.value.toUpperCase()"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="no_sertif" class="block mb-1 font-medium">No. Sertifikat</label>
                <input
                type="text" id="no_sertif" name="no_sertif" value="{{ $peserta->no_sertif }}"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('no_sertif') border-red-500 @enderror">

                @error('no_sertif')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tema_pelatihan" class="block mb-1 font-medium">Tema Pelatihan</label>
                <input
                type="text" id="tema_pelatihan" name="tema_pelatihan" value="{{ $peserta->tema_pelatihan }}"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('tema_pelatihan') border-red-500 @enderror">

                @error('tema_pelatihan')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="setting_id" class="block mb-1 font-medium">Ceo:</label>
                <select
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('setting_id') border-red-500 @enderror"
                    name="setting_id" id="setting_id" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    @foreach ($settings as $setting )
                    <option value="{{ $setting->id }}">{{ $setting->ceo }}</option>
                    @endforeach
                </select>

                @error('tema_pelatihan')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-2">
                <button type="submit"
                    class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Simpan</button>
                <a href="#" class="px-4 py-2 text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">Batal</a>
            </div>
        </form>
    </div>
</x-admin-layout>
