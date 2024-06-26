<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProjectImages;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    //
    public function projectImages(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'foreman_id' => 'required',
        'project_id' => 'required',
        'image' => 'required',
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
         $projectImages =new ProjectImages();
             // decode the base64 image
        $base64File = request('image');
        $fileData = base64_decode($base64File);

        $name = 'project_images/' . Str::random(15) . '.png';

        Storage::put('public/' . $name, $fileData);
        // update the user's profile_pic
        $projectImages->image = $name;
        $projectImages->foreman_id = $foreman_id;
        $projectImages->project_id = $project_id;
        $projectImages->save();
        $response = [
           'status'  => true,
           'message' => 'Project Image Upload Successfully ',
           'data' => [
            'image' => $name,
        ],
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
