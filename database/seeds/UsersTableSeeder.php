<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Agnes Carolina";
        $user->email = "agnescarolina@test.com";
        $user->password = crypt("carolina", "");
        $user->save();
    }
}
