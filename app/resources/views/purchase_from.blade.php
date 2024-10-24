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
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('my.form') }}">マイページ</a></li>
                    <li class="nav-item"><a class="nav-link dropdown-toggle" href="{{ route('user.aicon') }}" >ユーザアイコン</a></li>
                
                    </ul>
                </div>
            </div>
        </nav>

    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>購入履歴</h2>
    </div>
    @foreach($purchases as $purchase)

    <label for="name">画像:</label>
    <img src="{{asset('storage/image/'.$purchase->registration->image)}}" width="300" height="200px">

    <div class="col-12">
            <label for="name">出品名:</label>
              <h8 class="fw-bolder">{{$purchase->registration['name']}}</h8>
          
            </div>

           

            <div class="col-12">
              <label for="amount">価格: </label>
              <h8 class="fw-bolder">{{$purchase->registration['amount']}}</h8>
              
            </div>

            <div class="col-12">
              <label for="amount">購入日時: </label>
              <h8 class="fw-bolder">{{$purchase->registration['created_at']}}</h8>
              
            </div>




            @endforeach
        
    
        
</html>