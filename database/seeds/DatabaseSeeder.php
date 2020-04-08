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
        $this->call(IndustriesTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(PlansTableSeeder::class);
        $this->call(RoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(MessagesTableSeeder::class);
        $this->call(TalentsTableSeeder::class);
        $this->call(DealingTableSeeder::class);
    }
}
