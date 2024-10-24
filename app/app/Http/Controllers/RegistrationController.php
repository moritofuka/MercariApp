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
            $path = $request->file('image')->store('public/image/');
         
          
            $filename = basename($path);
            $registration->image = $filename;
            $registration->comments = $request->comments;
         
          
           // $registration = Registration::where('post_id','0')->where('user_id',Auth::id())->get();

            Auth::user()->registration()->save($registration);
          // $registration->save();
            return redirect('/');
        
       

        }


//購入機能
        public function createpurchasesFrom(int $id,Request $request) {
            $user = new User;
            $alluser = $user->all()->toArray();
            $image = Registration::where('id' ,\Auth::user()->id)->get();


           $registrations = new Registration;

          $result = $registrations->find($id);

    

            return view('purchases',[
                'registrations' => $image,
                'users' => $alluser,
                'result' =>$result,
            ]);
      
  }

      public function createpurchases(int $id,Request $request) { 

        
        $purchase = new Purchase;

       
          $purchase->name = $request->name;
          $purchase->tel = $request->tel;
          $purchase->postcode = $request->postcode;
          $purchase->address = $request->address;
          $purchase->registration_id = $id;

          Auth::user()->purchase()->save($purchase);


          $registration = new Registration;
         $record = $registration->find($id);
           $record->buy_flg = 1;
   
           $record->save();
          
 
        



          return redirect('/');
      
      }


   



      //ユーザ編集画面
      public function editForm(int $id) { 
        $user = new User;

        $result = $user->find($id);

        return view('useredit',[
            'id' => $id,
            'result' =>$result,
        ]);
      }

//ユーザ情報編集
      public function edit(int $id,Request $request) { 

       $instance = new User;
       $record = $instance->find($id);

       $record->name = $request->name;
       $record->email = $request->email;
    //   $record->image = $request->image;
       $path = $request->file('image')->store('public/image/');
       $filename = basename($path);
      $record->image = $filename;
       $record->biography = $request->biography;

       $record->save();

       return redirect('/');



      }

      //ユーザ退会画面へ
      public function delete(int $id) {
   
        $params = ['id' => $id]; 

        return view('withdrawal', [
            'params' => $params,
        ]);
      }


public function deleteuser(int $id) {


    $user = User::find($id);
   $user->delete();
  
  
    return redirect('/');
      
}

//出品一覧
public function listingFrom(Request $request) {

     $registration = new Registration;
    $registration = Auth::user()->registration()->get();

    return view('listing',[
        'registrations' => $registration,

    ]);

}


//フォロー
public function store($userId)
    {
    
        Auth::user()->follows()->attach($userId);
        return;
    }

    public function destroy($userId)
    {
    
        Auth::user()->follows()->detach($userId);
        return;
    }


//いいね機能

public function like(Request $request)
{
    $id = Auth::user()->id;
    $registration_id = $request->registration_id;
    $like = new Like;
    $registration = Registration::findOrFail($registration_id);

    // 空でない（既にいいねしている）なら
    if ($like->like_exist($id, $registration_id)) {
        //likesテーブルのレコードを削除
        $like = Like::where('registration_id', $registration_id)->where('user_id', $id)->delete();
    } else {
        //空（まだ「いいね」していない）ならlikesテーブルに新しいレコードを作成する
        $like = new Like;
        $like->registration_id = $request->registration_id;
        $like->user_id = Auth::user()->id;
        $like->save();
    }

    //loadCountとすればリレーションの数を○○_countという形で取得できる（今回の場合はいいねの総数）
    $registrationLikesCount = $registration->loadCount('likes')->likes_count;

    //一つの変数にajaxに渡す値をまとめる
    $json = [
        'registrationLikesCount' => $registrationLikesCount,
    ];
    //下記の記述でajaxに引数の値を返す
    return response()->json($json);
}


//出品リスト非表示
// 論理削除
public function list(int $id) {

 

 $registration = Registration::findOrFail($id);
 $registration->post_id = 2;
 $registration->save();

  
    return redirect('/');
  }


  public function nolist(int $id) {

 

    $registration = Registration::findOrFail($id);
    $registration->post_id =1;
    $registration->save();
   
     
       return redirect('/');
     }


     //ユーザ利用停止
     //論理削除
  public function userdelete(int $id){
  
    $user = User::findOrFail($id);
     $user->del_flg = 1;
     $user->save();


   
     return redirect('/');
     
 }
   



}
