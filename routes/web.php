<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentImportExportController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    if (Auth::user()) {
        return to_route(Auth::user()->roleName . 'dashboard');
    }

    return to_route('login');
})->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('students', StudentController::class)->scoped([
        'student' => 'slug',
    ]);

    Route::resource('courses', CourseController::class)->scoped([
        'course' => 'slug',
    ]);

    Route::resource('subjects', SubjectController::class)->scoped([
        'subject' => 'slug',
    ]);

    Route::resource('staffs', StaffController::class)->scoped([
        'staff' => 'slug',
    ]);

    Route::get('/pdf/{student:slug}', PdfController::class)->name('pdf-download');

    Route::get('/status/{student:slug}', StatusController::class)->name('status');

    Route::controller(StudentImportExportController::class)->group(function () {
        Route::post('/import', 'import')->name('import');
        Route::get('/export', 'export')->name('export');
    });
});

Route::prefix('staff')->name('staff.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('students', StudentController::class)->scoped([
        'student' => 'slug',
    ]);

    Route::resource('courses', CourseController::class)->scoped([
        'course' => 'slug',
    ]);

    Route::resource('subjects', SubjectController::class)->scoped([
        'subject' => 'slug',
    ]);

    Route::resource('staffs', StaffController::class)->scoped([
        'staff' => 'slug',
    ]);
});

Route::prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('students', StudentController::class)->scoped([
        'student' => 'slug',
    ]);

    Route::resource('courses', CourseController::class)->scoped([
        'course' => 'slug',
    ]);

    Route::resource('subjects', SubjectController::class)->scoped([
        'subject' => 'slug',
    ]);

    Route::resource('staffs', StaffController::class)->scoped([
        'staff' => 'slug',
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
