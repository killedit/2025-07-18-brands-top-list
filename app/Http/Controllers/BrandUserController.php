<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\UserTopBrand;

class BrandUserController extends Controller
{
    public function userIndex(Request $request)
    {
        $country = $request->get('country') ?? request()->header('CF-IPCountry', 'BG');

        $brands = UserTopBrand::with('brand')
            ->where('country_code', $country)
            ->orderBy('position')
            ->get();

        $allBrands = Brand::where('country_code', $country)->get();

        return view('brands.user', [
            'brands' => $brands,
            'allBrands' => $allBrands,
            'country' => $country,
            'countries' => $this->getCountriesList(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'brand_id' => 'required|exists:brands,id',
            'position' => 'required|integer|min:1|max:10',
            'rating' => 'optional|integer|min:0|max:5',
            'country_code' => 'required|string|size:2',
        ]);

        UserTopBrand::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'brand_id' => $request->brand_id,
                'country_code' => $request->country_code,
            ],
            ['position' => $request->position]
        );

        return redirect()->back()->with('success', 'Brand list updated.');
    }

    private function getCountriesList()
    {
        return [
            'BG' => 'Bulgaria',
            'PL' => 'Poland',
            'DE' => 'Germany',
        ];
    }
}
