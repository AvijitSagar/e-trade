<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    private static $courier;

    // for adding data to database 
    protected $fillable = ['courier_name', 'courier_email', 'courier_mobile', 'courier_cost', 'courier_address'];

    public static function updateCourier($request, $courier){
        self::$courier = Courier::find($courier);
        self::$courier->courier_name = $request->courier_name;
        self::$courier->courier_email = $request->courier_email;
        self::$courier->courier_mobile = $request->courier_mobile;
        self::$courier->courier_cost = $request->courier_cost;
        self::$courier->courier_address = $request->courier_address;
        self::$courier->save();
    }
    public static function deleteCourier($courier){
        self::$courier = Courier::find($courier);
        self::$courier->delete();
    }
}
