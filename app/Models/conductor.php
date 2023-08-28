<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class conductor extends Model
{
    use HasFactory;

    protected $table = 'conductores';
    
    public static function countDrivers()
    {
        return conductor::all()->count();
    }
    public static function countActiveDrivers()
    {
        return conductor::where('estado', '=', true)->count();
    }
    public static function countInactiveDrivers()
    {
        return conductor::where('estado', '=', false)->count();
    }
    public static function getDriversActive()
    {
        return conductor::where('estado', '=', true)->get();
    }
}
