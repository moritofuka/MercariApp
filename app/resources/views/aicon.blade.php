
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
                        <li class="nav-item"><a class="nav-link" href="{{ route('my.form') }}">マイページへ</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Header - set the background image for the header in the line below-->
        @foreach($users as $user)
            <div class="text my-5">
                <img class="img-fluid rounded-circle mb-4" src="https://dummyimage.com/150x150/6c757d/dee2e6.jpg" alt="..." />
                <div>{{$user['image']}}</div>
                <div class="text-censer my-5">
                <h3 class="text-black fs-3 fw-bolder">ユーザ名:{{$user['name']}}</h3>
                <h3 class="text-black fs-3 fw-bolder">メールアドレス:{{$user['email']}}</h3>
            </div>

            <div class="text-center my-5">
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
            
                             <a class="btn btn-outline-dark mt-auto" href="{{ route('edit.user',['id' => $user['id']]) }}">ユーザ情報編集</a>
                             </div>
                             <a class="btn btn-outline-dark mt-auto" href="{{ route('delete.user',['id' => $user['id']]) }}">ユーザ退会</a>
                             </div>



                <h3 class="text-black-50 mb-0">自己紹介:{{$user['biography']}}</h3>
            </div>
            @endforeach
   
      
        
      
    </body>
</html>
