<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Roles
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);

        // Main Administrator
        $mainAdmin = User::create([
            'fullname' => 'Admin',
            'email' => 'admin@golden.com',
            'password' => bcrypt('admin123'),
        ]);
        $mainAdmin->assignRole('admin');

        // Create 10 Dummy Admins
        $adminData = [
            [
                'fullname' => 'Sarah Johnson',
                'email' => 'sarah.johnson@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Michael Chen',
                'email' => 'michael.chen@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Emily Rodriguez',
                'email' => 'emily.rodriguez@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'David Thompson',
                'email' => 'david.thompson@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Jessica Williams',
                'email' => 'jessica.williams@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Ryan Martinez',
                'email' => 'ryan.martinez@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Amanda Taylor',
                'email' => 'amanda.taylor@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'James Wilson',
                'email' => 'james.wilson@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Lauren Anderson',
                'email' => 'lauren.anderson@golden.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'fullname' => 'Kevin Brown',
                'email' => 'kevin.brown@golden.com',
                'password' => bcrypt('admin123'),
            ]
        ];

        foreach ($adminData as $admin) {
            $user = User::create($admin);
            $user->assignRole('admin');
        }

        // Create 10 Dummy Users
        $userData = [
            [
                'fullname' => 'Alice Cooper',
                'email' => 'alice.cooper@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Bob Mitchell',
                'email' => 'bob.mitchell@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Catherine Lee',
                'email' => 'catherine.lee@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Daniel Garcia',
                'email' => 'daniel.garcia@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Emma Davis',
                'email' => 'emma.davis@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Frank Miller',
                'email' => 'frank.miller@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Grace Kim',
                'email' => 'grace.kim@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Henry Clark',
                'email' => 'henry.clark@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Isabella Moore',
                'email' => 'isabella.moore@gmail.com',
                'password' => bcrypt('user123'),
            ],
            [
                'fullname' => 'Jack Robinson',
                'email' => 'jack.robinson@gmail.com',
                'password' => bcrypt('user123'),
            ]
        ];

        foreach ($userData as $user) {
            $newUser = User::create($user);
            $newUser->assignRole('user');
        }

    }
}