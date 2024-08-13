<?php

namespace App\Http\Controllers;

use App\Models\TodoList;
use Illuminate\Http\Request;

class ApiTodoListController extends Controller
{
    public function getList()
    {
        $result = TodoList::orderBy('id', 'desc')->get();
        return response()->json([
            'status' => true,
            'message' => 'Data fetched successfully',
            'data' => $result,
        ]);
    }

    public function postCreate()
    {
        $content = request('content');
        $result = TodoList::create([
            'content' => $content,
        ]);

        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Data created successfully',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data created failed',
        ]);
    }

    public function postUpdate($id)
    {
        $content = request('content');
        $result = TodoList::where('id', $id)->update([
            'content' => $content,
        ]);

        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Data updated successfully',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data updated failed',
        ]);
    }

    public function postDelete($id)
    {
        $result = TodoList::where('id', $id)->delete();
        if ($result) {
            return response()->json([
                'status' => true,
                'message' => 'Data deleted successfully',
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Data deleted failed',
        ]);
    }
}
