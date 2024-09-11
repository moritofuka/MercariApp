<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

use Illuminate\Support\Facades\Auth;

//use App\User;
//use App\follow;
//use App\like;
use App\Purchase;
use App\Registration;

class DisplayController extends Controller
{
    public function index() {

   // $follow = new follow;
   // $follows = Auth::user()->follow()->get();

   // $like = new like;
  //  $likes = Auth::user()->like()->get();

   $purchase = new Purchase;
   $purchases = Auth::user()->purchase()->get();
   $allpurchases = $purchase->all()->toArray();

   var_dump($allpurchases);


   $registration = new Registration;
$registrations = Auth::user()->registration()->get();
   $allregistrations = $registration->all()->toArray();

   var_dump($allregistrations);


        return view('main',[
            'registrations' => $allregistrations,
            'purchases' => $purchases,
    
        ]);

        
        }

    //マイページ
   public function myFrom() {
        return view('my');
   }


   //商品購入後、購入履歴へ
   public function purchaseFrom() {


    $registration = new Registration;
    $registrations = Auth::user()->registration()->get();
       $allregistrations = $registration->all()->toArray();


   return view('purchase_from',[
    'registrations' => $allregistrations,
   ]);
}






    }

