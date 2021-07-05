<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController 
{
    /*protected $modelClass = Project::class;*/

    function index()
    {
        $data = Contact::all();

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
            $model = Contact::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Contact'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model = Contact::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
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
        
        $model = Contact::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
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

        if ($req->filled('photo')) {
            $model->photo = $req->photo;
            
        }


        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update Contact'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Contact updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Contact::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        