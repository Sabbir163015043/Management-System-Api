<?php

namespace App\Http\Controllers\Api;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController 
{
    
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Module::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        $req->validate([
           'tittle' => 'required',
           
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Module::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Module'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Module created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model = Module::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Module not found',
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
        
        $model = Module::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Module not found',
            ]);
        }

        if ($req->filled('tittle')) {
            $model->tittle = $req->tittle;
        }

        if ($req->filled('description')) {
            $model->description = $req->description;
        }

        if ($req->filled('project_id')) {
            $model->project_id = $req->project_id;     
        }
        if ($req->filled('start_date')) {
            $model->start_date = $req->start_date;
         
        }
        if ($req->filled('end_date')) {
            $model->end_date = $req->end_date;
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Module'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Module updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Module::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Module not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        