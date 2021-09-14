<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;
use App\Models\Position;

class VoteProcess extends Controller
{

    public function registerCandidate(Request $request){
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:candidates'
        ]);
        $candidate = new Candidate;
        $candidate->first_name = $request['first_name'];
        $candidate->last_name = $request['last_name'];
        $candidate->email = $request['email_address'];
        $candidate->position = $request['position'];
        $candidate->save();
    }

    public function getPositions(){
        $pos = Position::findAll();
        return response($pos);

    }
    public function processVote($id){
        $candidate = Candidate::find($id);
        $candidate->update(['votes'=>($candidate->votes + 1)]);

        return response(Candidate::find($id));
        
        
    }
}
