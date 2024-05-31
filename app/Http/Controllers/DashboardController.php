<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahPropertiTerjual = Property::query()->where('status', '=', 'sold')->count();
        $jumlahPropertiTersedia = Property::query()->where('status', '=', 'ready')->count();
        $property = Property::count();
        
        return view('components.pages.home', [
            'jumlah_properti_terjual' => $jumlahPropertiTerjual,
            'jumlah_properti_tersedia' => $jumlahPropertiTersedia,
            'property' => $property
        ]);
    }
}
