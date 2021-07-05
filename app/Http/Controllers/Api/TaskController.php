<?php

namespace App\Http\Controllers\Api;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController 
{

    function index()
    {
        $data = Task::all();

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
            $model = Task::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Task'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model = Task::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found',
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
        
        $model = Task::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found',
            ]);
        }

        if ($req->filled('tittle')) {
            $model->tittle = $req->tittle;
        }

        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Task'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Task updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Task::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Task not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        
