<?php

namespace App\Http\Controllers;

use App\Models\Resume;
use App\Models\Work_Experience;
use Illuminate\Http\Request;

class WorkExperienceController extends Controller
{
    public function index()
    {
        $work_experiences = Work_Experience::all();
        $resumes = Resume::all();
        return view('work_experiences.index', compact('work_experiences', 'resumes'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Work_Experience::$ruless, Work_Experience::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $request->validate(Work_Experience::$rules, Work_Experience::$customMessages);
        }
        $input['status'] = 'active';
        Work_Experience::create($input);
        return redirect()->back()->with('success', 'work_experience added successfully!');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $Work_Experience = Work_Experience::find($id);
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Work_Experience::$ruless, Work_Experience::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $input['check'] = 0;
            $request->validate(Work_Experience::$rules, Work_Experience::$customMessages);
        }
        $Work_Experience->update($input);
        return response()->json('true');
    }

    public function show(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $work_experiences = Work_Experience::where('id', $id)->first();
        //$work_experiences = Work_Experience::find($id);
        $work_experiences->delete();
        return response()->json(['message' => 'Work Experiences deleted successfully']);

    }

    public function work_experiencesStatus(Request $request)
    {
        $work_experiencesStatus = Work_Experience::find($request->id);
        $work_experiencesStatus->status = $request->status;
        $work_experiencesStatus->save();
        return response()->json('true');
        // return redirect(route('user.index'))->with('success', "Status Updated SuccessFully");
    }
}
