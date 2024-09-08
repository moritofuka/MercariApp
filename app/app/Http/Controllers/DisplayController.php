<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

use Illuminate\Support\Facades\Auth;

//use App\User;
//use App\follow;
//use App\like;
//use App\purchase;
use App\Registration;

class DisplayController extends Controller
{
    public function index() {

   // $follow = new follow;
   // $follows = Auth::user()->follow()->get();

   // $like = new like;
  //  $likes = Auth::user()->like()->get();

  // $purchase = new purchase;
  // $purchases = Auth::user()->purchase()->get();

   $registration = new Registration;
$registrations = Auth::user()->registration()->get();
   $all = $registration->all()->toArray();

   var_dump($all);


        return view('main',[
            'registration' => $all,
        ]);

        
        }

    //商品登録画面へ遷移
  //  public function registrationsForm() {
  //      return view('registrations');
  // }


   //商品登録後メインページへ遷移
 //  public function registrations() {
  //  return view('main');
//}


public function purchasesForm() {
    return view('purchases');
}

public function purchases() {
    return view('main');
}

    }

