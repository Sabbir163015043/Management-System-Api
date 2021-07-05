<?php

namespace App\Http\Controllers\Api;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController
{
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Client::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {

        $req->validate([
           'company_name' => 'required',
           
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Client::create($input);
        } catch (\Exception $e) {
            
            return response()->json([
                'success' => false,
                'message' => 'failed to create Client'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Client created',
            'data' => $model
        ]);
        
    }

    function show($id)
    {
        $model =  Client::find($id)->getProject;
        $Clientdata =  Client::find($id);
        
        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Client not found',
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $model,
            'Client' => $Clientdata
        ]);
    }

    function update(Request $req, $id)
    {
        
        $model = Client::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Client not found',
            ]);
        }

        if ($req->filled('company_name')) {
            $model->company_name = $req->company_name;
        
        }

        if ($req->filled('company_category')) {
            $model->company_category = $req->company_category;
        
        }

        if ($req->filled('address')) {
            $model->address = $req->address;
            
        }

        if ($req->filled('phone_number')) {
            $model->phone_number = $req->phone_number;
            
        }

        if ($req->filled('email')) {
            $model->email = $req->email;
            
        }

        if ($req->filled('website')) {
            $model->website = $req->website;
            
        }

        if ($req->filled('logho')) {
            $model->logho = $req->logho;
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Client'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Client updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Client::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Client not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        