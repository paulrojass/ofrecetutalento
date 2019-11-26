<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(IndustriesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(TalentsTableSeeder::class);
        $this->call(ExchangesTableSeeder::class);
    }
}
