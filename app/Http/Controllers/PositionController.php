<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PositionController extends Controller

{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function display_positions_list()
    {
        
        
       $positions = Position::all();
       return response()->json([

            'status' => 'success',
            'Postitions' => $positions,
         


        ]);

    }
    public function create_position(Request $request) {

        $request->validate([
            'position_code' => 'required|string|max:191',
            'position_name' => 'required|string|max:191',
            'users_id' => 'required|int|max:20',
            'election_id' => 'required|int|max:20',

        ]);
        $position = Position::create([
            'position_code' => $request->position_code,
            'position_name' => $request->position_name,
            'users_id' => $request->users_id,
            'election_id' => $request->election_id,
        ]);

        $position = Position::all();
        return response()->json([
 
             'status' => 'success',
             'message' => 'position created successfully',
             'position' => $position,
         ]);
    }
    public function display_one_position($id)
    {
       $position = Position::find($id);
       return response()->json([

            'status' => 'success',
            'position' => $position,

        ]);
    }
    public function update_position(Request $request, $id)
    {

        $request->validate([
            'position_code' => 'required|string|max:191',
            'position_name' => 'required|string|max:191',
            'users_id' => 'required|int|max:20',
            'election_id' => 'required|int|max:20',

        ]);
        $position = Position::find($id);
        $position->position_code = $request->position_code;
        $position->position_name = $request->position_name;
        $position->users_id = $request->users_id;
        $position->election_id = $request->election_id;
        $position->save();

        return response()->json([

                'status' => 'success',
                'message' => 'position updated successfully',
                'position' => $position,

        ]);
    }
    public function delete_position($id)
    {
       $position = Position::find($id);
       $position->delete();
       return response()->json([

            'status' => 'success',
            'message' => 'position deleted successfully',
            'position' => $position,

        ]);
    }

}
