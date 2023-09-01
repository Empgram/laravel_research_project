<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{



    public function search(Request $request)
    {
        $search = $request->input('search');
        
        $students = Student::query(); // Start with all students
        
        if ($search) {
            $students->where('student_lrn', 'LIKE', "%$search%")
                ->orWhere('student_name', 'LIKE', "%$search%")
                ->orWhere('section', 'LIKE', "%$search%");
        }
        
        $filteredStudents = $students->get();
        
        return view('student_list', compact('filteredStudents'));
    }

    public function show($student_lrn)
    {
        $student = Student::where('student_lrn', $student_lrn)->first();

        if (!$student) {
            return redirect()->route('student.list')->with('error', 'Student not found.');
        }

        return view('show', compact('student'));
    }
    public function view($lrn)
    {
        $student = Student::where('student_lrn', $lrn)->first();

        if ($student) {
            return view('shows', compact('student'));
        } else {
            return redirect()->route('guidance-reports.list')->with('error', 'Student not found.');
        }
    }
    
    
    public function edit($student_lrn)
    {
        $student = Student::where('student_lrn', $student_lrn)->first();
    
        if (!$student) {
            return redirect()->route('student.list')->with('error', 'Student not found.');
        }
    
        return view('student_edit', compact('student'));
    }

    

    public function update(Request $request, $student_lrn)
    {
        $validatedData = $request->validate([
            'student_name' => 'required|string',
            'address' => 'required|string',
            'contact' => 'required|string',
            'section' => 'required|string',
            'grade' => 'required|string',
            'age' => 'required|integer',
            'guardian_name' => 'string',
            'guardian_phone' => 'string',
            'guardian_email' => 'email',
            // Add validation rules for other fields as needed
        ]);
    
        $student = Student::where('student_lrn', $student_lrn)->first();
    
        if (!$student) {
            return redirect()->route('student.list')->with('error', 'Student not found.');
        }
    
        $student->update($validatedData);
    
        return redirect()->route('student.show', ['student_lrn' => $student->student_lrn])->with('success', 'Student information updated successfully.');
    }
    

   
    



    // Display the student registration form
    public function create()
    {
        return view('student_register');
    }

    // Display the list of students
    

    public function getStudentByLRN($lrn)
    {
        $student = Student::where('student_lrn', $lrn)->first();
        return response()->json($student);
    }

    public function getStudentNameSuggestions($input, $lrn)
    {
        $suggestions = Student::where('student_name', 'LIKE',$input.'%')
            ->where('student_lrn', '<>', $lrn)
            ->limit(10) // You can adjust the number of suggestions as needed
            ->get(['student_name', 'student_lrn']);

        return response()->json($suggestions);
    }


    // Store a new student record
    public function storeStudent(Request $request)
    {
        $validatedData = $request->validate([
            'student_lrn' => 'required|numeric',
            'student_name' => 'required|string',
            'address' => 'required|string',
            'contact' => 'required|string',
            'section' => 'required|string',
            'grade' => 'required|string',
            'age' => 'required|integer',
            'guardian_name' => 'string',
            'guardian_phone' => 'string',
            'guardian_email' => 'email',
        ]);

        // Fetch student details by LRN
        $studentDetails = Student::where('student_lrn', $validatedData['student_lrn'])->first();

        if ($studentDetails) {
            // If student details found, prefill the student name
            $validatedData['student_name'] = $studentDetails->student_name;
        }

        // Fetch perpetrator details by LRN
        $perpetratorDetails = Student::where('student_lrn', $request->perpetrator_lrn)->first();

        if ($perpetratorDetails) {
            // If perpetrator details found, prefill the perpetrator name
            $validatedData['perpetrator_name'] = $perpetratorDetails->student_name;
        }

        // Fill the form_id with a placeholder value for now (you might need to adjust this)
        $validatedData['form_id'] = 'Placeholder Form ID';

        Student::create($validatedData);

        return redirect()->route('student.list')->with('success', 'Student registered successfully.');
    }

    public function sendMessage($lrn)
{
    $student = Student::where('student_lrn', $lrn)->firstOrFail();
    return view('students.send-message', compact('student'));
}

}


