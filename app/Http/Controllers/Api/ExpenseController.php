<?php

namespace App\Http\Controllers\Api;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController 
{
        
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Expense::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        $req->validate([
           'narration' => 'required',
           
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Expense::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Expense'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Expense created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model = Expense::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Expense not found',
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
        
        $model = Expense::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Expense not found',
            ]);
        }

        if ($req->filled('narration')) {
            $model->narration = $req->narration;
        
        
        }

        if ($req->filled('amount_date')) {
            $model->amount_date = $req->amount_date;
        
        
        }

        if ($req->filled('category')) {
            $model->category = $req->category;
        
            
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Expense'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Expense updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Expense::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Expense not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        