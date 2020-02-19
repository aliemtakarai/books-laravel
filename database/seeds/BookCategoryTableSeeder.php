<?php

use Illuminate\Database\Seeder;
use App\Models\BookCategory;

class BookCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        BookCategory::truncate();
        Schema::enableForeignKeyConstraints();

        $categories =
        [
            [
                'name' => 'Entertaiment'
            ],
            [
                'name' => 'Computer & Tech'
            ],
            [
                'name' => 'Education'
            ],
            [
                'name' => 'Art & Music'
            ],
            [
                'name' => 'Catalogs'
            ],
            [
                'name' => 'Health'
            ]
        ];

        BookCategory::insert($categories);
    }
}
