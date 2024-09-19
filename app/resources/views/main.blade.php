
@extends('layouts.layout')
<!DOCTYPE html>
<html lang="en">


    <body>

        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">メルカリ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('my.form') }}">マイページへ</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="{{ route('create.registration') }}" >商品登録</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                         
                        <a class="nav-link dropdown-toggle" href="{{ route('user.aicon') }}" >
                            <span class="rounded-pill">ユーザアイコン</span>
                        </a>
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
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <table class='table'>
                        @foreach($registrations as $registration)
                            <!-- Product image-->
                          
                            <thead>
                        
                            <tr><h5>画像{{$registration['image']}}</h5></tr>

                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <tr><h5 class="fw-bolder">商品名{{$registration['name']}}</h5></th>
                                    <tr><h8 class="fw-bolder">価格{{$registration['amount']}}</h8></th>
                                </div>
                            </div>
                            </tr>
                            </thead>
                     

                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>

                            <meta name="csrf-token" content="{{ csrf_token() }}" />
                            @foreach($users as $user)
                            <div class="follow">
                            <button onclick="follow({{ $user->id }})">フォローする</button>
                            </div>
                            @endforeach
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                            @endforeach
                            </table>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
  function follow(userId) {
    $.ajax({
      // これがないと419エラーが出ます
      headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") },
      url: `/follow/${userId}`,
      type: "POST",
    })
      .done(data => {
        console.log(data)
      })
      .fail(data => {
        console.log(data)
      })
  }
</script>


