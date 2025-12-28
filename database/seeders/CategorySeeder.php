<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'category_name' => 'Bread',
                'description'   => 'Freshly baked breads made daily using high-quality ingredients. Includes white bread, whole wheat, multigrain, and artisan loaves.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Pastries',
                'description'   => 'Delicious and flaky pastries crafted with care. Includes croissants, Danish pastries, puff pastries, and savory options.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Cakes',
                'description'   => 'Handmade cakes for all occasions, from birthdays to celebrations. Classic flavors include chocolate, vanilla, red velvet, and specialty cakes.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Cookies',
                'description'   => 'Crispy, chewy, and freshly baked cookies in a variety of flavors. Chocolate chip, oatmeal, butter, and seasonal specialty cookies.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Beverages',
                'description'   => 'Refreshing drinks to complement your bakery items. Includes coffee, tea, hot chocolate, and fresh juices made daily.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Sandwiches & Snacks',
                'description'   => 'Quick bites and light meals made with fresh ingredients. Includes sandwiches, wraps, and savory snacks.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Drinks',
                'description'   => 'Refreshing drinks to complement your bakery items. Includes coffee, tea, hot chocolate, and fresh juices made daily.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Breakfast Specials',
                'description'   => 'Delicious breakfast options including pancakes, waffles, omelettes, and breakfast sandwiches.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Vegan & Gluten-Free',
                'description'   => 'Healthy bakery options for special diets. Includes vegan breads, gluten-free cookies, and plant-based pastries.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Pies & Tarts',
                'description'   => 'Sweet and savory pies and tarts. Options include fruit pies, quiches, custard tarts, and seasonal specials.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Muffins & Cupcakes',
                'description'   => 'Individual sweet treats for any occasion. Includes classic muffins, chocolate cupcakes, and specialty flavors.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Ice Cream & Desserts',
                'description'   => 'Cold and sweet desserts to enjoy. Includes ice cream, gelato, puddings, and mousse.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Savory Snacks',
                'description'   => 'Light and savory snacks including cheese sticks, samosas, pies, and finger foods.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Chocolate & Confectionery',
                'description'   => 'Delicious chocolate treats and candies. Includes truffles, chocolate bars, fudge, and pralines.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Specialty Breads',
                'description'   => 'Unique bread varieties such as sourdough, rye, focaccia, ciabatta, and artisan loaves.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Seasonal Specials',
                'description'   => 'Limited-time items based on the season. Includes holiday cookies, festive cakes, and seasonal pastries.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Doughnuts',
                'description'   => 'Sweet and fluffy doughnuts in a variety of flavors, filled or glazed.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Breakfast Beverages',
                'description'   => 'Hot and cold drinks for breakfast. Includes coffee, tea, fresh juices, and smoothies.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Savory Pies',
                'description'   => 'Handmade savory pies filled with meat, vegetables, and cheese.',
                'status'        => 'active',
            ],
            [
                'category_name' => 'Snacks & Appetizers',
                'description'   => 'Small bites and appetizers perfect for parties or quick snacks.',
                'status'        => 'active',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
