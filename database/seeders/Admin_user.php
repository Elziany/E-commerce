<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;


class Admin_user extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'email'=>'mahmoud@yahoo.com',
            'password'=>Hash::make('12345678'),
            'name'=>'mahmoud',
            'photo'=>'fdfd'
                    ]);
    }
}
