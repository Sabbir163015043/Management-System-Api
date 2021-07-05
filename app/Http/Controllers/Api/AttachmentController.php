<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Attachment;

class AttachmentController 
{
    function index()
    {
        $data = Attachment::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        // $req->validate([
        //    'url' => 'required',
        // ]);

            $fileModel = new Attachment;
    
            

        try {
            if($req->file()) {
                $fileName = time().'_'.$req->file->getClientOriginalName();
                $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
    
                $fileModel->name = time().'_'.$req->file->getClientOriginalName();
                $fileModel->file_path = '/storage/' . $filePath;
                $fileModel->save();

            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Attachment'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Attachment created',
            'data' => $fileModel
        ]);
    }

    function show($id)
    {
        $model = Attachment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment not found',
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
        
        $model = Attachment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment not found',
            ]);
        }

        if ($req->filled('id')) {
            $model->id = $req->id;
        }

        if ($req->filled('url')) {
            $model->url = $req->url;
        }

        if ($req->filled('type')) {
            $model->type = $req->type;    
        }

        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment to update Module'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Attachment updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Attachment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Attachment not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        