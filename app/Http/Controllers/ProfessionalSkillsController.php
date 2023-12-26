<?php

namespace App\Http\Controllers;

use App\Models\Professional_Skills;
use App\Models\Resume;
use Illuminate\Http\Request;

class ProfessionalSkillsController extends Controller
{
    public function index()
    {
        $Professional_Skills = Professional_Skills::all();
        $resumes = Resume::all();
        return view('professional_skill.index', compact('Professional_Skills', 'resumes'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $request->validate(Professional_Skills::$rules, Professional_Skills::$customMessages);
        $input = $request->all();
        $input['status'] = 'active';
        Professional_Skills::create($input);
        return redirect()->back()->with('success', 'Professional_Skills added successfully!');
        //   return response()->json('success','true');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $request->validate(Professional_Skills::$rules, Professional_Skills::$customMessages);
        $Professional_Skills = Professional_Skills::find($id);
        $input = $request->all();
        $Professional_Skills->update($input);
        return response(['success', true]);

    }

    public function show(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $Professional_Skills = Professional_Skills::where('id', $id)->first();
        $Professional_Skills->delete();
        return response()->json(['message' => 'Professional_Skills deleted successfully']);

    }

    public function professional_skillsStatus(Request $request)
    {
        $Professional_Skills = Professional_Skills::find($request->id);
        $Professional_Skills->status = $request->status;
        $Professional_Skills->save();
        return response()->json('true');
        // return redirect(route('user.index'))->with('success', "Status Updated SuccessFully");
    }
}
