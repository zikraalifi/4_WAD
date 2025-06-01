<!DOCTYPE html>
<html lang="id">
<?php

use Illuminate\Foundation\Application;
use Symfony\Component\Console\Input\ArgvInput;
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artikel Kesehatan Terpopuler</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<header>
    <h1>Artikel Kesehatan Terpopuler</h1>
</header>

<main>
    <div class="artikel-container">

        <?php
        // Array sampel artikel
        $artikels = [
            [
                'judul' => 'Body Lotion Pemutih Permanen: Tips dan Efek Samping!',
                'kategori' => 'Perawatan Tubuh',
                'konten' => 'Lotion pemutih permanen diklaim dapat mencerahkan kulit secara bertahap...',
            ],
            [
                'judul' => 'Rekomendasi Obat Pegal Linu Seluruh Badan yang Bisa Dipilih',
                'kategori' => 'Perawatan Tubuh',
                'konten' => 'Pegal linu adalah keluhan yang sangat umum dirasakan oleh banyak orang...',
            ],
            [
                'judul' => 'Pakai Sunscreen Malam Hari, Boleh Gak Sih? Ini Jawabannya',
                'kategori' => 'Perawatan Kulit',
                'konten' => 'Penggunaan sunscreen sebenarnya direkomendasikan di pagi atau siang hari...',
            ],
            [
                'judul' => 'Awas, Makan Sate Kambing Berlebihan Bisa Sebabkan Kolesterol',
                'kategori' => 'Diet dan Nutrisi',
                'konten' => 'Daging kambing mengandung lemak jenuh yang jika dikonsumsi secara berlebihan...',
            ],
        ];

        // Looping untuk menampilkan artikel
        foreach ($artikels as $artikel) {
            echo '<div class="artikel">';
            echo '<h2>' . $artikel['judul'] . '</h2>';
            echo '<p class="kategori">' . $artikel['kategori'] . '</p>';
            echo '<p>' . $artikel['konten'] . '</p>';
            echo '</div>';
        }
        ?>

    </div>
</main>

<footer>
    <p>&copy; 2023 Artikel Kesehatan</p>
</footer>

</body>
</html>
