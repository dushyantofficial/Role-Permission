<?php

namespace App\Http\Controllers;

use App\Models\Education;
use App\Models\Resume;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::all();
        $resumes = Resume::all();
        return view('educations.index', compact('educations', 'resumes'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Education::$ruless, Education::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $request->validate(Education::$rules, Education::$customMessages);
        }
        $input['status'] = 'active';
        Education::create($input);
        return redirect()->back()->with('success', 'educations added successfully!');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $educations = Education::find($id);
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Education::$ruless, Education::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $request->validate(Education::$rules, Education::$customMessages);
        }
        $educations->update($input);
        return response()->json('true');
    }

    public function show(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $educations = Education::where('id', $id)->first();
        $educations->delete();
        return response()->json(['message' => 'Educations deleted successfully']);

    }

    public function educationsStatus(Request $request)
    {
        $educationsStatus = Education::find($request->id);
        $educationsStatus->status = $request->status;
        $educationsStatus->save();
        return response()->json('true');
        // return redirect(route('user.index'))->with('success', "Status Updated SuccessFully");
    }
}
