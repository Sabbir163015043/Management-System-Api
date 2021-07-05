<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController 
{
        
    function index()
    {
        $data = Comment::all();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);

    }

    function store(Request $req)
    {
        $req->validate([
           'tesk_id' => 'required',
           
        ]);

        $input = $req->all();
        $model = null;

        try {
            $model = Comment::create($input);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'failed to create Comment'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Comment created',
            'data' => $model
        ]);
    }

    function show($id)
    {
        $model = Comment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
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
        
        $model = Comment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
            ]);
        }

        if ($req->filled('id')) {
            $model->tesk_id = $req->tesk_id;
        
        }

        if ($req->filled('url')) {
            $model->comments = $req->comments;
            
        }

        if ($req->filled('type')) {
            $model->date_time = $req->date_time;   
        }
      

        try {
            $model->save();
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Comment to update Module'
            ]);
        }

        return response()->json([
            'success' => true,
            'message' => 'Comment updated successfully',
            'data' => $model
        ]);
    }


    function destroy($id)
    {
        $model = Comment::find($id);

        if ($model === null) {
            return response()->json([
                'success' => false,
                'message' => 'Comment not found',
            ]);
        }
        $model->delete();

        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully'
         ]);
    }




}

      
        
       
        
        