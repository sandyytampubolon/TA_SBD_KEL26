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
                    <a class="nav-link" href="{{ route('merk-index') }}">Merk</a>
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


        <form method="POST" enctype="multipart/form-data" action="{{ route('merk-update', $dataMerk->id_merk) }}">
    @csrf
    <h2>Form Merk</h2>
    <div class="mb-3">
        <label for="id_merk" class="form-label">ID Merk</label>
        <input type="text" class="form-control" value="{{ $dataMerk->id_merk }}" name="id_merk">
    </div>
    <div class="mb-3">
        <label for="nama_merk" class="form-label">Nama Merk</label>
        <input type="text" class="form-control" id="nama_merk" value="{{ $dataMerk->nama_merk }}" name="nama_merk">
    </div>
    <div class="mb-3">
        <label for="country" class="form-label">Country</label>
        <input type="text" class="form-control" id="country" value="{{ $dataMerk->country }}" name="country">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>


        </body>

</html>
