<?php

namespace App\Http\Controllers;

use App\Jobs\ReminderEmailSentJob;
use App\Models\Course;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $students = User::notAuthUser()->getStudents()->count();
        $staff = User::notAuthUser()->getStaffs()->count();
        $courses = Course::count();
        $subjects = Subject::count();
        if (!empty($request->query('reminder'))) {

            ReminderEmailSentJob::dispatch();
        }

        return view('pages.' . Auth::user()->roleName . 'dashboard', compact('students', 'staff', 'courses', 'subjects'));
    }
}
