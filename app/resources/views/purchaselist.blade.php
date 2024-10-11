
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">メルカリ</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ route('admin.from') }}">戻る</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">出品リスト</h1>
                </div>
            </div>
</header>

<div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    <div class="col mb-5">
                        <div class="card h-100">
                        <table class='table'>

@foreach($registrations as $registration)
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
</div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                             
                            </div>

                            <form action="{{ route('delete.list', ['id' => $registration['id']]) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id">
                                    <button type="submit" class='btn btn-danger'>非表示</button>
                                    </form>

                                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                             
                                    <form action="{{ route('nodelete.list', ['id' => $registration['id']]) }}" method="post">
                                    <button type="submit" class='btn btn-outline-dark mt-auto'>非表示解除</button>
                                    </div>
                               

                            @endforeach

     
    </body>
</html>


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

