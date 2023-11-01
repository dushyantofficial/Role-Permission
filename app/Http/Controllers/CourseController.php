<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Resume;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $resumes = Resume::all();
        return view('course.index', compact('courses', 'resumes'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Course::$ruless, Course::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $request->validate(Course::$rules, Course::$customMessages);
        }
        $input['status'] = 'active';
        Course::create($input);
        return redirect()->back()->with('success', 'course added successfully!');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $courses = Course::find($id);
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Course::$ruless, Course::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $request->validate(Course::$rules, Course::$customMessages);
        }
        $courses->update($input);
        return response()->json('true');
    }

    public function show(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $courses = Course::where('id', $id)->first();
        $courses->delete();
        return response()->json(['message' => 'Course deleted successfully']);

    }

    public function courseStatus(Request $request)
    {
        $courseStatus = Course::find($request->id);
        $courseStatus->status = $request->status;
        $courseStatus->save();
        return response()->json('true');
        // return redirect(route('user.index'))->with('success', "Status Updated SuccessFully");
    }
}
