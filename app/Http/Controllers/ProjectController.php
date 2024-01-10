<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Resume;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $resumes = Resume::all();
        return view('projects.index', compact('projects', 'resumes'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Project::$ruless, Project::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $request->validate(Project::$rules, Project::$customMessages);
        }
        $input['status'] = 'active';
        Project::create($input);
        return redirect()->back()->with('success', 'Projects added successfully!');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $projects = Project::find($id);
        $input = $request->all();
        if ($request->check == 1) {
            $request->validate(Project::$ruless, Project::$customMessages);
            $input['end_date'] = 'Present';
        } else {
            $input['check'] = 0;
            $request->validate(Project::$rules, Project::$customMessages);
        }
        $projects->update($input);
        return response()->json('true');
    }

    public function show(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $projects = Project::where('id', $id)->first();
        $projects->delete();
        return response()->json(['message' => 'Project deleted successfully']);
    }

    public function projectsStatus(Request $request)
    {
        $projectsStatus = Project::find($request->id);
        $projectsStatus->status = $request->status;
        $projectsStatus->save();
        return response()->json('true');
    }
}
