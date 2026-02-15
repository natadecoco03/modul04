<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;


class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::insert([
            [
                'nama_kategori' => 'Teknologi',
                'deskripsi' => 'Ini adalah buku yang membahas tentang teknologi, perkembangan teknologi serta pemrograman'
            ],

            [
                'nama_kategori' => 'Sains',
                'deskripsi' => 'ini adalah buku yang membahas mengenai dunia sains / ilmu pengetahuan '
            ],

            [
                'nama_kategori' => 'Sastra',
                'deskripsi' => 'ini adalah buku tentang karya sastra'
            ]
        ]);
    }
}
