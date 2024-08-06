<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Support\Str;
use App\Models\ProductColor;
use App\Models\ProductGallery;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        ProductVariant::query()->truncate();
        ProductGallery::query()->truncate();
        DB::table('product_tag')->truncate();
        Product::query()->truncate();
        ProductSize::query()->truncate();
        ProductColor::query()->truncate();
        Tag::query()->truncate();


        Tag::factory(15)->create();

        foreach (['64GB', '128GB', '256GB', '512GB', '1TB'] as $item) {
            ProductSize::query()->create([
                'name' => $item,
            ]);
        }

        foreach (['Black', 'Grey', 'Blue', 'Gold', 'Pink', 'White'] as $item) {
            ProductColor::query()->create([
                'name' => $item,
            ]);
        }

        for ($i = 0; $i < 100; $i++) {
            $name = fake()->text(100);
            Product::query()->create([
                'catelogue_id' => rand(6, 9),
                'name' => $name,
                'slug' => Str::slug($name) . '-' . Str::random(8),
                'sku' => Str::random(7) . $i,
                'img_thumbnail' => 'https://cdn.hoanghamobile.com/i/productlist/dsp/Uploads/2024/06/24/15-pro-max-xanh-2.png',
                'price_regular' => 28890000,
                'price_sale' => 26890000,
            ]);
        }


        for ($i = 1; $i < 101; $i++) {
            ProductGallery::query()->insert([
                [
                    'product_id' => $i,
                    'image' => 'https://cdn.hoanghamobile.com/i/productlist/dsp/Uploads/2024/06/24/15-pro-max-xanh-2.png',
                ],
                [
                    'product_id' => $i,
                    'image' => 'https://cdn.hoanghamobile.com/i/preview/Uploads/2024/06/24/15-pro-max-xanh-4.png',
                ]
            ]);
        }

        for ($i = 1; $i < 101; $i++) {
            DB::table('product_tag')->insert([
                [
                    'product_id' => $i,
                    'tag_id' => rand(1, 8)
                ],
                [
                    'product_id' => $i,
                    'tag_id' => rand(9, 15)
                ]
            ]);
        }

        for ($productID = 1; $productID < 101; $productID++) {
            $data = [];
            for ($sizeID = 1; $sizeID < 5; $sizeID++) {
                for ($colorID = 1; $colorID < 7; $colorID++) {
                    $data[] = [
                        'product_id' => $productID,
                        'product_size_id' => $sizeID,
                        'product_color_id' => $colorID,
                        'quantity' => 100,
                        'image' => 'https://cdn.hoanghamobile.com/i/productlist/dsp/Uploads/2024/06/24/15-pro-max-xanh-2.png'
                    ];
                }
            }
            DB::table('product_variants')->insert($data);
        }
    }
}
