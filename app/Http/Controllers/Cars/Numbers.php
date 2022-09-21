<?php

namespace App\Http\Controllers\Cars;

use App\Http\Controllers\Controller;
use App\Models\Gibdd2Full;
use Illuminate\Http\Request;

class Numbers extends Controller
{
    /**
     * Поиск информации по номеру автомобиля
     * 
     * @param  string $number
     * @return array
     */
    public function find($number)
    {
        $rows = Gibdd2Full::where('gibdd2_car_plate_number', $number)
            ->get()
            ->toArray();

        dd($rows);
        return [];
    }
}
