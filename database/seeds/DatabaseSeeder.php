<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class)

        $users= new User;
        $users->name='admin';
        $users->email = 'admin@gmail.com';
        $users->password = bcrypt('password');
        $users->save();
    }
}
