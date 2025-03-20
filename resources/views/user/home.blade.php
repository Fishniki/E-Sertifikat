<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Akses Sertifikat</title>
</head>

<body class="flex flex-col items-center justify-center min-h-screen bg-gray-100">

    <!-- Navbar -->
    <div class="fixed top-0 left-0 w-full bg-white shadow-md px-6 py-4 flex justify-between items-center">
        <p class="font-bebas text-xl">{{ Auth::user()->name }}</p>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="px-4 py-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                Logout
            </button>
        </form>
    </div>

    <!-- Tambahkan padding-top agar konten tidak tertutup navbar -->
    <div class="pt-20 w-full max-w-xl p-8 bg-white shadow-lg rounded-lg">
        <h1 class="mb-6 text-2xl font-bold text-center text-gray-800 font-serif">
            Akses Sertifikat Anda
        </h1>

        <form action="{{ route('search.sertifikat') }}" method="POST">
            @csrf
            <!-- Input Nama -->
            <div class="mb-4">
                <label for="nama" class="block mb-2 text-lg font-semibold font-quicksand text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama" id="nama" placeholder="John Doe"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 uppercase"
                    oninput="this.value = this.value.toUpperCase()">
                <p class="mt-2 text-sm italic text-gray-600">
                    Masukkan nama lengkap Anda untuk mengakses sertifikat.
                </p>
            </div>

            <!-- Tombol Submit -->
            <button type="submit"
                class="w-full py-3 text-lg font-semibold text-white transition bg-blue-600 rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                Akses Sertifikat
            </button>
        </form>
    </div>

</body>

</html>
