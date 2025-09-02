<x-admin-layout>
    <x-slot:title>Edit Sertifikat</x-slot:title>

    <div class="w-full max-w-xl p-5 px-10 mx-auto mt-10 bg-white rounded-lg shadow-md">
        <form action="{{ route('save.ceo', $setting->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="ceo" class="block mb-1 font-medium">Ceo:</label>
                <input type="text" id="ceo" name="ceo" placeholder="Moh. Fadillah" value="{{ $setting->ceo }}"
                class="w-full px-3 py-2 border max-w-52 rounded-md focus:ring focus:ring-blue-200 @error('ceo') border-red-500 @enderror">

                @error('ceo')
                    <p class="text-sm text-red-500">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex gap-5">
                <div class="mb-4">
                    <label for="nama_pengajar" class="block mb-1 font-medium">Nama Pengajar:</label>
                    <input type="text" id="nama_pengajar" name="nama_pengajar" value="{{ $setting->nama_pengajar }}" placeholder="Kusnadi"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('nama_pengajar') border-red-500 @enderror">

                    @error('nama_pengajar')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="instansi_pengajar" class="block mb-1 font-medium">Instansi Pengajar:</label>
                    <input type="text" id="instansi_pengajar" name="instansi_pengajar" value="{{ $setting->instansi_pengajar }}" placeholder="Kominfo"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('instansi_pengajar') border-red-500 @enderror">

                    @error('instansi_pengajar')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-5">
                <div class="mb-4">
                    <label for="tempat" class="block mb-1 font-medium">Tempat:</label>
                    <input type="text" id="tempat" name="tempat" value="{{ $setting->tempat }}" placeholder="Jakarta"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('tempat') border-red-500 @enderror">

                    @error('tempat')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="tanggal_sertifikat" class="block mb-1 font-medium">Tanggal Sertifikat:</label>
                    <input type="date" id="tanggal_sertifikat" value="{{ $setting->tanggal_sertifikat }}" name="tanggal_sertifikat"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('tanggal') border-red-500 @enderror">

                    @error('tanggal_sertifikat')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex gap-5">
                <div class="mb-4">
                    <label for="ttd_pimpinan" class="block mb-1 font-medium">Ttd Pimpinan:</label>
                    <input type="file" id="ttd_pimpinan" name="ttd_pimpinan"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('ttd_pimpinan') border-red-500 @enderror">

                    @error('ttd_pimpinan')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="ttd_pengajar" class="block mb-1 font-medium">Ttd Pengajar:</label>
                    <input type="file" id="ttd_pengajar" name="ttd_pengajar"
                    class="w-full px-3 py-2 border rounded-md focus:ring focus:ring-blue-200 @error('ttd_pengajar') border-red-500 @enderror">

                    @error('ttd_pengajar')
                        <p class="text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
            </div>


            <div class="flex gap-2">
                <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</x-admin-layout>
