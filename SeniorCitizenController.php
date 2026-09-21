<?php

namespace App\Http\Controllers;

use App\Models\SeniorCitizen;
use Illuminate\Http\Request;

class SeniorCitizenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->string('search')->trim()->toString();

        $seniors = SeniorCitizen::query()
            ->when($search, fn ($q) => $q->where(function ($q) use ($search) {
                $q->where('osca_id', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('barangay', 'like', "%{$search}%");
            }))
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('senior-citizens.index', compact('seniors','search'));
    }

    public function create()
    {
        return view('senior-citizens.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'osca_id' => ['required','string','max:50','unique:senior_citizens,osca_id'],
            'first_name' => ['required','string','max:100'],
            'middle_name' => ['nullable','string','max:100'],
            'last_name' => ['required','string','max:100'],
            'birth_date' => ['required','date'],
            'sex' => ['required','in:Male,Female'],
            'barangay' => ['required','string','max:150'],
            'address' => ['nullable','string'],
            'contact_number' => ['nullable','string','max:30'],
            'philhealth' => ['nullable','boolean'],
            'pension_status' => ['nullable','string','max:100'],
        ]);

        $data['philhealth'] = $request->boolean('philhealth');
        SeniorCitizen::create($data);

        return redirect()->route('senior-citizens.index')
            ->with('success', 'Senior citizen record created.');
    }

    public function show(SeniorCitizen $seniorCitizen)
    {
        return view('senior-citizens.show', compact('seniorCitizen'));
    }

    public function edit(SeniorCitizen $seniorCitizen)
    {
        return view('senior-citizens.edit', compact('seniorCitizen'));
    }

    public function update(Request $request, SeniorCitizen $seniorCitizen)
    {
        $data = $request->validate([
            'osca_id' => ['required','string','max:50','unique:senior_citizens,osca_id,'.$seniorCitizen->id],
            'first_name' => ['required','string','max:100'],
            'middle_name' => ['nullable','string','max:100'],
            'last_name' => ['required','string','max:100'],
            'birth_date' => ['required','date'],
            'sex' => ['required','in:Male,Female'],
            'barangay' => ['required','string','max:150'],
            'address' => ['nullable','string'],
            'contact_number' => ['nullable','string','max:30'],
            'philhealth' => ['nullable','boolean'],
            'pension_status' => ['nullable','string','max:100'],
        ]);

        $data['philhealth'] = $request->boolean('philhealth');
        $seniorCitizen->update($data);

        return redirect()->route('senior-citizens.show', $seniorCitizen)
            ->with('success', 'Senior citizen record updated.');
    }

    public function destroy(SeniorCitizen $seniorCitizen)
    {
        $seniorCitizen->delete();

        return redirect()->route('senior-citizens.index')
            ->with('success', 'Senior citizen record deleted.');
    }

    public function report()
    {
        $seniors = SeniorCitizen::orderBy('barangay')->orderBy('last_name')->get();
        return view('reports.seniors', compact('seniors'));
    }
}
