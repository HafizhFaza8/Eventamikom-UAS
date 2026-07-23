<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Utama
        \App\Models\User::create([
            'name' => 'Admin Amikom',
            'email' => 'admin@amikom.ac.id',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        // 2. Eksperimen: 3 Kategori Berbeda
        $catIT = \App\Models\Category::create(['name' => 'IT & Software', 'slug' => 'it-software']);
        $catDesign = \App\Models\Category::create(['name' => 'UI/UX Design', 'slug' => 'uiux-design']);
        $catEsport = \App\Models\Category::create(['name' => 'E-Sport', 'slug' => 'e-sport']);

        // 3. Eksperimen: 6 Event Berbeda
        $events = [
            [
                'category_id' => $catIT->id,
                'title' => 'Hackathon Unleash 2026',
                'description' => 'Kompetisi coding 24 jam untuk menciptakan solusi inovatif.',
                'date' => '2026-06-15 08:00:00',
                'location' => 'Inkubator Amikom',
                'price' => 0,
                'stock' => 50,
                'poster_path' => 'posters/event-1.png',
            ],
            [
                'category_id' => $catDesign->id,
                'title' => 'UI/UX Masterclass',
                'description' => 'Belajar desain produk digital dari industri profesional.',
                'date' => '2026-07-10 10:00:00',
                'location' => 'Cinema Unit 6',
                'price' => 75000,
                'stock' => 120,
                'poster_path' => 'posters/event-2.png',
            ],
            [
                'category_id' => $catEsport->id,
                'title' => 'E-Sport U-Champ: Valorant',
                'description' => 'Turnamen Valorant bergengsi antar mahasiswa.',
                'date' => '2026-08-05 13:00:00',
                'location' => 'Basement Unit 7',
                'price' => 50000,
                'stock' => 32,
                'poster_path' => 'posters/event-3.png',
            ],
            [
                'category_id' => $catIT->id,
                'title' => 'AI & Future Tech Summit',
                'description' => 'Seminar nasional membahas tren AI masa depan.',
                'date' => '2026-09-01 09:00:00',
                'location' => 'Ruang Seminar Unit 5',
                'price' => 25000,
                'stock' => 200,
                'poster_path' => 'posters/event-4.png',
            ],
            [
                'category_id' => $catDesign->id,
                'title' => 'Workshop Logo Branding',
                'description' => 'Teknik membangun identitas visual yang kuat.',
                'date' => '2026-09-12 10:00:00',
                'location' => 'Lab Multimedia',
                'price' => 30000,
                'stock' => 40,
                'poster_path' => 'posters/event-5.png',
            ],
            [
                'category_id' => $catEsport->id,
                'title' => 'Mobile Legends Amikom League',
                'description' => 'Liga mingguan komunitas pecinta MLBB.',
                'date' => '2026-10-20 15:00:00',
                'location' => 'Kantin Amikom',
                'price' => 20000,
                'stock' => 100,
                'poster_path' => 'posters/event-6.png',
            ],
        ];

        foreach ($events as $event) {
            \App\Models\Event::create($event);
        }
    }
}
