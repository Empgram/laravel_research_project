<?php

namespace App\Http\Controllers;
use App\Models\GuidanceReport;
use App\Models\Student;
use App\Models\Appointment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function home()
{
    $totalGuidanceReports = GuidanceReport::count();
    $totalRegisteredStudents = Student::count();
    $total= Appointment::count();
    return view('home', compact('totalGuidanceReports', 'totalRegisteredStudents','total'));
}


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalGuidanceReports = GuidanceReport::count();
        $totalRegisteredStudents = Student::count();
        
        $total= Appointment::count();
    return view('home', compact('totalGuidanceReports', 'totalRegisteredStudents','total'));
 }
    public function adminHome()
    {
        return view('admin-home');
    }
}
