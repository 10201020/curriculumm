<?php

use Illuminate\Database\Seeder;
use App\Models\posts;

class postsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            posts::create([
                'user_id'    => $i,
                'body'       => 'これはテスト投稿' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}