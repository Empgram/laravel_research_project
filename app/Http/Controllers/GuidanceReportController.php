<?php

namespace App\Http\Controllers;
use Ramsey\Uuid\Uuid; 
use Illuminate\Http\Request;
use App\Models\GuidanceReport;
use App\Models\Appointment;
use App\Models\Student;

class GuidanceReportController extends Controller
{
    public function create()
    {
        $form_id = $this->generateFormId();
        return view('create', compact('form_id'));
    }

    public function index()
    {
    $guidanceReports = GuidanceReport::all();

    return view('guidance_report_list', compact('guidanceReports'));
    }

    public function studentSearch(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::where('student_name','LIKE',$request->student_name.'%')->get();
            $output = '';
            if (count($data) > 0) {
                $output = '<div class="list-group" style="display:block;position:relative;z-index:1;background-color:white;padding:10px;text-decoration:none;flex-direction:row;">';
                foreach ($data as $row) {
                    
                    $output .= '<li>' .$row->student_name. '</li> ';
                }
                $output .= '</div>';
            } else {
                $output .= '<li class="list-group-item">No Data Found</li>';
            }
            return $output;
        }
        return view('student_register');
    }

    public function destroy($form_id)
    {
        $guidanceReport = GuidanceReport::where('form_id', $form_id)->first();
    
        if (!$guidanceReport) {
            return redirect()->route('guidance-reports.list')->with('error', 'Guidance report not found.');
        }
    
        $guidanceReport->delete();
    
        return redirect()->route('guidance-reports.list')->with('success', 'Guidance report deleted successfully.');
    }
    


    public function show($form_id)
    {
        $guidanceReport = GuidanceReport::where('form_id', $form_id)->first();
        $appointment = Appointment::where('form_id', $form_id)->first();

        if (!$guidanceReport) {
            return redirect()->route('guidance-reports.list')->with('error', 'Guidance report not found.');
        }

        return view('show_guidance_report', compact('guidanceReport', 'appointment'));
    }
    public function pstudentSearch(Request $request)
    {
        if ($request->ajax()) {
            $datas = Student::where('student_name','LIKE',$request->student_name.'%')->get();
            $outputs = '';
            if (count($datas) > 0) {
                $outputs = '<div class="list-group" style="display:block;position:relative;z-index:1;background-color:white;padding:10px;text-decoration:none;flex-direction:row;">';
                foreach ($datas as $rows) {
                    
                    $outputs .= '<li>' .$rows->student_name. '</li> ';
                }
                $output .= '</div>';
            } else {
                $outputs .= '<li class="list-group-item">No Data Found</li>';
            }
            return $outputs;
        }
        return view('student_register');
    }
        




    public function getStudentByLRN($lrn)
{
    $student = Student::where('student_lrn', $lrn)->first();

    if ($student) {
        return response()->json([
            'student_name' => $student->student_name,
            'perpetrator_name' => $student->perpetrator_name,
        ]);
    } else {
        return response()->json([]);
    }
}


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'form_id' => 'required|unique:guidance_reports',
            'reason' => 'required',
            'perpetrator_lrn' => 'required',
            'perpetrator_name' => 'required',
            'violation_type' => 'required',
            'student_lrn' => 'required',
            'student_name' => 'required',
            'parent_contacted' => 'required',
            'teacher_name' => 'required',
            'date' => 'required',
        ]);

        GuidanceReport::create($validatedData);

        return redirect()->route('home')->with('success', 'Guidance report created successfully.');
    }

    protected function generateFormId()
    {
        $form_id = mt_rand(10000, 99999);
        while (GuidanceReport::where('form_id', $form_id)->exists()) {
            $form_id = mt_rand(10000, 99999);
        }
        return $form_id;
    }
    public function viewAppointment($form_id)
{
    $appointment = Appointment::where('form_id', $form_id)->first();

    if (!$appointment) {
        return redirect()->route('guidance-reports.list')->with('error', 'Appointment not found.');
    }

    return view('view_appointment', compact('appointment'));
}

}
    