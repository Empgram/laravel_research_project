<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Referral; // Import the Referral model
use App\Models\Student; 
class ReferralController extends Controller{
    public function create()
    {
        $students = Student::all(); 
        // Implement logic to display the create form for student referral
        return view('student_referral_view');
    }

    public function view()
    {
        $referrals = Referral::all(); 
        // Implement logic to display the create form for student referral
        return view('all_referrals_student', compact('referrals'));
    }

public function addReferral(Request $request)
{
    // Validate form inputs
    $validatedData = $request->validate([
        'form_id' => 'required|unique:guidance_reports',
        'studentlrn' => 'required',
        'student_name' => 'required',
        'reason' => 'required',
        'state' => 'required',
        'referral_date' => 'required|date',
       
        // Validate the form ID field
    ]);

    // Create a new Referral record
   
    Referral::create($validatedData);

    return redirect()->route('referrals.all')->with('success', 'Guidance report created successfully.');
 
}
}
