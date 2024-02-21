<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingUser = DB::table('users')->where('email', 'superadmin@khgc.com')->first();
        if (!$existingUser) {
            // Nếu không tồn tại, thêm người quản trị mới
            DB::table('users')->insert([
                'first_name' => 'Admin',
                'last_name' => 'Super',
                'email' => 'superadmin@khgc.com',
                'password' => Hash::make('Abcd@1234'),
                'role' => 'admin',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
