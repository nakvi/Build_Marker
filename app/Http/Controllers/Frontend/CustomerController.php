<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Mail\ForemanAddedToProject;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    //
    public function index()
    {
        $customers = User::with('projects')->where('role','customer')->get();
        //  dd($customers);
        $foremans = User::where('role','foreman')->get();

        return view('frontend.customer.customer',compact('customers','foremans'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'project_name' => 'required',
            'project_address' => 'required',
            'foreman_id' => 'required',
        ]);

        if (User::where('email', $request->input('email'))->exists()) {
            return redirect()->back()->withErrors(['email' => 'The email has already been taken.'])->withInput();
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'is_active' => $request->has('is_active') ? 1 : 0,
            'role' => 'customer',
        ]);

        if ($user->save()) {
            $project = Project::create([
                'name' => $request->input('project_name'),
                'user_id' => $user->id,
                'foreman_id' => $request->input('foreman_id'),
                'address' => $request->input('project_address'),
            ]);

            // Retrieve the foreman details
            $foreman = User::find($request->input('foreman_id'));

            // Send email to the foreman
            Mail::to($foreman->email)->send(new ForemanAddedToProject($project, $foreman));
        }

        Session::flash('message', 'Created successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect()->back();
    }
    public function edit(string $id)
    {
        $customer = Project::with('user')->where('id', $id)->first();
        return view('frontend.customer.customer-edit', compact('customer'));

    }
    public function update(Request $request, string $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'project_name' => 'required|string|max:255',
            'project_address' => 'required|string|max:255',
            'module' => 'nullable|array', // Validate that module is an array if it exists
            'module.*' => 'nullable|string', // Validate each module item
        ]);

        // Find the customer and update details
        $customer = User::find($id);
        if ($customer) {
            $customer->name = $request->input('name');
            $customer->email = $request->input('email');
            $customer->save();

            // Update the project
            $project = Project::find($request->input('project_id'));
            if ($project) {
                // Fetch existing modules
                $existingModules = $project->module !== 'none' ? explode(',', $project->module) : [];
                // Get new modules from the request, default to an empty array if null
                $newModules = $request->input('module', []);
                // Merge existing and new modules, ensuring no duplicates
                $allModules = array_unique(array_merge($existingModules, $newModules));
                $moduleString = implode(',', $allModules);
                $percentage = count($allModules) * 20;

                // Determine project status
                $status = 'progress';
                if (count($allModules) === 5) {
                    $status = 'completed';
                }

                $project->name = $request->input('project_name');
                $project->address = $request->input('project_address');
                $project->module = $moduleString;
                $project->percentage = $percentage;
                $project->status = $status;
                $project->save();

                Session::flash('message', 'Updated successfully!');
                Session::flash('alert-class', 'alert-success');
            } else {
                Session::flash('message', 'Project not found!');
                Session::flash('alert-class', 'alert-danger');
            }
        } else {
            Session::flash('message', 'Customer not found!');
            Session::flash('alert-class', 'alert-danger');
        }

        return redirect()->route('customer.index'); // Redirect to the customer index route
    }
    public function destroy(string $id)
    {
        $user = User::destroy($id);
        Session::flash('message', 'Deleted successfully!');
        Session::flash('alert-class', 'alert-success');
    }
}
