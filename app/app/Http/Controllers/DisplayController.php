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
    public function index() {

        $users = User::all();

 

   $purchase = new Purchase;
   $purchases = Auth::user()->purchase()->get();
   $allpurchases = $purchase->all()->toArray();

  // var_dump($allpurchases);


   $registration = new Registration;
$registrations = Auth::user()->registration()->get();
   $allregistrations = $registration->all()->toArray();


   $image = Registration::orderBy('created_at', 'desc')->paginate(5);
 // var_dump($allregistrations);



//いいね機能
//$posts = Registration::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);


$posts = Registration::withCount('likes')->orderBy('created_at', 'desc')->paginate(10);
$like_model = new Like;

        return view('main',[
            'users' => $users,
            'registrations' => $allregistrations,
            'purchases' => $allpurchases,
            'registrations' =>$image,
            'registrations' =>$posts,
            'like_model'=>$like_model,


        ]);

        
        }

 
//いいね機能

public function like(Request $request)
{
    $id = Auth::user()->id;
    $post_id = $request->post_id;
    $like = new Like;
    $post = Registration::findOrFail($post_id);

    // 空でない（既にいいねしている）なら
    if ($like->like_exist($id, $post_id)) {
        //likesテーブルのレコードを削除
        $like = Like::where('post_id', $post_id)->where('user_id', $id)->delete();
    } else {
        //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = Auth::user()->id;
        $like->save();
    }

    //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
    $postLikesCount = $post->loadCount('likes')->likes_count;

    //一つの変数にajaxに渡す値をまとめる
    //今回ぐらい少ない時は別にまとめなくてもいいけど一応。笑
    $json = [
        'postLikesCount' => $postLikesCount,
    ];
    //下記の記述でajaxに引数の値を返す
    return response()->json($json);
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
    $image = User::orderBy('created_at', 'desc')->paginate(5);


    return view('aicon',[
        'users' => $alluser,
        'users' => $image,
    ]);
}





    }

