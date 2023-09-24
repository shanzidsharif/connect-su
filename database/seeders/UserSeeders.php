<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('users')->insert([
             [
               'name'       => 'admin',
               'suid'       => 'CSE123',
               'email'      => 'admin@gmail.com',
               'password'   => Hash::make('admin@gmail.com'),
               'mobile'     => '01775349489',
               'role'       => 'admin',
               'status'     => 'active',
             ],
             [
               'name'           => 'lecturer',
               'suid'           => 'CSE1234',
               'email'          => 'lecturer@gmail.com',
               'password'       => Hash::make('lecturer@gmail.com'),
               'mobile'         => '01775349488',
               'role'           => 'lecturer',
               'status'         => 'active',
             ],
             [
               'name'           => 'student',
               'suid'           => 'CSE12345',
               'email'          => 'student@gmail.com',
               'password'       => Hash::make('student@gmail.com'),
               'mobile'         => '01775349487',
               'role'           => 'student',
               'status'         => 'active',
             ],

         ]);
    }
}
