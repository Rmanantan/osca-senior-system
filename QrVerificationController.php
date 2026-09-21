<?php

namespace App\Http\Controllers;

use App\Models\SeniorCitizen;

class QrVerificationController extends Controller
{
    public function index()
    {
        return view('qr.index');
    }

    public function verify(string $oscaId)
    {
        $seniorCitizen = SeniorCitizen::where('osca_id', $oscaId)->first();

        if (!$seniorCitizen) {
            return response()->json([
                'verified' => false,
                'message' => 'OSCA ID not found.'
            ], 404);
        }

        return response()->json([
            'verified' => true,
            'message' => 'Senior citizen verified.',
            'data' => [
                'osca_id' => $seniorCitizen->osca_id,
                'name' => $seniorCitizen->full_name,
                'barangay' => $seniorCitizen->barangay,
                'pension_status' => $seniorCitizen->pension_status,
                'philhealth' => $seniorCitizen->philhealth,
            ],
        ]);
    }
}
