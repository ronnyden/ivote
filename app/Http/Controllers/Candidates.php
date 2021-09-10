<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidate;

class Candidates extends Controller
{
    public function store(Request $request){
        $request->validate([
          'lastname'=> 'required|string|max:255',
          'firstname'=> 'required|string|max:255',
          'email'=> 'required|string|email',
          'position'=> 'required|string|max:255'
        ]);

        Candidate::create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'email' => $request['email'],
            'position' => $request['position']
        ]);

        return response("Candidate added successfully",201);

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

    public function destroy($id){
        Candidate::find($id)->delete();
    }
}
