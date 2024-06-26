<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function customerDetail(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'customer_id' => 'required',
    ]);

    if ($validator->fails()) {
        $errorMessage = $validator->errors()->first();
        $response = [
            'status'  => false,
            'message' => $errorMessage,
        ];
        return response()->json($response, 401);
    }
    $customer_id = $request->input('customer_id');
    $customer = User::where('id',$customer_id)->where('role','customer')->first();
    if($customer)
    {
        $response = [
            'status'  => true,
            'message' => 'Customer Details',
             'data' => $customer,
         ];
         return response()->json($response, 200);
    }
    else{
        $response = [
            'status'  => false,
            'message' => 'Customer not Found',
             'data' => (object) [],
         ];
         return response()->json($response, 404);
    }

    }
    public function customerAllProject(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'customer_id' => 'required',
    ]);

    if ($validator->fails()) {
        $errorMessage = $validator->errors()->first();
        $response = [
            'status'  => false,
            'message' => $errorMessage,
        ];
        return response()->json($response, 401);
    }
    $customer_id = $request->input('customer_id');
    $customer = User::where('id',$customer_id)->where('role','customer')->first();
    if($customer)
    {
    $projects = Project::where('user_id',$customer_id)->get();
    // dd($projects);
    if ($projects->isEmpty())
    {
        $response = [
           'status'  => false,
           'message' => 'Customer has no Projects',
            'data' => (object) [],
        ];
        return response()->json($response, 404);
        }else{
        $response = [
           'status'  => true,
           'message' => 'Customer all Projects ',
            'data' =>  $projects,
             ];
          return response()->json($response, 200);

        }
    }
    else{
        $response = [
            'status'  => false,
            'message' => 'Customer not Found',
             'data' => (object) [],
         ];
         return response()->json($response, 404);
    }

    }

    public function customerSingleProject(Request $request)
    {
       $validator = Validator::make($request->all(), [
        'customer_id' => 'required',
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
    $customer_id = $request->input('customer_id');
    $project_id = $request->input('project_id');

    $customer = User::where('id',$customer_id)->where('role','customer')->first();
    if($customer)
    {
    $project = Project::where('user_id',$customer_id)->where('id',$project_id)->first();
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
            'message' => 'Customer not Found',
             'data' => (object) [],
         ];
         return response()->json($response, 404);
    }

    }
}
