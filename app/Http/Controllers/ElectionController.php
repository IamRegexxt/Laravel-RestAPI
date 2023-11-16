<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Election;

class ElectionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function display_elections_list()
    {
        
        
       $elections = Election::all();
       return response()->json([

            'status' => 'success',
            'elections' => $elections,
         


        ]);

    }
    public function create_election(Request $request) {

        $request->validate([
            'election_code' => 'required|string|max:191',
            'election_description' => 'required|string|max:191',
            'election_status' => 'required|string|max:191',
            'users_id' => 'required|int|max:20',

        ]);
        $election = Election::create([
            'election_code' => $request->election_code,
            'election_description' => $request->election_description,
            'election_status' => $request->election_status,
            'users_id' => $request->users_id,
        ]);

        $election = Election::all();
        return response()->json([
 
             'status' => 'success',
             'message' => 'election created successfully',
             'election' => $election,
         ]);



    }
    public function display_one_election($id)
    {
       $election = Election::find($id);
       return response()->json([

            'status' => 'success',
            'election' => $election,

        ]);
    }
    public function update_election(Request $request, $id)
    {

        $request->validate([
            'election_code' => 'required|string|max:191',
            'election_description' => 'required|string|max:191',
            'election_status' => 'required|string|max:191',
            'users_id' => 'required|int|max:20',

        ]);
        $election = Election::find($id);
        $election->election_code = $request->election_code;
        $election->election_description = $request->election_description;
        $election->election_status = $request->election_status;
        $election->users_id = $request->users_id;
        $election->save();

        return response()->json([

                'status' => 'success',
                'message' => 'election updated successfully',
                'election' => $election,

        ]);
    }
    public function delete_election($id)
    {
       $election = Election::find($id);
       $election->delete();
       return response()->json([

            'status' => 'success',
            'message' => 'election deleted successfully',
            'election' => $election,

        ]);
    }

}
