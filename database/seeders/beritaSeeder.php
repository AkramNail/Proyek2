<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class beritaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        DB::table('berita')->insert([
            [
                'id_Berita' => 1,
                'judul_berita' => 'Berita Pertama',
                'isi_berita' => <<<TEXT
                Suasana lantai 7 Gedung Student Centre (GSC) Politeknik Negeri Indramayu pada Senin, 15 September 2025, dipenuhi keceriaan dan semangat baru. Hari itu, Polindra kembali menggelar Sosialisasi Perpustakaan yang menjadi agenda rutin setiap awal tahun akademik. Kegiatan ini diselenggarakan khusus bagi mahasiswa baru dari berbagai jurusan dan program studi, agar mereka bisa lebih dekat dengan dunia literasi kampus.

                Kepala UPA Perpustakaan Politeknik Negeri Indramayu, Rendi, M.Kom., menjelaskan bahwa sosialisasi dilakukan secara bertahap, dibagi dalam dua hingga tiga sesi per hari untuk setiap program studi. Tujuannya sederhana namun penting: mengenalkan mahasiswa pada berbagai aplikasi perpustakaan digital Polindra yang akan memudahkan aktivitas akademik mereka.

                “Mahasiswa akan diajarkan cara mengakses aplikasi untuk berkunjung ke perpustakaan, proses peminjaman dan pengembalian buku, hingga mencari koleksi yang tersedia di Polindra. Kami ingin semua mahasiswa merasa lebih akrab dengan perpustakaan dan memanfaatkannya secara maksimal,” ujar Rendi dengan penuh semangat.

                Tidak hanya itu, Rendi juga berharap kegiatan ini mampu menumbuhkan budaya membaca di kalangan mahasiswa. Ia menegaskan bahwa perpustakaan Polindra telah dibuat senyaman mungkin agar mahasiswa betah untuk membaca, mengerjakan tugas, atau sekadar menghabiskan waktu produktif.

                “Pesan saya, mari tumbuhkan minat membaca dengan sering berkunjung ke perpustakaan Polindra. Karena di sini bukan hanya tempat untuk membaca, tapi juga ruang untuk mengerjakan tugas kuliah, berdiskusi, bahkan mengasah kreativitas. Semakin sering mahasiswa datang, semakin terbuka wawasan mereka,” tambahnya.

                Antusiasme mahasiswa pun terlihat jelas. Salah seorang peserta sosialisasi mengungkapkan rasa senangnya dapat mengikuti kegiatan ini.

                “Menurut saya sosialisasi ini sangat bermanfaat. Jadi kami bisa memahami lebih dalam bagaimana menggunakan fasilitas perpustakaan Polindra, termasuk aplikasi-aplikasinya. Jadi ke depannya, kalau mau cari buku atau pinjam koleksi, tidak bingung lagi,” ungkapnya dengan wajah sumringah.

                Dengan adanya sosialisasi ini, perpustakaan Polindra bukan sekadar ruang penuh rak buku, tetapi juga menjadi jembatan mahasiswa menuju pengetahuan luas. Semoga semangat literasi terus tumbuh di kalangan civitas akademika Polindra, sehingga mahasiswa tidak hanya pintar di kelas, tapi juga kaya wawasan dari buku-buku yang mereka baca.
                TEXT,

                'created_at' => '2024-10-01',
                'foto_berita' => 'berita1.jpeg',
                'id_UKM' => 1,
            ],
            [
                'id_Berita' => 2,
                'judul_berita' => 'Berita Kedua',
                'isi_berita' => 'Ini adalah demo berita kedua',
                'created_at' => '2025-11-01',
                'foto_berita' => 'berita2.jpeg',
                'id_UKM' => 3,
            ],
        ]);

    }
}
