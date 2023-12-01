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


        <body>
    <div class="container mt-5">
        <!-- Form Produk -->
        <div class="container mt-5">
    <!-- Form Produk -->
    <form method="POST" enctype="multipart/form-data" action="{{ route('customer-update', $dataCustomer->id_customer) }}">
    @CSRF
    <h2>Form Customer</h2>
    <div class="mb-3">
        <label for="id_customer" class="form-label">ID Customer</label>
        <input type="text" class="form-control" value="{{ $dataCustomer->id_customer }}" name="id_customer">
    </div>
    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control" id="nama" value="{{ $dataCustomer->nama }}" name="nama">
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" id="alamat" value="{{ $dataCustomer->alamat }}" name="alamat">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="text" class="form-control" id="age" value="{{ $dataCustomer->age }}" name="age">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>

    </div>
</body>

        </body>

</html>
