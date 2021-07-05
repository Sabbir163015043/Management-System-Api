<?php

namespace App\Http\Controllers\Api;

use App\Models\Payment;
use App\Models\Client;
use Illuminate\Http\Request;

class PaymentController 
{
 
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Payment::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        $req->validate([
           'project_id' => 'required',
           
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Payment::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Payment'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model =  Client::find($id)->getProject;
        $model2 =  Payment::find($id);
       

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $model,
            'dat' => $model2
        ]);
    }

    function update(Request $req, $id)
    {
        
        $model = Payment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found',
            ]);
        }

        if ($req->filled('project_id')) {
            $model->project_id = $req->project_id;
        
        }

        if ($req->filled('amount_method')) {
            $model->amount_method = $req->amount_method;
        
        }

        if ($req->filled('date')) {
            $model->date = $req->date;
        
            
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Payment'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Payment updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Payment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Payment not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        