<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Real casinos and ratings based on web serch results.
        $brands = [
            [
                'brand_name' => 'Irwin',
                'brand_image' => '/images/irwin.png',
                'rating' => 5,
                'country_code' => 'BG',
                'url' => 'https://irwin.casino/',
            ],
            [
                'brand_name' => 'Gibzo',
                'brand_image' => '/images/gibzo.png',
                'rating' => 4.95,
                'country_code' => 'BG',
                'url' => 'https://gibsoncasino.com/',
            ],
            [
                'brand_name' => '22Bet',
                'brand_image' => '/images/22-bet.png',
                'rating' => 4.90,
                'country_code' => 'BG',
                'url' => 'https://22bet.com/casino',
            ],
            [
                'brand_name' => 'Vavada',
                'brand_image' => '/images/vavada.png',
                'rating' => 4.85,
                'country_code' => 'BG',
                'url' => 'https://vavada.com/en/login',
            ],
            [
                'brand_name' => 'Revolution Casino',
                'brand_image' => '/images/revolution-casino.png',
                'rating' => 5,
                'country_code' => 'PL',
                'url' => 'https://revolutioncasino.com/en/',
            ],
            [
                'brand_name' => 'Nova Jackpot',
                'brand_image' => '/images/nova-jackpot.png',
                'rating' => 4.95,
                'country_code' => 'PL',
                'url' => 'https://nova-jackpot.com/',
            ],
            [
                'brand_name' => 'Spinanga',
                'brand_image' => '/images/spinanga.png',
                'rating' => 4.9,
                'country_code' => 'PL',
                'url' => 'https://spinanga.com/en/',
            ],
            [
                'brand_name' => 'My Empire',
                'brand_image' => '/images/my-empire.png',
                'rating' => 4.85,
                'country_code' => 'PL',
                'url' => 'https://myempire2.com/en/',
            ],
            [
                'brand_name' => 'N1 Casino',
                'brand_image' => '/images/n1-casino.png',
                'rating' => 4.4,
                'country_code' => 'DE',
                'url' => 'https://www.n1casino.com/',
            ],
            [
                'brand_name' => 'Mbit Casino',
                'brand_image' => '/images/mbit-casino.png',
                'rating' => 3.95,
                'country_code' => 'DE',
                'url' => 'https://www.mbitcasino.io/',
            ],
            [
                'brand_name' => 'BitStarz Casino',
                'brand_image' => '/images/bit-starz.png',
                'rating' => 4.55,
                'country_code' => 'DE',
                'url' => 'https://www.bitstarz.com/',
            ],
            [
                'brand_name' => 'Wild.io Casino',
                'brand_image' => '/images/wild-io.png',
                'rating' => 3.95,
                'country_code' => 'DE',
                'url' => 'https://wild.io/',
            ],
        ];

        foreach ($brands as $brand) {
// dd($brand);
            if (is_array($brand) && isset($brand['brand_name'])) {
                Brand::updateOrCreate(
                    ['brand_name' => $brand['brand_name']],
                    $brand
                );
            } else {
                dd( 'Invalid data: ', $brand );
            }
        }
    }
}
