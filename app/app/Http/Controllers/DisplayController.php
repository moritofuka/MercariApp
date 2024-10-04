<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Post;

use Illuminate\Support\Facades\Auth;

use App\User;
use App\follow;
use App\Like;
use App\Purchase;
use App\Registration;

class DisplayController extends Controller
{
    public function index(Request $request) {

        $users = User::all();

 

   $purchase = new Purchase;
   $purchases = Auth::user()->purchase()->get();
   $allpurchases = $purchase->all()->toArray();

  //($allpurchases);


   


   $image = Registration::orderBy('created_at', 'desc')->paginate(5);
  //dd($allregistrations);



  $registration = new Registration;
  $query = $registration->withCount('likes');


 $user_id = Auth::id();
 //キーワード受け取り
 $from = $request->input('from');


 // 日付検索の条件追加
if(!empty($from)) {
   $query = $query->whereBetween('name','memo', [$from]);

 }
 
 // クエリの実行
 $allregistrations = $query->get();





//いいね
$registrations = Registration::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
$like_model = new Like;

        return view('main',[
            'users' => $users,
            'registrations' => $allregistrations,
            'purchases' => $allpurchases,
            'like_model'=>$like_model,
            'from' => $from,


        ]);

        
        }

 




    //マイページ
   public function myFrom() {

    $user = new User;
    $alluser = $user->all()->toArray();
    $image = User::orderBy('created_at', 'desc')->paginate(5);

        return view('my',[
            'users' => $alluser,
            'users' => $image,
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
    $image = User::orderBy('created_at', 'desc')->paginate(5);


    return view('aicon',[
        'users' => $alluser,
        'users' => $image,
    ]);
}





    }

