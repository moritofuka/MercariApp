
@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">

<head>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>


    <body>
<style>
    .loved i {
  color: red !important;
}
</style>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">メルカリ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link" href="{{ route('my.form') }}">マイページへ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.from') }}">管理者ページへ</a></div>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="{{ route('create.registration') }}" >商品登録</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                         
                        <a class="nav-item" href="{{ route('user.aicon') }}" >ユーザアイコン</a>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">メルカリ</h1>
                    <p class="lead fw-normal text-white-50 mb-0">メインページへようこそ</p>
                </div>
            </div>
           
        </header>
        <!-- Section-->
        <div>
  <form action="{{ route('main.index') }}" method="GET">
  @csrf
    <input type="text" name="keyword" value="{{ $keyword }}">
    <input type="submit" value="検索">


    <div class="row mt-1 justify-content-center">
                <div class="col-md-8 col-lg-12">            
                    <label for="amount">{{ __('金額範囲指定') }}</label>
                    <select class="form-control" id="amount" name="amount">
                        <option value="0">{{ __('指定なし') }}</option>
                        <option value="1">1~999</option>
                        <option value="2">1,000~9,999</option>
                        <option value="3">10,000~49,999</option>
                        <option value="4">50,000~99,999</option>
                        <option value="5">100,000~</option>
                    </select>
                </div>
            </div>
</from>

</div>






            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <table class='table'>
                        @foreach($registrations as $registration)
                        @if($registration['post_id'] == 1)
                            <!-- Product image-->
                          
                            <thead>
                            <tr>
                     
                            <img src="{{asset('storage/image/'.$registration->image)}}">

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <tr><h5 class="fw-bolder">商品名:{{$registration['name']}}</h5></th>
                                    <tr><h8 class="fw-bolder">価格:{{$registration['amount']}}</h8></th>
                                </div>
                            </div>
                            </tr>
                            </thead>



@if($like_model->like_exist(Auth::user()->id,$registration->id))
<p class="favorite-marke">
  <a class="js-like-toggle loved" href="" data-registrationid="{{ $registration->id }}"><i class="fas fa-heart"></i></a>
  <span class="likesCount">{{$registration->likes_count}}</span>
</p>
@else
<p class="favorite-marke">
  <a class="js-like-toggle" href="" data-registrationid="{{ $registration->id }}"><i class="fas fa-heart"></i></a>
  <span class="likesCount">{{$registration->likes_count}}</span>
</p>
@endif​              


                           

</div>

                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                            @endif
                            @endforeach
                            </table>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<script>
    $(function () {
    console.log('読み込み');
    var like = $('.js-like-toggle');
    var likeregistrationId;
    
    like.on('click', function () {
        console.log('クリック');
        var $this = $(this);
        likeregistrationId = $this.data('registrationid');
        $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: '/like',  //routeの記述
                type: 'POST', //受け取り方法の記述（GETもある）
                data: {
                    'registration_id': likeregistrationId //コントローラーに渡すパラメーター
                },
        })
    
            // Ajaxリクエストが成功した場合
            .done(function (data) {
    //lovedクラスを追加
                $this.toggleClass('loved'); 
    
    //.likesCountの次の要素のhtmlを「data.postLikesCount」の値に書き換える
                $this.next('.likesCount').html(data.registrationLikesCount); 
    
            })
            // Ajaxリクエストが失敗した場合
            .fail(function (data, xhr, err) {
    //ここの処理はエラーが出た時にエラー内容をわかるようにしておく。
    //とりあえず下記のように記述しておけばエラー内容が詳しくわかります。笑
                console.log('エラー');
                console.log(err);
                console.log(xhr);
            });
        
        return false;
    });
    });

</script>
</body>     



                            