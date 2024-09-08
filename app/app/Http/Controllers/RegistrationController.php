<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\follow;
use App\like;
use App\purchase;
use App\Registration;

class RegistrationController extends Controller
{
    public function createregistrationFrom(Request $request) {

              return view('registrations');
        
    }

        public function createregistration(Request $request) { 

            $registration = new Registration;

            $registration->name = $request->name;
            $registration->amount = $request->amount;
            $registration->memo = $request->memo;
            $registration->image = $request->image;
            $registration->comments = $request->comments;

            $registration->post_id = $request->post_id;

           // $registration = Registration::where('post_id','0')->where('user_id',Auth::id())->get();

            Auth::user()->registration()->save($registration);
         //   $registration->save();
            return redirect('/');
        
       

        }

}
