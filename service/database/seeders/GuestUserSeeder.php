<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class GuestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param=[
            "name"=>"ゲスト",
            "email"=>"guest@guest.com",
            "password"=>Hash::make("guest_pass"),
        ];

        DB::table('users')->insert($param);
    }
}
