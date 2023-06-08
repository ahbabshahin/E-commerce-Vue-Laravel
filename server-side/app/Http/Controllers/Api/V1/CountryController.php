<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCountryRequest;
use App\Http\Requests\UpdateCountryRequest;
use App\Http\Resources\V1\CountryCollection;
use App\Http\Resources\V1\CountryResource;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function index()
    {
        return new CountryCollection(Country::all());
    }

    public function store(StoreCountryRequest $request)
    {
        Country::create($request->validated());
        return response()->json('Country Created');
    }

    public function show(Country $country)
    {
        return new CountryResource($country);
    }

    public function update(UpdateCountryRequest $request, Country $country)
    {
        $country->update($request->validated());
        return response()->json('Country Updated');
    }

    public function destroy(Country $country)
    {
        $country->delete();
        return response()->json('Country Deleted');
    }
}
