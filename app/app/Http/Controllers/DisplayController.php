<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\follow;
//use App\like;
use App\Purchase;
use App\Registration;

class DisplayController extends Controller
{
    public function index() {

        $users = User::all();

   // $follow = new follow;
   // $follows = Auth::user()->follow()->get();

   // $like = new like;
  //  $likes = Auth::user()->like()->get();

   $purchase = new Purchase;
   $purchases = Auth::user()->purchase()->get();
   $allpurchases = $purchase->all()->toArray();

  // var_dump($allpurchases);


   $registration = new Registration;
$registrations = Auth::user()->registration()->get();
   $allregistrations = $registration->all()->toArray();

   $registration = Registration::all();

 // var_dump($allregistrations);


        return view('main',[
            'users' => $users,
            'registrations' => $allregistrations,
            'purchases' => $allpurchases,
    
        ]);

        
        }

    //マイページ
   public function myFrom() {

    $user = new User;
    $alluser = $user->all()->toArray();


        return view('my',[
            'users' => $alluser,
        ]);
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


//ユーザアイコン画面へ
public function useraicon() {
    $user = new User;
    $alluser = $user->all()->toArray();

    return view('aicon',[
        'users' => $alluser,
    ]);
}

//フォロー
public function store($userId)
    {
        Auth::user()->follows()->attach($userId);
        return;
    }



    }

