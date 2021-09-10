<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class Voters extends Controller
{
    public function store(Request $request){
        $request->validate([
          'firstname'=>'required|string|max:255',
          'lastname'=>'required|string|max:255',
          'admissionNumber'=>'required|string|unique',
          'email'=>'required|string|email|unique'

        ]);
    Voter::create(
        [
            'firstname'=>$request['firstname'],
            'lastname'=> $request['lastname'],
            'admissionNumber'=> $request['admissionNumber'],
            'email'=> $request['email']
        ]
        );
        return response("Voter registered",201);

    }

    public function update(Request $request,$id){
       $voter = Voter::find($id);
       $voter->firstname = $request['firstname'];
       $voter->lastname = $request['lastname'];
       $voter->email = $request['email'];
       $voter->admissionNumber = $request['admissioNumber'];
       $voter->save();

    }
    public function destroy($id){
        Voter::find($id)->delete();
    }
}
