<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $hasher = app(\Illuminate\Contracts\Hashing\Hasher::class);

        \App\User::create(['username' => 'admin', 'password' => $hasher->make('12345'), 'email' => 'admin@admin.com']);

    }
}
