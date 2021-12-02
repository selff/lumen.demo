<?php

namespace App\Http\Controllers;

use App\Repository\CountryRepository;
use App\Repository\CountryRepositoryInterface;
use App\Rules\CountryCode;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

/**
 * Class CountriesController
 *
 * @package App\Http\Controllers
 */
class CountriesController extends Controller
{

    private $countryStorage;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(CountryRepositoryInterface $countryStorage)
    {
        $this->countryStorage = $countryStorage;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     * @throws \Illuminate\Validation\ValidationException
     */
    public function post(Request $request)
    {
        // validate the request
        $this->validate($request, [
            'code' => 'required',
            'code' => 'alpha|size:2'
        ]);

        $this->countryStorage->increment($request->input('code'));

        return response(null, 201); // 201 - Created
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function get()
    {
        $countries = $this->countryStorage->all();

        return response()->json($countries, 200);
    }
}
