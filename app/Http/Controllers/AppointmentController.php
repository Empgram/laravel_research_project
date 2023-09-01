<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuidanceReport;
use App\Models\Appointment;

class AppointmentController extends Controller
{
    public function viewsAppointment($form_id)
    {
        $guidanceReport = GuidanceReport::where('form_id', $form_id)->first();

        if (!$guidanceReport) {
            return redirect()->route('guidance-reports.list')->with('error', 'Guidance report not found.');
        }

        $appointment = Appointment::where('form_id', $form_id)->first();

        return view('show_appointment_q', compact('guidanceReport', 'appointment'));
    }

    public function makeAppointment($form_id)
    {
        $guidanceReport = GuidanceReport::where('form_id', $form_id)->first();

        if (!$guidanceReport) {
            return redirect()->route('guidance-reports.list')->with('error', 'Guidance report not found.');
        }

        return view('make_appoinment', compact('guidanceReport'));
    }

    public function storeAppointment(Request $request, $form_id)
    {
        $guidanceReport = GuidanceReport::where('form_id', $form_id)->first();

        if (!$guidanceReport) {
            return redirect()->route('guidance-reports.list')->with('error', 'Guidance report not found.');
        }

        $validatedData = $request->validate([
            'appointment_date' => 'required|date',
            'appointment_time' => 'required',
        ]);

        // Create the appointment
        Appointment::create([
            'form_id' => $form_id,
            'student_name' => $guidanceReport->student_name,
            'perpetrator_name' => $guidanceReport->perpetrator_name,
            'reason' => $guidanceReport->reason,
            'appointment_date' => $validatedData['appointment_date'],
            'appointment_time' => $validatedData['appointment_time'],
        ]);

        return redirect()->route('guidance-reports.show', ['form_id' => $form_id])->with('success', 'Appointment created successfully.');
    }


    public function viewAppointment($form_id)
{
    $appointment = Appointment::where('form_id', $form_id)->first();

    if (!$appointment) {
        return redirect()->route('guidance-reports.list')->with('error', 'Appointment not found.');
    }

    return view('view_appoinment', compact('appointment'));
}
public function viewAllAppointments()
{
    $appointments = Appointment::all();
    return view('view_all_appointments', compact('appointments'));
}
}
