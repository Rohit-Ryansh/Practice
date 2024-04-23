<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $students = User::notAuthUser()->getStudents()->get();

        return view('pages.admin.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        Gate::authorize('create', Auth::user());

        return view('pages.admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {

        Gate::authorize('create', Auth::user());

        $validated = $request->validated();

        $validated['expiry_date'] = now()->addDays(90);

        $user = User::create($validated);
        // $request->file('file')->storeAs('docs', $validated['file']);
        // Storage::store('docs/', $validated['file']);

        $user->assignRole($validated['role']);
        $permissions = $user->getPermissionsViaRoles();
        $user->givePermissionTo($permissions);
        toastr()->success('Student created successfully !');
        return to_route(Auth::user()->roleName . 'students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        return view('pages.admin.student.view', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        Gate::authorize('update', $student);

        return view('pages.admin.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudentRequest $request, User $student)
    {
        Gate::authorize('create', $student);

        $validated = $request->validated();

        $student->update($validated);
        toastr()->success('Student updated successfully !');
        return to_route(Auth::user()->roleName . 'students.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        Gate::authorize('delete', $student);
        $student->delete();
        toastr()->success('Student deleted successfully !');
        return to_route(Auth::user()->roleName . 'students.index');
    }
}
