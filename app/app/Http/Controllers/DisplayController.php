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
  // $purchases = Auth::user()->purchase()->get();
  $allpurchases = $purchase->all()->toArray();

  //($allpurchases);


   


   $image = Registration::orderBy('created_at', 'desc')->paginate(5);
  //dd($allregistrations);



  $registration = new Registration;
  $query = $registration->withCount('likes');

//検索　部分一致
  $user_id = Auth::id();

 $keyword = $request->input('keyword');


 $query = Registration::query();

 if(!empty($keyword)) {
    $query->where('name', 'LIKE', "%{$keyword}%")
       ->orWhere('memo', 'LIKE', "%{$keyword}%");
 }





 //検索　価格


        // 金額範囲検索
        if ($request->has('amount')) {
            $amountOption = $request->input('amount');
            switch ($amountOption) {
                case 1:
                    $query->whereBetween('amount', [1, 999]);
                    break;
                case 2:
                    $query->whereBetween('amount', [1000, 9999]);
                    break;
                case 3:
                    $query->whereBetween('amount', [10000, 49999]);
                    break;
                case 4:
                    $query->whereBetween('amount', [50000, 99999]);
                    break;
                case 5:
                    $query->where('amount', '>=', 100000);
                    break;
            }
        }


        // 検索クエリをビューに渡す
      //  $searchQuery = $request->input('keyword');
      $allregistrations = $query->get();
  
 

//いいね
$registrations = Registration::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
$like_model = new Like;

        return view('main',[
            'users' => $users,
            'registrations' => $allregistrations,
            'purchases' => $allpurchases,
            'like_model'=>$like_model,
           'keyword' => $keyword,

        ]);

        
        }

 




    //マイページ
   public function myFrom() {

    $user = new User;
    $alluser = $user->all()->toArray();
  //  $image = User::orderBy('created_at', 'desc')->paginate(5);
  $image = User::where('id' ,\Auth::user()->id)->get();
        return view('my',[
            'users' => $alluser,
            'users' => $image,
        ]);
   }


   //商品購入後、購入履歴へ
   public function purchaseFrom() {


    $registration = new Registration;
    $registrations = Auth::user()->registration()->get();
   //    $allregistrations = $registration->all()->toArray();
   $image = Registration::orderBy('created_at', 'desc')->paginate(5);

   return view('purchase_from',[
    'registrations' => $registrations,
   ]);
}


//ユーザアイコン画面へ
public function useraicon() {

    $user = new User;
   // $alluser = $user->all()->toArray();
   $user = Auth::user()->id;

  //  $image = User::orderBy('created_at', 'desc')->paginate(1);
  $image = User::where('id' ,\Auth::user()->id)->get();

    return view('aicon',[
        'users' => $user,
        'users' => $image,
    ]);
}

//管理画面へ
public function admin(Request $request) {

    return view('index');

    }

    //ユーザリストへ
    public function adminuserlist(Request $request) {

    $user = new User;
    $alluser = $user->all()->toArray();
    $image = User::orderBy('created_at', 'desc')->paginate(5);


    return view('userlist',[
        'users' => $alluser,
        'users' => $image,
    ]);
    
        }

 //出品リストへ
 public function purchaselist(Request $request) {

    $registration = new Registration;
    $allregistration = $registration->all()->toArray();
    $image = Registration::orderBy('created_at', 'desc')->paginate(10);

    return view('purchaselist',[
       'registrations' => $allregistration,
        'registrations' => $image,
    ]);



    }

 

 




};

