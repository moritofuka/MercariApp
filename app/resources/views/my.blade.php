@extends('layouts.layout')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Full Width Pics - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">メルカリ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">メインページへ</a></li>
                        <li class="nav-item"><a class="nav-link dropdown-toggle" href="{{ route('user.aicon') }}" >ユーザアイコン</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
        @foreach($users as $user)
        <header class="py-5 bg-image-full" style="background-image: url('https://source.unsplash.com/wfh8dDlNFOk/1600x900')">
        <h1 class="text-black fs-3 fw-bolder">マイページ</h1>
            <div class="text-center my-5">
            <img src="{{asset('storage/image/'.$user->image)}}"　width="300" height="200px">
               
                <h1 class="text-black fs-3 fw-bolder">ユーザ名:{{$user['name']}}</h1>
                <h3 class="text-black fs-3 fw-bolder">メールアドレス:{{$user['email']}}</h3>
                <h3 class="text-black fs-3 fw-bolder">自己紹介:{{$user['biography']}}</h3>
            </div>
        </header>
        @endforeach
        <!-- Content section-->
        <section class="py-5">
            <div class="container my-5">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="{{ route('listing.from') }}">自身の出品一覧</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('like.form') }}">いいね一覧へ</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('purchase.form') }}">購入履歴</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('follow.form') }}">フォロー一覧</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('sales.form') }}">売上履歴</a></li>
                    </ul>
                    </div>
                </div>
            </div>
        </section>
        
      
    </body>
</html>
