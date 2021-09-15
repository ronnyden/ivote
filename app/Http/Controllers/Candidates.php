<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class Candidates extends Controller
{
    public function registerCandidate(Request $request){
        // $request->validate([
        //   'lastname'=> 'required|string|max:255',
        //   'firstname'=> 'required|string|max:255',
        //   'email'=> 'required|string|email',
        //   'position'=> 'required|string|max:255'
        // ]);

        $candidate = new Candidate;
            $candidate->first_name = $request['firstname'];
            $candidate->last_name = $request['lastname'];
            $candidate->email_address = $request['email'];
            $candidate->position = $request['position'];
        
        $candidate->save();

        return response("Candidate added successfully",201);

    }

    public function findCandidate($id){
        $candidate = Candidate::find($id);
        return response($candidate);
    }


    public function update(Request $request,$id){
        Candidate::find($id)->update([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'position' => $request['position']
        ]);

        return response("Details updated",200);
    }

    public function deleteCandidate($id){
        Candidate::find($id)->delete();
    }
}
