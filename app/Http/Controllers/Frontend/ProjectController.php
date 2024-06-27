<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\ProjectImages;
use App\Mail\ForemanAddedToProject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::with(['user', 'foreman'])->get();
        $customers = User::where('role','customer')->get();
        $foremans = User::where('role','foreman')->get();
        return view('frontend.projects.project',compact('projects','foremans','customers'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name' => 'required',
            'project_address' => 'required',
            'customer_id' => 'required',
            'foreman_id' => 'required',
        ]);
        $project = Project::create([
                'name'=>$request->input('project_name'),
                'address' => $request->input('project_address'),
                'user_id' => $request->input('customer_id'),
                'foreman_id' => $request->input('foreman_id'),

        ]);
         // Retrieve the foreman details
         $foreman = User::find($request->input('foreman_id'));

         // Send email to the foreman
         Mail::to($foreman->email)->send(new ForemanAddedToProject($project, $foreman));
        Session::flash('message', 'Created successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();

    }
    public function edit(string $id)
    {
        $project = Project::find($id);
        return response()->json([
            'project' => $project,
        ]);
    }
    public function update(Request $request, string $id)
    {
        $project = Project::find($id);
        $project->name = $request->input('project_name');
        $project->address = $request->input('project_address');
        $project->user_id = $request->input('customer_id');
        $project->foreman_id = $request->input('foreman_id');
        $project->update();
        Session::flash('message', 'Updated successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
    public function destroy(string $id)
    {
        $project = Project::destroy($id);
        Session::flash('message', 'Deleted successfully!');
        Session::flash('alert-class', 'alert-success');
    }

    public function show(string $id)
    {
        $projectImages =ProjectImages::where('project_id', $id)->get();
        return view('frontend.projects.project-images',compact('projectImages'));
    }
    public function image_destroy(string $id)
    {
        $projectImage = ProjectImages::destroy($id);
        Session::flash('message', 'Deleted successfully!');
        Session::flash('alert-class', 'alert-success');
    }
}
