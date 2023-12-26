<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Education;
use App\Models\Professional_Skills;
use App\Models\Project;
use App\Models\Resume;
use App\Models\Work_Experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

class ResumeController extends Controller
{
    public function index()
    {
        $resumes = Resume::orderBy('sequence', 'asc')->get();
        return view('resume.index', compact('resumes'));
    }

    public function create()
    {
        return view('resume.create');
    }

    public function store(Request $request)
    {
        $request->validate(Resume::$rules);
        $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:resumes,email'
        ]);
        $dob_year = date('Y', strtotime($request->dob));
        $current_year = date('Y');
        $age = $current_year - $dob_year;
        $input = $request->all();
        $input['age'] = $age;
        if ($request->hasFile("profile_pic")) {
            $img = $request->file("profile_pic");
            $img->store('public/images');
            $input['profile_pic'] = $img->hashName();
        }
        Resume::create($input);
        return redirect()->back()->with('success', 'Resume added successfully!');
        //   return response()->json('success','true');
    }

    public function edit(Request $request, $id)
    {

    }

    public function update(Request $request, $id)
    {
        $rules = Resume::$rules;
        $rules['profile_pic'] = 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048';
        $request->validate($rules);
        $resumes = Resume::find($id);
        $request->validate([
            'email' => 'required|regex:/(.+)@(.+)\.(.+)/i|unique:resumes,email,' . $resumes->id,
        ]);
        $dob_year = date('Y', strtotime($request->dob));
        $current_year = date('Y');
        $age = $current_year - $dob_year;
        $input = $request->all();
        $input['age'] = $age;
        if ($request->hasFile("profile_pic")) {
            $img = $request->file("profile_pic");
            if (Storage::exists('public/images' . $resumes->profile_pic)) {
                Storage::delete('public/images' . $resumes->profile_pic);
            }
            $img->store('public/images');
            $input['profile_pic'] = $img->hashName();
            $resumes->update($input);

        }
        $resumes->update($input);
        return redirect()->back()->with('success', 'Resume update successfully!');
        //return response()->json('success','true');

    }

    public function show(Request $request, $id)
    {

    }

    public function destroy($id)
    {
        $id = preg_replace('/[^0-9]/', '', $id);
        $resumes = Resume::where('id', $id)->first();
        $resumes->delete();
        return response()->json(['message' => 'Resume deleted successfully']);

    }

    public function preview_resume(Request $request)
    {
        $resumes = Resume::where('id', $request->id)->first();
        if (isset($resumes)) {
            $educations = Education::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $professional_skills = Professional_Skills::where('resume_id', $resumes->id)->where('status', 'active')->orderBy('professional_skills', 'asc')->get();
            $work_experiences = Work_Experience::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $projects = Project::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $courses = Course::where('resume_id', $resumes->id)->where('status', 'active')->get();
            return view('resume.preview', compact('resumes',
                'educations', 'professional_skills', 'work_experiences', 'projects', 'courses'));
        } else {
            return redirect()->back();
        }
    }


    public function downloadPDF(Request $request)
    {
        $resumes = Resume::where('id', $request->id)->first();
        $educations = Education::where('resume_id', $resumes->id)->where('status', 'active')->get();
        $professional_skills = Professional_Skills::where('resume_id', $resumes->id)->where('status', 'active')->orderBy('professional_skills', 'asc')->get();
        $work_experiences = Work_Experience::where('resume_id', $resumes->id)->where('status', 'active')->get();
        $projects = Project::where('resume_id', $resumes->id)->where('status', 'active')->get();
        $courses = Course::where('resume_id', $resumes->id)->where('status', 'active')->get();
        $data = [
            'resumes' => $resumes,
            'educations' => $educations,
            'professional_skills' => $professional_skills,
            'work_experiences' => $work_experiences,
            'projects' => $projects,
            'courses' => $courses,
        ];

        $pdf = PDF::loadView('resume.resume_download', $data);
        return $pdf->download("$resumes->name.pdf");
    }

    public function resume_demo(Request $request)
    {

        $resumes = Resume::where('id', $request->id)->first();
        if (isset($resumes)) {
            $educations = Education::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $professional_skills = Professional_Skills::where('resume_id', $resumes->id)->where('status', 'active')->orderBy('professional_skills', 'asc')->get();
            $work_experiences = Work_Experience::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $projects = Project::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $courses = Course::where('resume_id', $resumes->id)->where('status', 'active')->get();
            return view('resume_demo', compact('resumes',
                'educations', 'professional_skills', 'work_experiences', 'projects', 'courses'));
        } else {
            return redirect()->back();
        }
    }

    public function resume_details(Request $request)
    {
        $resumes = Resume::where('id', $request->id)->first();
        if (isset($resumes)) {
            $educations = Education::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $professional_skills = Professional_Skills::where('resume_id', $resumes->id)->where('status', 'active')->orderBy('professional_skills', 'asc')->get();
            $work_experiences = Work_Experience::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $projects = Project::where('resume_id', $resumes->id)->where('status', 'active')->get();
            $courses = Course::where('resume_id', $resumes->id)->where('status', 'active')->get();
            return view('resume.resume_details', compact('resumes',
                'educations', 'professional_skills', 'work_experiences', 'projects', 'courses'));
        } else {
            return redirect()->back();
        }
    }

    public function resume_test()
    {
        return view('resume_test');
    }


}
