<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
//            'username' => 'member user',
            'firstname' => 'mohamed',
            'lastname' => 'alzayani',
            'title' => 'MR.',
            'email' => 'user@user.com',
            'password' => bcrypt('112233'),
            'phone' => '33202444',
            'user_type' => 'member',
            'country_id' => 19,
        ]);

        Profile::create([
            'user_id' => $user->id,
            'memberID' => '20090412',
            'job_title' => 'Officer',
            'dob' => '24-12-1987',
            'date_of_join' => '15-10-2009',
            'expiry_date' => '03-05-2023',

        ]);

        User::create([
//            'username' => 'normal user',
            'firstname' => 'ali',
            'lastname' => 'hassan',
            'title' => 'MR.',
            'email' => 'user2@user.com',
            'password' => bcrypt('112233'),
            'phone' => '33202444',
            'user_type' => 'user',
            'country_id' => 1,

        ]);
        $user = User::create([
//            'username' => 'Doctor',
            'firstname' => 'Khalid',
            'lastname' => 'Hamad',
            'title' => 'DR.',
            'email' => 'user3@user.com',
            'password' => bcrypt('112233'),
            'phone' => '33232212',
            'user_type' => 'member',
            'country_id' => 19,
        ]);

        Profile::create([
            'user_id' => $user->id,
            'memberID' => '20130015',
            'job_title' => 'Doctor',
            'dob' => '30-04-1972',
            'date_of_join' => '15-10-2003',
            'expiry_date' => '17-12-2022',

        ]);
    }
}
