<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Candidate;

class CandidateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    public function display_candidates_list()
    {
        
        
       $candidates = Candidate::all();
       return response()->json([

            'status' => 'success',
            'Candidate' => $candidates,
         


        ]);

    }
    public function create_candidate(Request $request) {

        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'users_id' => 'required|int|max:20',
            'position_id' => 'required|int|max:20',

        ]);
        $candidate = Candidate::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'users_id' => $request->users_id,
            'position_id' => $request->position_id,

        ]);

        $candidate = Candidate::all();
        return response()->json([
 
             'status' => 'success',
             'message' => 'Candidate created successfully',
             'election' => $candidate,
         ]);

    }
    public function display_one_candidate($id)
    {
       $candidate = Candidate::find($id);
       return response()->json([

            'status' => 'success',
            'election' => $candidate,

        ]);
    }
    public function update_candidate(Request $request, $id)
    {

        $request->validate([
            'first_name' => 'required|string|max:191',
            'last_name' => 'required|string|max:191',
            'users_id' => 'required|int|max:20',
            'position_id' => 'required|int|max:20',

        ]);
        $candidate = Candidate::find($id);
        $candidate -> first_name = $request->first_name;
        $candidate -> last_name = $request->last_name;
        $candidate -> users_id = $request->users_id;
        $candidate -> position_id = $request->position_id;


        return response()->json([

            'status' => 'success',
            'message' => 'candidate updated successfully',
            'candidate' => $candidate,

        ]);

    }
    public function delete_candidate($id)
    {
       $candidate = Candidate::find($id);
       $candidate->delete();
       return response()->json([

            'status' => 'success',
            'message' => 'election deleted successfully',
            'candidate' => $candidate,

        ]);
    }

}
