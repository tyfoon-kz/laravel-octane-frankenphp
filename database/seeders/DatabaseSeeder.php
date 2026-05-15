<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\Unit;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->admin()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        User::factory()->create([
            'name' => 'Operator User',
            'email' => 'operator@example.com',
            'password' => 'password',
        ]);

        $categories = Category::factory(6)->create();
        $units = Unit::factory(4)->create();
        $suppliers = Supplier::factory(5)->create();

        Product::factory(50)->create([
            'category_id' => fn () => $categories->random()->id,
            'unit_id' => fn () => $units->random()->id,
            'supplier_id' => fn () => $suppliers->random()->id,
        ]);
    }
}
