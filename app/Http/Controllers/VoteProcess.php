<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class VoteProcess extends Controller
{
    public function processVote($id){
        $candidate = Candidate::find($id);
        $candidate->update(['votes'=>($candidate->votes + 1)]);

        return response(Candidate::find($id));
        
        
    }
}
