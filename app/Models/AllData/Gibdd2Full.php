<?php

namespace App\Models\AllData;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gibdd2Full extends Model
{
    use HasFactory;

    /**
     * The database connection that should be used by the model.
     *
     * @var string
     */
    protected $connection = "alldata";

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = "gibdd2_full";

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '_gibdd2_id',
        'phone_number',
        'gibdd2_car_plate_number',
        'gibdd2_old_car_plate_number',
        'gibdd2_car_model',
        'gibdd2_car_color',
        'gibdd2_car_year',
        'gibdd2_car_vin',
        'gibdd2_base_name',
        'gibdd2_dateofbirth',
        'gibdd2_address',
        'gibdd2_passport',
        'gibdd2_passport_address',
        'gibdd2_name',
        '_gibdd2_seq_pn_count',
    ];
}
