<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-2xl font-extrabold text-teal-600 tracking-tight">EventHub.</a>
                <div class="hidden md:flex space-x-8 font-medium text-sm">
                    <a href="/" class="text-gray-500 hover:text-teal-600 transition">Home</a>
                    <a href="/profil" class="text-gray-500 hover:text-teal-600 transition">Profil</a>
                    <a href="/katalog" class="text-teal-600 border-b-2 border-teal-600 pb-1">Katalog</a>
                    <a href="/bantuan" class="text-gray-500 hover:text-teal-600 transition">Bantuan</a>
                    <a href="/kontak" class="text-gray-500 hover:text-teal-600 transition">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-12">
        <div class="flex justify-between items-end mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Katalog Event</h1>
                <p class="text-gray-500 mt-2">Daftar event terbaru yang bisa kamu ikuti.</p>
            </div>
            <button class="hidden sm:block bg-white border border-gray-300 text-gray-700 px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-50">Filter Event</button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg transition duration-300">
                <div class="h-48 bg-gray-200 relative">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-md text-xs font-bold text-gray-800">12 Mei 2024</div>
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-teal-600 uppercase tracking-wider">Workshop</span>
                    <h2 class="text-xl font-bold text-gray-900 mt-2 mb-2 group-hover:text-teal-600 transition">Mastering Laravel 11</h2>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">Pelajari fitur-fitur terbaru Laravel 11 dari dasar hingga implementasi API untuk project akhirmu.</p>
                    <a href="#" class="block text-center w-full bg-gray-50 border border-gray-200 text-gray-800 font-medium py-2 rounded-lg group-hover:bg-teal-600 group-hover:text-white group-hover:border-teal-600 transition">Detail Event</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg transition duration-300">
                <div class="h-48 bg-gray-200 relative">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-md text-xs font-bold text-gray-800">18 Mei 2024</div>
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-blue-600 uppercase tracking-wider">Seminar</span>
                    <h2 class="text-xl font-bold text-gray-900 mt-2 mb-2 group-hover:text-blue-600 transition">AI in Creative Industry</h2>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">Bagaimana kecerdasan buatan mengubah lanskap desain grafis dan pembuatan konten modern.</p>
                    <a href="#" class="block text-center w-full bg-gray-50 border border-gray-200 text-gray-800 font-medium py-2 rounded-lg group-hover:bg-blue-600 group-hover:text-white group-hover:border-blue-600 transition">Detail Event</a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden group hover:shadow-lg transition duration-300">
                <div class="h-48 bg-gray-200 relative">
                    <div class="absolute top-4 left-4 bg-white/90 backdrop-blur px-3 py-1 rounded-md text-xs font-bold text-gray-800">25 Mei 2024</div>
                </div>
                <div class="p-6">
                    <span class="text-xs font-semibold text-purple-600 uppercase tracking-wider">Kompetisi</span>
                    <h2 class="text-xl font-bold text-gray-900 mt-2 mb-2 group-hover:text-purple-600 transition">UI/UX Design Challenge</h2>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-2">Tantangan membuat desain antarmuka aplikasi finansial dalam waktu 48 jam.</p>
                    <a href="#" class="block text-center w-full bg-gray-50 border border-gray-200 text-gray-800 font-medium py-2 rounded-lg group-hover:bg-purple-600 group-hover:text-white group-hover:border-purple-600 transition">Detail Event</a>
                </div>
            </div>

        </div>
    </main>

</body>
</html>