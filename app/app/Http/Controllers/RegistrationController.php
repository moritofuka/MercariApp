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
            $registration->post_id = 1;

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
          $registration = new Registration;

          $purchase->name = $request->name;
          $purchase->tel = $request->tel;
          $purchase->postcode = $request->postcode;
          $purchase->address = $request->address;
    
          $registration->del_flg = 1;
          $registration->save();
        

          Auth::user()->purchase()->save($purchase);
       //   $registration->save();
          return redirect('/');
      
      }


      public function purchaseDelete(int $id,Request $request) { 

     $registration = Registration::find($id);
   
    $registration->del_flg = 1;
    $registration->save();
  
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

    return view('listing');

}


}
