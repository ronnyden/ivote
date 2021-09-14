<?php

namespace App\Http\Controllers;

use App\Models\Voter;
use Illuminate\Http\Request;

class Voters extends Controller
{
    public function store(Request $request){
        // $request->validate([
        //   'firstname'=>'required|string|max:255',
        //   'lastname'=>'required|string|max:255',
        //   'admissionNumber'=>'required|string|unique',
        //   'email'=>'required|string|email|unique'

        // ]);
    $voter = new Voter;
            $voter->first_name = $request['firstname'];
            $voter->last_name = $request['lastname'];
            $voter->admission_number = $request['admissionNumber'];
            $voter->email_address = $request['email'];

            $voter->save();
        
        
        return response("Voter registered",201);

    }

    public function show($id){
        $voter = Voter::find($id);
        return response($voter);
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

    public function login(Request $request){
        $user = Voter::where('admission_number',$request['admissionNumber'])->get()->first();
        if(!$user){
            return response("wrong cridentials",403);
        }
        
            return response("Welcome  $user->first_name",200);
    
    }
}
