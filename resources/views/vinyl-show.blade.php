<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>PRODUK n MERK CREATE</title>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">VINYL STORE</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('customer-index')}}">Customer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('vinyl-index') }}">Vinyl</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('category-index')}}">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('trans-index')}}">Transaksi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('join-index')}}">Join</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


    <div class="container mt-5">
        <!-- Form Produk -->


        <form method="POST" enctype="multipart/form-data" action="{{route('vinyl-update', $dataVinyl->id_vinyl)}}">
    @CSRF
    <h2>Form Vinyl</h2>
    <div class="mb-3">
        <label for="id_vinyl" class="form-label">ID Vinyl</label>
        <input type="text" class="form-control" value="{{$dataVinyl->id_vinyl}}" name="id_vinyl">
    </div>
    <div class="mb-3">
        <label for="nama_vinyl" class="form-label">Nama Vinyl</label>
        <input type="text" class="form-control" id="nama_vinyl" value="{{$dataVinyl->nama_vinyl}}" name="nama_vinyl">
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Price</label>
        <input type="text" class="form-control" id="price" value="{{$dataVinyl->price}}" name="price">
    </div>
    <div class="mb-3">
        <label for="fk_id_category" class="form-label">ID Category</label>
        <input type="text" class="form-control" id="fk_id_category" value="{{$dataVinyl->fk_id_category}}" name="fk_id_category">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </body>

</html>
