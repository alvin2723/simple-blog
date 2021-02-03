<?php

use Illuminate\Database\Seeder;
use App\BlogCategory;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = BlogCategory::create([
            'category_title' => 'Web Design'
        ]);
        $category = BlogCategory::create([
            'category_title' => 'UI/UX'
        ]);
        $category = BlogCategory::create([
            'category_title' => 'Programming Language'
        ]);
        $category = BlogCategory::create([
            'category_title' => 'FrameWork'
        ]);
    }
}
