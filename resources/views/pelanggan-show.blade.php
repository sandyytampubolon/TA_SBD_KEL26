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
        <a class="navbar-brand" href="#">TA SBD KEL 10</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('pelanggan-index')}}">Pelanggan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('produk-index') }}">Produk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Merk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Transaksi</a>
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
    <form method="POST" enctype="multipart/form-data" action="{{ route('pelanggan-update', $dataPelanggan->id_pelanggan) }}">
        @CSRF
        <h2>Form Produk</h2>
        <div class="mb-3">
            <label for="id_pelanggan" class="form-label">ID Pelanggan</label>
            <input type="text" class="form-control" value="{{ $dataPelanggan->id_pelanggan }}" name="id_pelanggan">
        </div>
        <div class="mb-3">
            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control" id="nama_pelanggan" value="{{ $dataPelanggan->nama_pelanggan }}" name="nama_pelanggan">
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="alamat" value="{{ $dataPelanggan->alamat }}" name="alamat">
        </div>
        <div class="mb-3">
            <label for="loyalty_rank" class="form-label">Loyalty Rank</label>
            <input type="text" class="form-control" id="loyalty_rank" value="{{ $dataPelanggan->loyalty_rank }}" name="loyalty_rank">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    </div>
</body>

        </body>

</html>
