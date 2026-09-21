<?php

namespace App\Http\Controllers;

use App\Models\Benefit;
use App\Models\SeniorCitizen;
use Illuminate\Http\Request;

class BenefitController extends Controller
{
    public function index()
    {
        $benefits = Benefit::with('seniorCitizen','recorder')->latest()->paginate(20);
        $seniors = SeniorCitizen::orderBy('last_name')->get();

        return view('benefits.index', compact('benefits','seniors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'senior_citizen_id' => ['required','exists:senior_citizens,id'],
            'benefit_type' => ['required','string','max:150'],
            'amount' => ['nullable','numeric','min:0'],
            'release_date' => ['required','date'],
            'status' => ['required','in:Pending,Released'],
            'notes' => ['nullable','string'],
        ]);

        $data['recorded_by'] = auth()->id();
        Benefit::create($data);

        return back()->with('success', 'Benefit record saved.');
    }
}
