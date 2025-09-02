<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sertifikat Saya</title>
    @vite('resources/css/app.css')
</head>
<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">

    <div class="w-full max-w-[1300px] flex justify-between items-center bg-white shadow-md px-6 py-4 mb-4">
        <a href="{{ route('back.sertifikat') }}" class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
            Back
        </a>
        <button onclick="downloadCertificate()" class="px-4 py-2 text-white bg-green-500 rounded-lg hover:bg-green-600">
            Download Sertifikat
        </button>
    </div>

    {{-- section sertifikat --}}
    <div id="certificate" class="flex items-center justify-center w-full bg-white shadow-2xl h-[1000px] max-w-[1300px] bg-no-repeat">
        <div class="relative flex flex-col items-center justify-center w-full h-full text-center bg-center bg-cover rounded-lg"
            style="background-image: url('{{ asset('img/sertif.png') }}');">

            <!-- Judul Sertifikat -->
            <p class="mt-2 text-lg text-gray-700 font-quicksand font-semibold">No. Sertifikat: <span class="font-semibold">{{ $peserta->no_sertif }}</span></p>
            <div>
                <h1 class="mt-2 text-5xl font-extrabold uppercase fotext-gray-800 ">Sertifikat Penghargaan</h1>
            </div>


            <!-- Detail Pelatihan -->
            <div class="mt-10">
                <h1 class="text-lg font-extrabold uppercase font-quicksand">Dengan Bangga Di Berikan Kepada:</h1>
                <p class="mt-5 text-5xl font-medium font-country">{{ $peserta->nama }}</p>
                <hr class="border-t-2 mt-3 border-black">
            </div>

            <p class="mt-6 text-lg text-gray-600 ">

                <div class="flex gap-1 items-center">
                    <h1 class="text-xl font-semibold uppercase font-quicksand">Sebagai :</h1>
                    <p class="font-quicksand text-xl font-semibold uppercase">Peserta</p>
                </div>
                <div class="font-quicksand text-xl font-semibold">
                    Diberikan di <span class="font-semibold">{{ $peserta->setting->tempat }}</span>,
                    {{ \Carbon\Carbon::parse($peserta->setting->tanggal_sertifikat)->format('d F Y') }}
                </div>
            </p>

            <div class="py-10">
                <p class="text-lg font-medium text-gray-700 text-center w-full max-w-4xl font-quicksand">
                    Sertifikat ini diberikan kepada <span class="font-bold">{{ $peserta->nama }}</span>
                    Sebagai peserta dalam event <span class="font-medium">{{ $peserta->tema_pelatihan }}</span>
                    Yang diselenggarakan pada <span class="font-medium">{{ \Carbon\Carbon::parse($peserta->setting->tanggal_sertifikat)->format('d F Y') }}</span>
                    Dalam program <span class="font-medium">{{ $peserta->setting->instansi_pengajar }}</span>
                </p>

            </div>

            <!-- Lokasi & Tanggal -->



            <!-- Tanda Tangan -->
            <div class="flex w-full px-10 mt-12 justify-evenly">
                <div class="text-center">
                    <img src="{{ asset('storage/' . $peserta->setting->ttd_pimpinan) }}" class="h-20 mx-auto" alt="Tanda Tangan Pimpinan">
                    <p class="mt-2 font-medium text-gray-700">Pimpinan</p>
                    <hr class="border-t-2 mt-3 border-black">
                    <p class="font-semibold">{{ $peserta->setting->ceo }}</p>
                </div>
                <div class="text-center">
                    <img src="{{ asset('storage/' . $peserta->setting->ttd_pengajar) }}" class="h-20 mx-auto" alt="Tanda Tangan Pengajar">
                    <p class="mt-2 font-medium text-gray-700">Pengajar</p>
                    <hr class="border-t-2 mt-3 border-black">
                    <p class="font-semibold">{{ $peserta->setting->nama_pengajar }}</p>
                </div>
            </div>

        </div>
    </div>



    <script>

        function downloadCertificate() {
            html2canvas(document.getElementById("certificate")).then(canvas => {
                let link = document.createElement("a");
                link.download = "sertifikat.png";
                link.href = canvas.toDataURL("image/png");
                link.click();
            });
        }
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</body>
</html>
