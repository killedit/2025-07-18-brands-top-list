<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserTopBrand;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index(Request $request)
    {
        $countryCode = $request->header('CF-IPCountry', 'US');

        $brands = Brand::where('country_code', $countryCode)
                    ->orderByDesc('rating')
                    ->get();

        if ($brands->isEmpty() && $countryCode !== 'BG') {
            $brands = Brand::where('country_code', 'BG')
                        ->orderByDesc('rating')
                        ->get();
            $countryCode = 'BG';
        }

        return view('brands.index', [
            'brands' => $brands,
            'country' => $countryCode,
        ]);
    }
}
