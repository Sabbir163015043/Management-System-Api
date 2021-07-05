<?php

namespace App\Http\Controllers\Api;

use App\Models\Devloper;
use Illuminate\Http\Request;

class DevloperController 
{
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Devloper::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        $req->validate([
           'name' => 'required',
           'phone_number' => 'required',
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Devloper::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Devloper'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Devloper created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model = Devloper::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Devloper not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $model
        ]);
    }

    function update(Request $req, $id)
    {
        
        $model = Devloper::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Devloper not found',
            ]);
        }

        if ($req->filled('name')) {
            $model->name = $req->name;

        }

        if ($req->filled('email')) {
            $model->email = $req->email;

        }

        if ($req->filled('phone_number')) {
            $model->phone_number = $req->phone_number;
    
        }

        if ($req->filled('bitbucket')) {
            $model->bitbucket = $req->bitbucket;  
        }
        if ($req->filled('github')) {
            $model->github = $req->github;
            
        }

        if ($req->filled('role')) {
            $model->role = $req->role;   
        }

        if ($req->filled('photo')) {
            $model->photo = $req->photo;
            
        }


        if ($req->filled('bank_account_no')) {
            $model->github = $req->github;
            
        }

        if ($req->filled('bank_name')) {
            $model->role = $req->role;   
        }

        if ($req->filled('bank_branch')) {
            $model->photo = $req->photo;
            
        }
        if ($req->filled('bkash_no')) {
            $model->github = $req->github;
            
        }

        if ($req->filled('rocket_no')) {
            $model->role = $req->role;   
        }

        if ($req->filled('nagad_no')) {
            $model->photo = $req->photo;
            
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Devloper'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Devloper updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Devloper::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Devloper not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        