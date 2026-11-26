<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Varietas;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Akun Admin Default
        User::updateOrCreate(
            ['email' => 'admin@sibibit.com'],
            [
                'name' => 'Admin SiBibit',
                'no_hp' => '081234567890',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
            ]
        );

        // 2. Data 7 Varietas Sesuai Kategori Lahan
        $data = [
            // Kategori 1: Lahan Gambut & Lahan Marjinal
            [
                'nama_varietas' => 'DxP Topaz 3 (Asian Agri)',
                'kategori_lahan' => 'Untuk Lahan Gambut & Lahan Marjinal',
                'harga' => 55000,
                'stok' => 500,
                'deskripsi' => 'Varietas unggul hasil persilangan khusus lahan gambut dan lahan marjinal.',
                'keunggulan' => 'Tahan rendaman air gambut, tandan buah besar, rendemen minyak tinggi (26-28%), pertumbuhan meninggi lambat.',
                'cara_penanaman' => 'Gunakan sistem lubang tanam hole-in-hole, padatkan tanah di sekitar bola akar agar tidak miring, dan pastikan drainase baik.',
                'gambar' => 'topaz3.jpg',
            ],
            [
                'nama_varietas' => 'DxP Dumpy / PPKS Simalungun',
                'kategori_lahan' => 'Untuk Lahan Gambut & Lahan Marjinal',
                'harga' => 52000,
                'stok' => 450,
                'deskripsi' => 'Varietas bertipe batang besar dan pendek (dumpy) yang sangat kokoh.',
                'keunggulan' => 'Batang kokoh tahan tumbang di tanah gambut lunak, cepat berbuah (mulai panen umur 28 bulan), hasil minyak tinggi.',
                'cara_penanaman' => 'Buat lubang tanam ukuran 60x60x60 cm, jarak tanam segitiga sama sisi 9x9x9 meter, berikan pupuk dasar Rock Phosphate 500 gr.',
                'gambar' => 'simalungun.jpg',
            ],
            // Kategori 2: Lahan Kering & Mineral (Daratan)
            [
                'nama_varietas' => 'DxP PPKS 239 & PPKS 540',
                'kategori_lahan' => 'Untuk Lahan Kering & Mineral (Daratan)',
                'harga' => 50000,
                'stok' => 600,
                'deskripsi' => 'Varietas andalan untuk tanah mineral daratan dengan potensi TBS sangat tinggi.',
                'keunggulan' => 'Produksi tinggi (35-38 ton/ha/tahun), adaptasi luas pada lahan daratan, daging buah tebal.',
                'cara_penanaman' => 'Pisahkan top soil dan sub soil saat membuat lubang tanam. Lakukan pemupukan rutin dan pastikan ketersediaan air cukup.',
                'gambar' => 'ppks239.jpg',
            ],
            [
                'nama_varietas' => 'DxP Topaz 1 (Asian Agri)',
                'kategori_lahan' => 'Untuk Lahan Kering & Mineral (Daratan)',
                'harga' => 58000,
                'stok' => 350,
                'deskripsi' => 'Varietas unggul dengan produktivitas awal tinggi di lahan mineral subur.',
                'keunggulan' => 'Cepat berbuah, kualitas minyak prima, sangat responsif terhadap pemupukan standar.',
                'cara_penanaman' => 'Lepas polybag secara hati-hati agar tanah tidak pecah. Posisikan leher akar sejajar permukaan tanah daratan.',
                'gambar' => 'topaz1.jpg',
            ],
            [
                'nama_varietas' => 'DxP Socfindo (Yangambi & La Mé)',
                'kategori_lahan' => 'Untuk Lahan Kering & Mineral (Daratan)',
                'harga' => 60000,
                'stok' => 400,
                'deskripsi' => 'Kombinasi genetik Yangambi bertandan besar dan La Mé yang tahan kekeringan.',
                'keunggulan' => 'Pertumbuhan stabil, sangat toleran terhadap musim kemarau/lahan kering, rendemen tinggi.',
                'cara_penanaman' => 'Tanam di awal musim hujan, buat piringan bersih selebar 1,5 meter, serta jaga kelembaban tanah dengan penyiangan teratur.',
                'gambar' => 'socfindo.jpg',
            ],
            // Kategori 3: Lahan Berbukit atau Rawan Penyakit (Ganoderma)
            [
                'nama_varietas' => 'DxP Topaz 2 (Asian Agri)',
                'kategori_lahan' => 'Untuk Lahan Berbukit atau Rawan Penyakit (Ganoderma)',
                'harga' => 62000,
                'stok' => 300,
                'deskripsi' => 'Varietas dengan perakaran kuat untuk area berbukit dan kontur miring.',
                'keunggulan' => 'Kuat mencengkeram tanah di lahan miring/berbukit, memiliki ketahanan moderat terhadap Ganoderma.',
                'cara_penanaman' => 'Wajib membuat terasering lahan atau tapak kuda, aplikasikan agen hayati Trichoderma sp. pada lubang tanam.',
                'gambar' => 'topaz2.jpg',
            ],
            [
                'nama_varietas' => 'DxP Topaz GT & Socfindo MT Gano',
                'kategori_lahan' => 'Untuk Lahan Berbukit atau Rawan Penyakit (Ganoderma)',
                'harga' => 68000,
                'stok' => 250,
                'deskripsi' => 'Varietas khusus moderat tahan serangan jamur Ganoderma boninense.',
                'keunggulan' => 'Perlindungan maksimal terhadap penyakit busuk pangkal batang (Ganoderma), ideal untuk lahan replanting.',
                'cara_penanaman' => 'Lakukan sanitasi pembongkaran tunggul kayu lama sebelum tanam dan kontrol penyakit secara berkala.',
                'gambar' => 'mtgano.jpg',
            ],
        ];

        foreach ($data as $item) {
            Varietas::updateOrCreate(['nama_varietas' => $item['nama_varietas']], $item);
        }
    }
}
