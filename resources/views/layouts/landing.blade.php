<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>@yield("title") - SEMPRO</title>
</head>
<body>
    <nav>
        <ul class="nav justify-content-center mt-3">
            <li class="nav-item">
                <a class="m-2 @if(Request::is('list-beasiswa','list-beasiswa/*')) btn btn-primary @else btn btn-outline-primary @endif" href="{{ route("list-beasiswa") }}" role="button">Info Beasiswa</a>
            </li>
            <li class="nav-item ">
                <a class="m-2 @if(Request::is('daftar-beasiswa','daftar-beasiswa/*')) btn btn-primary @else btn btn-outline-primary @endif" href="{{ route("daftar-beasiswa") }}" >Daftar Beasiswa</a>
            </li>
            <li class="nav-item ml-2">
                <a class="m-2 @if(Request::is('hasil','hasil/*')) btn btn-primary @else btn btn-outline-primary @endif" href="{{ route("hasil") }}">Hasil Pendaftaran</a>
            </li>
        </ul>
    </nav>
    <main>
        <div class="container">
            @yield("content")
        </div>
    </main>

    <footer>
        <div class="text-center p-3" style="background-color: #191919;">
            <span class="text-white">© 2023 Copyright:</span>
            <a class="text-white" href="https://github.com/renzien">Alif Rizki Ramdhana</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>
</body>
</html>