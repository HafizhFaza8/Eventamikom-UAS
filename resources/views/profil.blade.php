<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 font-sans text-gray-800">

    <nav class="bg-white/80 backdrop-blur-md border-b border-gray-200 sticky top-0 z-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="/" class="text-2xl font-extrabold text-teal-600 tracking-tight">EventHub.</a>
                <div class="hidden md:flex space-x-8 font-medium text-sm">
                    <a href="/" class="text-gray-500 hover:text-teal-600 transition">Home</a>
                    <a href="/profil" class="text-teal-600 border-b-2 border-teal-600 pb-1">Profil</a>
                    <a href="/katalog" class="text-gray-500 hover:text-teal-600 transition">Katalog</a>
                    <a href="/bantuan" class="text-gray-500 hover:text-teal-600 transition">Bantuan</a>
                    <a href="/kontak" class="text-gray-500 hover:text-teal-600 transition">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-12">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="h-48 bg-gradient-to-r from-teal-500 to-cyan-500"></div>
            
            <div class="relative px-8 pb-8">
                <div class="absolute -top-16 left-8 w-32 h-32 bg-white rounded-full p-2 shadow-md">
                    <div class="w-full h-full bg-gray-200 rounded-full flex items-center justify-center text-4xl">🧑‍🎓</div>
                </div>

                <div class="pt-20">
                    <div class="flex justify-between items-start">
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Bagus Nurgoho</h1>
                            <p class="text-teal-600 font-medium mt-1">NIM: 24.12.3328</p>
                        </div>
                        <button class="bg-gray-900 text-white px-4 py-2 rounded-lg text-sm font-medium hover:bg-gray-800 transition">Edit Profil</button>
                    </div>
                    
                    <div class="mt-8 border-t border-gray-100 pt-6">
                        <h3 class="text-lg font-bold text-gray-900 mb-2">Tentang Saya</h3>
                        <p class="text-gray-600 leading-relaxed max-w-2xl">
                            Mahasiswa yang antusias dalam mempelajari pengembangan web modern. Saat ini sedang fokus menguasai framework Laravel dan Tailwind CSS untuk membangun antarmuka pengguna yang interaktif dan responsif.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </main>

</body>
</html>