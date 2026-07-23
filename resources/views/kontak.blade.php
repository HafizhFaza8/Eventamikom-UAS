<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak - AmikomEventHub</title>
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
                    <a href="/katalog" class="text-gray-500 hover:text-teal-600 transition">Katalog</a>
                    <a href="/bantuan" class="text-gray-500 hover:text-teal-600 transition">Bantuan</a>
                    <a href="/kontak" class="text-teal-600 border-b-2 border-teal-600 pb-1">Kontak</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-4xl mx-auto px-4 py-16">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 flex flex-col md:flex-row overflow-hidden">
            
            <div class="bg-teal-600 p-10 md:w-2/5 text-white flex flex-col justify-between">
                <div>
                    <h2 class="text-3xl font-bold mb-2">Hubungi Kami</h2>
                    <p class="text-teal-100 mb-8">Ini adalah Halaman Kontak. Jangan ragu menyapa tim kami!</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">📧</div>
                            <div>
                                <p class="text-xs text-teal-200 uppercase tracking-wider">Email</p>
                                <p class="font-medium">admin@eventhub.com</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-4">
                            <div class="text-2xl">📞</div>
                            <div>
                                <p class="text-xs text-teal-200 uppercase tracking-wider">Telepon</p>
                                <p class="font-medium">+62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="p-10 md:w-3/5">
                <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
                <form class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Nama Anda">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pesan</label>
                        <textarea rows="4" class="w-full border border-gray-300 rounded-lg px-4 py-2" placeholder="Tuliskan pesan Anda..."></textarea>
                    </div>
                    <button type="button" class="w-full bg-gray-900 text-white font-semibold py-3 rounded-lg hover:bg-gray-800 transition">Kirim Pesan</button>
                </form>
            </div>

        </div>
    </main>

</body>
</html>