<?php

use App\Model\Bed;
use App\Model\Patient;
use App\Model\Staff;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(Bed::class, 50)->create();
        factory(Patient::class, 30)->create();
        factory(User::class, 1)->create();
        factory(Staff::class, 10)->create();
    }
}
