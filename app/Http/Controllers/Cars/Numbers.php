<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\AllData\Gibdd2Full;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Numbers extends Controller
{
    /**
     * Выводит информацию по номеру
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFromCarNumber(Request $request)
    {
        $number = (string) Str::of(Str::replace(" ", "", $request->number))->trim();

        return response()->json(
            $this->find($number),
        );
    }

    /**
     * Поиск информации по номеру автомобиля
     * 
     * @param  string $number
     * @return array
     */
    public function find($number)
    {
        return Gibdd2Full::where('gibdd2_car_plate_number', $number)
            ->get()
            ->toArray();
    }
}
