<?php

use Illuminate\Database\Seeder;
use App\Shopping;
use App\User;
use App\Product;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Oswaldo jimenez',
            'email' => 'i@admin.com',
            'cargo' => 1,
            'password' => bcrypt('Admin123')
        ]);
        factory(User::class,10)->create();
        factory(Product::class,20)->create();
        factory(Shopping::class,50)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
