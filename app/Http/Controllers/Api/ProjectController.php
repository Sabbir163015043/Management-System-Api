<?php

namespace App\Http\Controllers\Api;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController
{
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Project::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        $req->validate([
           'name' => 'required',
           'client_id' => 'required',
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Project::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create project'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'project created',
            'data' => $model
        ]);
    }

    function show($id)
    {
    
        $model = Project::find($id)->getClient;
        

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
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
        
        $model = Project::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ]);
        }

        if ($req->filled('name')) {
            $model->name = $req->name;
        }

        if ($req->filled('client_id')) {
            $model->client_id = $req->client_id;
        }

        if ($req->filled('description')) {
            $model->description = $req->description;
        }

        if ($req->filled('start_date')) {
            $model->start_date = $req->start_date;
        }

        if ($req->filled('deadline')) {
            $model->deadline = $req->deadline;
        }

        if ($req->filled('labels')) {
            $model->labels = $req->labels;
        }

        if ($req->filled('status')) {
            $model->status = $req->status;
        }

        if ($req->filled('budget')) {
            $model->budget = $req->budget;
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update project'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Project updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Project::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Project not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}
