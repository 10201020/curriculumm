<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = factory(App\User::class, 10)->create();
        DB::table('users')->insert([
                    'name' => 'テスト',
                    'email' => 'test@example.com',
                    'password' => Hash::make('000000'),
                ]);
    }
}
