
<!DOCTYPE html>
<html lang="en">
@extends('layouts.layout')
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
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
                         
                            
                            <span class="rounded-pill">ユーザアイコン</span>
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
                        @foreach($registrations as $registration)
                            <!-- Product image-->
                          <h5>画像{{$registration['image']}}</h5>
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名{{$registration['name']}}</h5>
                                    <h8 class="fw-bolder">価格{{$registration['amount']}}</h8>
                                </div>
                            </div>

                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>

                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">商品名</h5>
                                    <h8 class="fw-bolder">価格</h8>
                                </div>
                            </div>
                            <div class="goodBtn">
                            <button type="submit" class="btn btn-primary">いいね</button>
                            </div>
                            <div class="follow">
                            <button type="submit" class="btn btn-primary">フォローする</button>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{ route('create.purchases') }}">購入</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>

    </body>
</html>
