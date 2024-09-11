<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\follow;
use App\like;
use App\Purchase;
use App\Registration;

class RegistrationController extends Controller
{

    //登録機能
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


//購入機能
        public function createpurchasesFrom(Request $request) {

            return view('purchases');
      
  }

      public function createpurchases(Request $request) { 

          $purchase = new Purchase;

          $purchase->name = $request->name;
          $purchase->tel = $request->tel;
          $purchase->postcode = $request->postcode;
          $purchase->address = $request->address;
    

        

          Auth::user()->purchase()->save($purchase);
       //   $registration->save();
          return redirect('/');
      
     

      }



}
