<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index(){
        return view('index');
    }
    public function storedata(Request $request){
        //dd($request->all());
        $name=$request->name;
        $email=$request->email;
        $transactionID = $request->transactionID;
        // $user = Auth::user();
        // $email = $user->email;    
        Mail::to($email)->send(new SendMail($name,$email,$transactionID));
       return redirect()->back()->with('message','Mail Sent Successfully');


    }
}
