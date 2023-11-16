<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth.api');

    }
    public function index()
    {
        $todos = Todo::all();
        return response()->json(['status' => "success", 'todos' => $todos,]);
    }
    public function store(Request $request)
    {
        $request -> validate([
            'title' => $request->title,
            'description' => $request->description,
        
        ]);

        
    }
    
}
