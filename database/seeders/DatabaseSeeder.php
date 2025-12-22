<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Enums\UserRolesEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // run location seeder
        $this->call([
            LocationSeeder::class,
        ]);

        $userroles = [
            [
                'id' => UserRolesEnum::Admin->value,
                'name' => 'Admin Platform',
                'status' => true,
            ],
            [
                'id' => UserRolesEnum::GorAdmin->value,
                'name' => 'Admin GOR',
                'status' => true,
            ],
            [
                'id' => UserRolesEnum::Customer->value,
                'name' => 'Pelanggan',
                'status' => true,
            ],

        ];

        foreach ($userroles as $role) {
            \App\Models\Role::updateOrCreate(['id' => $role['id']], $role);
        }

        // Create admin user
        \App\Models\User::firstOrCreate([
            'email' => 'admin@sporthub.id',
        ], [
            'name' => 'Admin Platform',
            'password' => Hash::make('adminpassword'),
            'phone_number' => null,
            'role_id' => UserRolesEnum::Admin->value,
        ]);

        // create mock customers
        \App\Models\User::firstOrCreate([
            'email' => 'cust1@gmail.com',
        ], [
            'name' => 'Pelanggan 1',
            'password' => Hash::make('custpassword'),
            'phone_number' => '1299567890',
            'role_id' => UserRolesEnum::Customer->value,
        ]);

        \App\Models\User::firstOrCreate([
            'email' => 'cust2@gmail.com',
        ], [
            'name' => 'Pelanggan 2',
            'password' => Hash::make('custpassword'),
            'phone_number' => '1277567890',
            'role_id' => UserRolesEnum::Customer->value,
        ]);

        \App\Models\User::firstOrCreate([
            'email' => 'cust3@gmail.com',
        ], [
            'name' => 'Pelanggan 3',
            'password' => Hash::make('custpassword'),
            'phone_number' => '1234998890',
            'role_id' => UserRolesEnum::Customer->value,
        ]);

        // this customer is suspeneded
        \App\Models\User::firstOrCreate([
            'email' => 'cust4@gmail.com',
        ], [
            'name' => 'Pelanggan 4',
            'password' => Hash::make('custpassword'),
            'phone_number' => '2224262890',
            'role_id' => UserRolesEnum::Customer->value,
            'status' => '0',
        ]);



        // create mock employees
        // Contoh Admin GOR + GOR + Lapangan awal
        $gorAdmin = \App\Models\User::firstOrCreate([
            'email' => 'admin.gor@example.com',
        ], [
            'name' => 'Admin GOR Contoh',
            'password' => Hash::make('adminpassword'),
            'phone_number' => '0812345678',
            'role_id' => UserRolesEnum::GorAdmin->value,
        ]);

        $gor = \App\Models\Gor::firstOrCreate([
            'nama' => 'GOR Contoh',
            'owner_user_id' => $gorAdmin->id,
        ], [
            'alamat' => 'Jl. Olahraga No. 1',
            'telepon' => '021000000',
            'deskripsi' => 'GOR untuk futsal dan badminton',
            'status' => true,
        ]);

        \App\Models\Field::firstOrCreate([
            'gor_id' => $gor->id,
            'nama' => 'Lapangan Futsal A',
        ], [
            'tipe' => 'futsal',
            'harga_per_jam' => 150000,
            'is_hidden' => false,
        ]);

        // Deals
        \App\Models\Deal::create([
            'name' => 'Deal 1',
            'description' => 'Deal 1 description',
            'start_date' => '2023-07-16',
            'end_date' => '2023-07-20',
            'discount' => '10',
            'is_hidden' => '0',
        ]);

        // categories Skin, Makeup, Nails, Hair
        \App\Models\Category::create([
            'name' => 'Skin',
        ]);

        \App\Models\Category::create([
            'name' => 'Makeup',
        ]);

        \App\Models\Category::create([
            'name' => 'Hair',
        ]);

        \App\Models\Category::create([
            'name' => 'Nails',
        ]);

        // Seed layanan/timeslot bawaan dinonaktifkan untuk menghindari duplikasi.
        // $this->call([
        //     ServicesSeeder::class,
        //     TimeSlotSeeder::class,
        // ]);


    }
}
