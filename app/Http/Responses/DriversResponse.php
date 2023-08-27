<?php

namespace App\Http\Responses;

class DriversResponse{
    public $drivers;
    public $inactiveDrivers;
    public $activeDrivers;
    public $totalDrivers;
    public function __construct($drivers, $inactiveDrivers, $activeDrivers, $totalDrivers)
    {
        $this->drivers = $drivers;
        $this->inactiveDrivers = $inactiveDrivers;
        $this->activeDrivers = $activeDrivers;
        $this->totalDrivers = $totalDrivers;
    }
}