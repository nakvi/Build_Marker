<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ForemanController extends Controller
{
    //
    public function foremanDetail(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'foreman_id' => 'required',
    ]);

    if ($validator->fails()) {
        $errorMessage = $validator->errors()->first();
        $response = [
            'status'  => false,
            'message' => $errorMessage,
        ];
        return response()->json($response, 401);
    }
    $foreman_id = $request->input('foreman_id');
    $foreman = User::where('id',$foreman_id)->where('role','foreman')->first();
    if($foreman)
    {
        $response = [
            'status'  => true,
            'message' => 'Foreman Details',
             'data' => $foreman,
         ];
         return response()->json($response, 200);
    }
    else{
        $response = [
            'status'  => false,
            'message' => 'Foreman not Found',
             'data' => (object) [],
         ];
         return response()->json($response, 404);
    }

    }
    public function foremanAllProject(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'foreman_id' => 'required',
    ]);

    if ($validator->fails()) {
        $errorMessage = $validator->errors()->first();
        $response = [
            'status'  => false,
            'message' => $errorMessage,
        ];
        return response()->json($response, 401);
    }
    $foreman_id = $request->input('foreman_id');
    $foreman = User::where('id',$foreman_id)->where('role','foreman')->first();
    if($foreman)
    {
    $projects = Project::where('foreman_id',$foreman_id)->get();
    // dd($projects);
    if ($projects->isEmpty())
    {
        $response = [
           'status'  => false,
           'message' => 'Foreman has no Projects',
            'data' => (object) [],
        ];
        return response()->json($response, 404);
        }else{
        $response = [
           'status'  => true,
           'message' => 'Foreman all Projects ',
            'data' =>  $projects,
             ];
          return response()->json($response, 200);

        }
    }
    else{
        $response = [
            'status'  => false,
            'message' => 'Foreman not Found',
             'data' => (object) [],
         ];
         return response()->json($response, 404);
    }

    }

    public function foremanSingleProject(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'foreman_id' => 'required',
        'project_id' => 'required',
    ]);

    if ($validator->fails()) {
        $errorMessage = $validator->errors()->first();
        $response = [
            'status'  => false,
            'message' => $errorMessage,
        ];
        return response()->json($response, 401);
    }
    $foreman_id = $request->input('foreman_id');
    $project_id = $request->input('project_id');

    $foreman = User::where('id',$foreman_id)->where('role','foreman')->first();
    if($foreman)
    {
    $project = Project::where('foreman_id',$foreman_id)->where('id',$project_id)->first();
    if (empty($project))
    {
        $response = [
           'status'  => false,
           'message' => 'Project not found',
            'data' => (object) [],
        ];
        return response()->json($response, 404);
        }else{
        $response = [
           'status'  => true,
           'message' => 'Project Details ',
            'data' =>  $project,
             ];
          return response()->json($response, 200);

        }
    }
    else{
        $response = [
            'status'  => false,
            'message' => 'Foreman not Found',
             'data' => (object) [],
         ];
         return response()->json($response, 404);
    }

    }
}
