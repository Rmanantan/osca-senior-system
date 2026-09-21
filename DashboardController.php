<?php

namespace App\Http\Controllers;

use App\Models\SeniorCitizen;
use App\Models\Benefit;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $total = SeniorCitizen::count();
        $male = SeniorCitizen::where('sex', 'Male')->count();
        $female = SeniorCitizen::where('sex', 'Female')->count();
        $philhealth = SeniorCitizen::where('philhealth', true)->count();
        $benefits = Benefit::count();

        $byBarangay = SeniorCitizen::selectRaw('barangay, COUNT(*) as total')
            ->groupBy('barangay')
            ->orderByDesc('total')
            ->get();

        return view('dashboard', compact(
            'total','male','female','philhealth','benefits','byBarangay'
        ));
    }
}
