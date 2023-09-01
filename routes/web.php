<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GuidanceReportController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ReferralController;
use App\Http\Controllers\MailController;
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes...
Auth::routes(['verify' => true]);


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('edit.profile')->middleware('auth');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('update.profile');
Route::get('/settings', [ProfileController::class, 'settings'])->name('settings')->middleware('auth');
Route::post('/settings/update', [ProfileController::class, 'updateSettings'])->name('update.settings')->middleware('auth');

Route::get('/guidance-reports/create', [GuidanceReportController::class, 'create'])->name('guidance-reports.create');
Route::post('/guidance-reports', [GuidanceReportController::class, 'store'])->name('guidance-reports.store');
Route::get('/guidance-reports/list', [GuidanceReportController::class, 'index'])->name('guidance-reports.list');
Route::get('/getStudentByLRN/{lrn}', [GuidanceReportController::class, 'getStudentByLRN']);
Route::get('/getStudentNameSuggestions/{input}/{lrn}', [StudentController::class, 'getStudentNameSuggestions']);
Route::get('/search', [GuidanceReportController::class, 'studentSearch'])->name('search');
Route::get('/psearch', [GuidanceReportController::class, 'pstudentSearch'])->name('psearch');
Route::get('/guidance-reports/show/{form_id}', [GuidanceReportController::class, 'show'])->name('guidance-reports.show');
Route::delete('/guidance-reports/{form_id}', [GuidanceReportController::class,'destroy'])->name('guidance-reports.delete');


Route::get('/student/view/{lrn}', [StudentController::class, 'view'])->name('student.view');
Route::get('/student/list', [StudentController::class, 'search'])->name('student.list'); // Route to display student list
Route::get('/student/register', [StudentController::class, 'create'])->name('student.create');
Route::post('/student/store', [StudentController::class, 'storeStudent'])->name('student.store');
Route::get('/student/{student_lrn}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student/{student_lrn}/edit', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student_lrn}', [StudentController::class, 'update'])->name('student.update');
Route::get('/student/search', [StudentController::class, 'search'])->name('student.search');
// routes/web.php

Route::get('/messages', [MessageController::class,'index'])->name('message.index')->middleware('auth');
Route::post('/messages/create', [MessageController::class,'store'])->name('message.store')->middleware('auth');
Route::post('/messages/go', [MessageController::class,'go'])->name('message.go');

Route::get('/email/form', [MailController::class, 'showEmailForm'])->name('email.form');
Route::post('/send/email', [MailController::class, 'sendEmail'])->name('send.email');
Route::get('/student/{lrn}/send-message', [StudentController::class,'sendMessage'])->name('student.send-message');
Route::post('/send-email', [EmailController::class,'sendEmail'])->name('send-email');

// Route to show the appointment creation form
Route::get('/appointments/create/{form_id}', [AppointmentController::class, 'makeAppointment'])
    ->name('make-appointment');

// Route to handle appointment creation and storage
Route::post('/appointments/create/{form_id}', [AppointmentController::class, 'storeAppointment'])
    ->name('store-appointment');
    Route::get('/appointments/view/{form_id}', [AppointmentController::class, 'viewAppointment'])
    ->name('view-appointment');
    Route::get('/appointments/view/{form_id}', [AppointmentController::class, 'viewsAppointment'])
    ->name('view-appointment');
    Route::get('/appointments/view', [AppointmentController::class, 'viewAllAppointments'])
    ->name('view-all-appointments');

    Route::post('/referral-student', [ReferralController::class,'addReferral'])->name('referral.student.add');
    Route::get('/referral-student/create', [ReferralController::class,'create'])->name('student-referral.create');
    Route::get('/referrals/all', [ReferralController::class, 'view'])->name('referrals.all');


    