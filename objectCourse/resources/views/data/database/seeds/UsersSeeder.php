<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		for ($i=0; $i<10;$i++)
        // \App\Models\User::factory(10)->create();
		DB::table('users')->insert([
			'name' => Str::random('20'),
			'email' => Str::random('7'),
			'password' => Str::random('20'),
			'Tien' => 100000,
			'phone' => Str::random('10'),
			'khoahoc_id' => 0,
		]);
    }
}
